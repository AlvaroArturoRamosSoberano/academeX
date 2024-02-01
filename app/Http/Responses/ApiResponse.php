<?php

namespace App\Http\Responses;

class ApiResponse
{
    public static function success($message, $statusCode, $data = [])
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => $data
        ], $statusCode);
    }
    public static function error($message, $statusCode, $data = [])
    {
        return response()->json([
            'message' => $message,
            'success' => false,
            'data' => $data
        ], $statusCode);
    }
}
