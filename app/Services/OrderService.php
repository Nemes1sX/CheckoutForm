<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{

    public function create($firstName, $lastName, $country, $region, $address) : void
    {
        Order::create([
           'first_name' => $firstName,
            'last_name' => $lastName,
            'region' => $region,
            'country' => $country,
            'address' => $address
        ]);
    }
}
