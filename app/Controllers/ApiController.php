<?php

namespace App\Controllers;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    public function ok(
        $data,
        int $status = ResponseInterface::HTTP_OK,
    ): ResponseInterface {
        return $this->respond(
            $data,
            $status,
        );
    }

    public function notFound(
        string $reason = '',
    ): ResponseInterface {
        return $this->failNotFound(
            $reason,
        );
    }

    public function badRequest(
        string $reason,
        array $errors,
    ): ResponseInterface {
        return $this->failValidationErrors(
            $errors,
            ResponseInterface::HTTP_BAD_REQUEST,
            $reason,
        );
    }

    public function resolve(\Throwable $th): ResponseInterface
    {
        // $environment = $_ENV["CI_ENVIRONMENT"];
        // if ($environment == "production") {
        if ($th instanceof NotFoundFailure) return $this->notFound($th->reason);
        if ($th instanceof BadRequestFailure) return $this->badRequest($th->reason, $th->errors);
        // return $this->failServerError($th->getMessage());
        // }
        throw $th;
    }
}
