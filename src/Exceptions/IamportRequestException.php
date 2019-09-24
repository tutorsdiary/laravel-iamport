<?php

namespace Tuda\Iamport\Exceptions;

class IamportRequestException extends \Exception
{
    protected $response;
    public function __construct($response)
    {
        $this->response = $response;
        parent::__construct($response->message, $response->code);
    }
}

