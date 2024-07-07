<?php

namespace App\Infrastructure\Repositories;

use App\Core\Failures\UnauthorizedFailure;
use App\Domain\Entities\Request\SignInRequestEntity;
use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Domain\Entities\Response\AccessTokenResponseEntity;
use App\Domain\Entities\Response\SignInResponseEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use App\Domain\Repositories\IAuthenticationRepository;
use App\Domain\Repositories\ITokenRepository;
use App\Domain\Repositories\IUserCredentialRepository;
use App\Domain\Repositories\IUserRepository;
use Exception;

class AuthenticationRepository implements IAuthenticationRepository
{
    protected IUserRepository $userRepository;
    protected IUserCredentialRepository $userCredentialRepository;
    protected ITokenRepository $tokenRepository;

    public function __construct(
        IUserRepository $userRepository = null,
        IUserCredentialRepository $userCredentialRepository = null,
        ITokenRepository $tokenRepository = null,
    ) {
        $this->userRepository = $userRepository;
        $this->userCredentialRepository = $userCredentialRepository;
        $this->tokenRepository =  $tokenRepository;
    }

    public function signIn(SignInRequestEntity $form): SignInResponseEntity
    {
        $user = $this->userRepository->getByEmail($form->email);
        $isPasswordCorrect = $this->userCredentialRepository->verify($user->id, $form->password);
        if ($isPasswordCorrect) {
            return new SignInResponseEntity(
                $user,
                $this->tokenRepository->createAccessToken($user)
            );
        }
        throw new UnauthorizedFailure();
    }

    public function signUp(SignUpRequestEntity $form): SuccessResponseEntity
    {
        $user = $this->userRepository->create($form);
        $this->userCredentialRepository->create($user->id, $form->password);
        return new SuccessResponseEntity("Sign up successful.");
    }

    public function refreshToken(string $refreshToken): AccessTokenResponseEntity
    {
        throw new Exception("Not Implemented");
    }

    public function verifyToken(string $accessToken) : bool {
        return $this->tokenRepository->validateAccessToken($accessToken);
    }
}
