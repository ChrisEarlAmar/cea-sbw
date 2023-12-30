<?php

namespace App\Services;

use PayMaya\API\PayMayaSDK;
use PayMaya\API\Checkout;

class PayMayaService
{
    public function __construct()
    {
        PayMayaSDK::getInstance()->initCheckout(
            env('PAYMAYA_PUBLIC_KEY'),
            env('PAYMAYA_SECRET_KEY'),
            env('PAYMAYA_ENV')
        );
    }

    public function createPayment($amount, $description)
    {
        // Implement payment creation logic here
    }
}
