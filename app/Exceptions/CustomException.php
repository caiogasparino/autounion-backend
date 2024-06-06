<?php

namespace App\Exceptions;
use Exception;

class CustomException extends Exception
{
    public function render($request)
    {
        return response()->json([ "status" => $this->getCode(),"error" => true, "message" => $this->getMessage()], status: $this->getCode());
    }
}