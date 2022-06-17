<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryRequest;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryRequest::create([
            'id' => 1,
            'user_id' => 1,
            'product_id' => 23,
            'amount' => 5,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 2,
            'user_id' => 3,
            'product_id' => 25,
            'amount' => 2,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 3,
            'user_id' => 22,
            'product_id' => 10,
            'amount' => 6,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 4,
            'user_id' => 10,
            'product_id' => 11,
            'amount' => 1,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 5,
            'user_id' => 9,
            'product_id' => 18,
            'amount' => 4,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 6,
            'user_id' => 2,
            'product_id' => 1,
            'amount' => 7,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 7,
            'user_id' => 12,
            'product_id' => 5,
            'amount' => 3,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 8,
            'user_id' => 15,
            'product_id' => 15,
            'amount' => 6,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 9,
            'user_id' => 23,
            'product_id' => 20,
            'amount' => 5,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 10,
            'user_id' => 21,
            'product_id' => 14,
            'amount' => 2,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 11,
            'user_id' => 17,
            'product_id' => 12,
            'amount' => 4,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 12,
            'user_id' => 13,
            'product_id' => 18,
            'amount' => 1,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 13,
            'user_id' => 11,
            'product_id' => 17,
            'amount' => 8,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 14,
            'user_id' => 22,
            'product_id' => 11,
            'amount' => 3,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 15,
            'user_id' => 21,
            'product_id' => 6,
            'amount' => 2,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 16,
            'user_id' => 16,
            'product_id' => 16,
            'amount' => 8,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 17,
            'user_id' => 8,
            'product_id' => 13,
            'amount' => 1,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 18,
            'user_id' => 3,
            'product_id' => 4,
            'amount' => 4,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 19,
            'user_id' => 6,
            'product_id' => 12,
            'amount' => 5,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 20,
            'user_id' => 21,
            'product_id' => 21,
            'amount' => 4,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 21,
            'user_id' => 11,
            'product_id' => 19,
            'amount' => 2,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 22,
            'user_id' => 10,
            'product_id' => 20,
            'amount' => 6,
            'status' => 1
        ]);

        DeliveryRequest::create([
            'id' => 23,
            'user_id' => 13,
            'product_id' => 14,
            'amount' => 2,
            'status' => 2
        ]);

        DeliveryRequest::create([
            'id' => 24,
            'user_id' => 15,
            'product_id' => 15,
            'amount' => 9,
            'status' => 3
        ]);

        DeliveryRequest::create([
            'id' => 25,
            'user_id' => 18,
            'product_id' => 22,
            'amount' => 1,
            'status' => 1
        ]);
    }
}
