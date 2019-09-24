<?php

namespace Tuda\Iamport;

class IamportResult
{
    public $success = false;
    public $data;
    public $error;

    /**
     * IamportResult constructor.
     * @param bool $success
     * @param IamportPayment|null $data
     * @param array|null $error
     */
    public function __construct($success = false, $data = null, $error = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->error = new IamportResultError($error);
    }
}