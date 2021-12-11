<?php

namespace App\Traits;

use App\Enums\ErrorCodes;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponser
{
    protected function parseGivenData(
        $data = [],
        $statusCode = 200,
        $headers = []
    )
    {
        $responseStructure = [
            'success' => $data['success'],
            'message' => $data['message'] ?? null,
            'result' => $data['result'] ?? null,
        ];
        if (isset($data['errors'])) {
            $responseStructure['errors'] = $data['errors'];
        }
        if (isset($data['status'])) {
            $statusCode = $data['status'];
        }


        if (isset($data['exception']) && ($data['exception'] instanceof Error || $data['exception'] instanceof Exception)) {
            if (config('app.env') !== 'production') {
                $responseStructure['exception'] = [
                    'message' => $data['exception']->getMessage(),
                    'file' => $data['exception']->getFile(),
                    'line' => $data['exception']->getLine(),
                    'code' => $data['exception']->getCode(),
                    'trace' => $data['exception']->getTrace(),
                ];
            }

            if ($statusCode === 200) {
                $statusCode = 500;
            }
        }
        if ($data['success'] === false) {
            if (isset($data['error_code'])) {
                $responseStructure['error_code'] = $data['error_code'];
            } else {
                $responseStructure['error_code'] = 1;
            }
        }
        return ["content" => $responseStructure, "statusCode" => $statusCode, "headers" => $headers];
    }

    protected function apiResponse(
        $data = [],
        $statusCode = 200,
        $headers = []
    )
    {
        $result = $this->parseGivenData($data, $statusCode, $headers);

        return response()->json(
            $result['content'], $result['statusCode'], $result['headers']
        );
    }

    protected function respondError(
        $message,
        int $statusCode = 400,
        int $errorCode  = ErrorCodes::UNDEFINED,
        Exception $exception = null
    )
    {
         return $this->apiResponse(
             [
                'success' => false,
                'message' => $message ?? 'There was an internal server error, Please try again later',
                'exception' => $exception,
                'error_code' => $errorCode
             ]
         );
    }

    protected function respondInternalServerError($message = 'Internal Error', $errorCode)
    {
        return $this->respondError($message, 500, $errorCode);
    }

    protected function respondSuccess($message = '')
    {
        return $this->apiResponse(['success' => true, 'message' => $message]);
    }

    protected function respondWithResource(
        JsonResource $resource,
                     $message = null,
                     $statusCode = 200,
                     $headers = []
    )
    {
        return $this->apiResponse(
            [
                'success' => true,
                'result' => $resource,
                'message' => $message
            ], $statusCode, $headers
        );
    }
}
