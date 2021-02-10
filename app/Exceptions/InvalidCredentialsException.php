<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function render($request)
    {
        return response()->fail($this->getMessage(), 401, false);
    }
}
