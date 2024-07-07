<?php

namespace App\Filters;

use App\Core\Failures\Failure;
use App\Infrastructure\Repositories\AuthenticationRepository;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthenticationFilter implements FilterInterface
{
    private AuthenticationRepository $authenticationRepository;
    public function __construct(?AuthenticationRepository $authenticationRepository = null)
    {
        $this->authenticationRepository =  $authenticationRepository ?? Services::authenticationRepository();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            $bearerHeader = $request->header("Authorization") ?? header("authorization");
            $bearer = $bearerHeader->getValue() ?? "";
            $this->authenticationRepository->verifyToken($bearer);
        } catch (\Throwable $th) {
            $this->resolveException($th);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    public function resolveException(\Throwable $th)
    {

        $errorMessage = $th instanceof Failure ? $th->reason : "Unauthorized request";
        $response = Services::response();
        $response->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        $response->setContentType("application\json");
        $response->setBody(json_encode([
            "success" => false,
            "message" => $errorMessage,
        ]));
        $response->send();
        exit;
    }
}
