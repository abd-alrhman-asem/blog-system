<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait apiResponseTrait
{


    /**
     ** the idea of this trait it's to make all the responses
     *  (jsom response ) static in the format it's easier for client
     *  side programmer to handle a static shape of the response the
     *  reserved
     *
     */

    protected function apiResponse($success, $data , $message, $statusCode): JsonResponse
    {

        return response()->json([
            'success' => $success,
            'data' => $data,
            'message' => $message,
            'statusCode' => $statusCode,
        ]);

    }
}


