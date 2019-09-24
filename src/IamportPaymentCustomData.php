<?php

namespace Tuda\Iamport;

class IamportPaymentCustomData
{

    /**
     * IamportPayment constructor.
     * @param $response
     */
    public function __construct($custom_data)
    {
        if (!empty($custom_data)) {
            foreach ($custom_data as $key => $value ) {
                $this->{$key} = $value;
            }
        }
    }

}