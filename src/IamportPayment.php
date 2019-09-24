<?php

namespace Tuda\Iamport;

use Carbon\Carbon;

/**
 * Class IamportPayment
 * @package Tuda\Iamport
 * 
 * @property int amount
 * @property string apply_num
 * @property string bank_code
 * @property string bank_name
 * @property string buyer_addr
 * @property string buyer_email
 * @property string buyer_name
 * @property string buyer_postcode
 * @property string buyer_tel
 * @property int cancel_amount
 * @property array cancel_history
 * @property string cancel_reason
 * @property string cancel_receipt_urls
 * @property Carbon cancelled_at
 * @property string card_code
 * @property string card_name
 * @property string card_number
 * @property int card_quota
 * @property string card_type
 * @property boolean card_receipt_uissued
 * @property string channel
 * @property string currency
 * @property string custom_data
 * @property boolean escrow
 * @property string fail_reason
 * @property Carbon failed_at
 * @property string imp_uid
 * @property string merchant_uid
 * @property string name
 * @property Carbon paid_at
 * @property string pay_method
 * @property string pg_id
 * @property string pg_provider
 * @property string pg_tid
 * @property string receipt_url
 * @property string status
 * @property string user_agent
 * @property string vbank_code
 * @property Carbon vbank_date
 * @property string vbank_holder
 * @property Carbon vbank_issued_at
 * @property string vbank_name
 * @property string vbank_num
 *
 */

class IamportPayment
{
    protected $response;
    protected $custom_data;

    protected $dates = [
        'paid_at',
        'failed_at',
        'cancelled_at',
        'vbank_date',
        'vbank_issued_at',
    ];

    /**
     * IamportPayment constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
        $this->custom_data = new IamportPaymentCustomData(json_decode($response->custom_data));
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->response->{$name})) {
            if (in_array($name, $this->dates) && !is_null($this->response->{$name})) {
                return Carbon::createFromTimestamp($this->response->{$name});
            }
            return $this->response->{$name};
        }
    }

    /**
     * @param null $name
     * @return mixed|null
     */
    public function getCustomData($name = null)
    {
        if (is_null($name)) {
            return $this->custom_data;
        }
        if (isset($this->custom_data->{$name})) {
            return $this->custom_data->{$name};
        }
        return null;
    }
}