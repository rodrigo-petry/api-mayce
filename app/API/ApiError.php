<?php

namespace App\API;

class ApiError
{
    public static function errorMessage($message, $code)
    {
        return [
            'message' => $message,
            'code' => $code
        ];
    }
}
