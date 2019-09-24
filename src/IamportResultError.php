<?php

namespace Tuda\Iamport;

class IamportResultError
{
    public $code;
    public $message;

    /**
     * IamportResult constructor.
     * @param bool $success
     * @param array|null $error
     */
    public function __construct($error = null)
    {
        if (!empty($error)) {
            $this->code = $error['code'];
            $this->message = $error['message'];
        }
    }
}