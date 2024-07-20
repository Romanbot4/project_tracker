<?php

namespace App\Controllers;

use App\Domain\Entities\Request\SignInRequestEntity;
use App\Core\Failures\BadRequestFailure;
use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Infrastructure\Repositories\AuthenticationRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class AuthViewController extends BaseController
{
    private AuthenticationRepository $authenticationRepository;

    public function __construct(AuthenticationRepository $authenticationRepository = null)
    {
        $this->authenticationRepository = $authenticationRepository ?? \Config\Services::authenticationRepository();
    }

    public function login()
    {
        return view('login');
    }

    public function signUp()
    {
        return view('sign_up');
    }

    public function loginRequest()
    {
        try {
            $signInRequest = new SignInRequestEntity([
                "email" => $this->request->getPost("email"),
                "password" => $this->request->getPost("password"),
            ]);
            $result = $this->authenticationRepository->signIn($signInRequest);
            return redirect("/");
        } catch (BadRequestFailure $e) {
            print_r($e->errors);
            return view('login', [
                "errors" => $e->errors,
            ]);
        } catch (Throwable $e) {
            print_r($e);
            return view('login', [
                "errors" => [
                    "password" => "Email or password is incorrect"
                ],
            ]);
        }
    }

    public function signUpRequest()
    {
        try {
            $signUpRequest = new SignUpRequestEntity([
                "first_name" => $this->request->getPost("first_name"),
                "last_name" => $this->request->getPost("last_name"),
                "email" => $this->request->getPost("email"),
                "password" => $this->request->getPost("password"),
                "confirm_password" => $this->request->getPost("confirm_password"),
            ]);
            $result = $this->authenticationRepository->signUp($signUpRequest);
            return redirect("login");
        } catch (BadRequestFailure $e) {
            print_r($e->errors);
            return view('sign_up', [
                "errors" => $e->errors,
            ]);
        } catch (Throwable $e) {
            print_r($e);
            return view('sign_up', [
                "errors" => [
                    "password" => "Email or password is incorrect"
                ],
            ]);
        }
    }
}
