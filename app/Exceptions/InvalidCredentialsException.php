<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    protected $message = 'credentials are invalid';

    public function render($request)
    {
        return response()->fail($this->getMessage(), 401, false);
    }
}
