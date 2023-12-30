<?php

namespace App\Services;

use GuzzleHttp\Client;

class DonationService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pg-sandbox.paymaya.com/checkout/v1/checkouts', // Replace with the PayMaya API base URL
            'headers' => [
                'Authorization' => 'Basic Y2VhOmNlYWFtYXI=', // Replace with your PayMaya secret key
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createPayment($amount, $description, $redirectUrl)
    {
        $response = $this->client->post('payments', [
            'json' => [
                'totalAmount' => [
                    'value' => $amount,
                    'currency' => 'PHP',
                ],
                'requestReferenceNumber' => uniqid(),
                'redirectUrl' => [
                    'success' => $redirectUrl,
                    'failure' => $redirectUrl, // Replace with your failure redirect URL
                    'cancel' => $redirectUrl, // Replace with your cancel redirect URL
                ],
                'items' => [
                    [
                        'name' => $description,
                        'quantity' => 1,
                        'totalAmount' => [
                            'value' => $amount,
                            'currency' => 'PHP',
                        ],
                    ],
                ],
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Other methods for processing payments and interacting with the PayMaya API
}
