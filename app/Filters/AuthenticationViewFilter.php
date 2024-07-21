<?php

namespace App\Filters;
use App\Domain\Entities\Response\AccessTokenResponseEntity;
use App\Infrastructure\Repositories\AuthenticationRepository;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use Config\Services;

class AuthenticationViewFilter implements FilterInterface
{
    private AuthenticationRepository $authenticationRepository;
    private Session $session;
    public function __construct(?AuthenticationRepository $authenticationRepository = null)
    {
        $this->session = Services::session();
        $this->authenticationRepository =  $authenticationRepository ?? Services::authenticationRepository();
    }

    private ?AccessTokenResponseEntity $authorization;
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            $this->authorization = $this->session->get("authorization");
            $this->authenticationRepository->verifyToken($this->authorization->accessToken ?? '');
        } catch (\Throwable $e) {
            return redirect('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
