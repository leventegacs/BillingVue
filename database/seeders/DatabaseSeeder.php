<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lev\Partner\Models\Partner;
use Lev\Product\Models\Product;
use Lev\User\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->userSeeder();
        $this->productSeeder();
        $this->partnerSeeder();


    }

    public function userSeeder(): void
    {
        User::query()->create([
            'name' => 'Gács Levente',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminka123')
        ]);
    }

    public function productSeeder(): void
    {
        $products = [
            [ 'name' => 'Apple MacBook Air 13.3 M1 8GB 256GB Notebook', 'net_price' => '455280', 'identifier' => 'MGN63' ],
            [ 'name' => 'Apple iPhone 14 128GB Mobiltelefon', 'net_price' => '296900', 'identifier' => 'IPHONE14-128GB' ],
            [ 'name' => 'Apple iPad 9 2021 10.2 64GB', 'net_price' => '129890', 'identifier' => 'IPAD9-2021-64GB' ],
            [ 'name' => 'Apple AirPods Pro 2 2022', 'net_price' => '87790', 'identifier' => 'MQD83ZM/A' ],
            [ 'name' => 'Apple töltő adapter', 'net_price' => '3490', 'identifier' => 'MHJE3ZM/A' ],
        ];

        foreach($products as $product) {
            Product::query()->create($product);
        }
    }

    public function partnerSeeder(): void
    {
        Partner::query()->create([
            'name' => 'Netipar Magyarország Kft.',
            'tax_number' => '23593433-2-42',
            'postal_code' => 1162,
            'city' => 'Budapest VI. kerület',
            'street' => 'Dobó utca',
            'house_number' => '53'
        ]);
    }
}
