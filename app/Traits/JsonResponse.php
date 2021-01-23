<?php

namespace App\Traits;

/**
 * Json Response
 */
trait JsonResponse
{
    public function responseBody($status = "success", $message = null, $data = [])
    {
        return response()->json([
            'status' => $status,
            'msg' => $message,
            'data' => $data
        ]);
    }

    public function errorResponse($status = "Error", $message,$data = [])   
    {
        return response()->json([
            'status' => $status,
            'msg' => $message,
            'data' => $data
        ],422);
    }
}
