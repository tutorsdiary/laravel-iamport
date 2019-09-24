<?php

namespace Tuda\Iamport;

class IamportPaymentsPaged
{
    protected $total;
    protected $previous;
    protected $next;
    protected $payments;

    /**
     * IamportPaymentsPaged constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->total = $response->total;
        $this->previous = $response->previous;
        $this->next = $response->next;
        $this->payments = array();
        foreach ($response->list as $row) {
            $this->payments[] = new IamportPayment($row);
        }
    }
    /**
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * @return integer
     */
    public function getPrevious()
    {
        return $this->previous;
    }
    /**
     * @return integer
     */
    public function getNext()
    {
        return $this->next;
    }
    /**
     * @return array
     */
    public function getPayments()
    {
        return $this->payments;
    }
}