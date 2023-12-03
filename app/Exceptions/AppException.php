<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AppException extends HttpResponseException
{
    public function __construct($message = 'no records found', $statusCode = Response::HTTP_NOT_FOUND)
    {
        $response = new JsonResponse([
             'error' => [
                'message' => $message,
            ]
        ], $statusCode);

        parent::__construct($response);
    }
}
