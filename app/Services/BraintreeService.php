<?php

namespace App\Services;

// braintree class in vendor
use Braintree\Gateway;

class BraintreeService
{
    // set a protected variable
    protected $gateway;

    // construct with the key's
    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);
    }

    public function gateway()
    {
        return $this->gateway;
    }

    // generates a token for the client session
    public function generateClientToken()
    {
        return $this->gateway->clientToken()->generate();
    }
}
