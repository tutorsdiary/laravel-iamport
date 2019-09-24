<?php

namespace Tuda\Iamport\Exceptions;

class IamportAuthException extends \Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
