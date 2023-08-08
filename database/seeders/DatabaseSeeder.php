<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lev\Product\Models\Product;
use Lev\User\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::query()->create([
            'name' => 'Gács Levente',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminka123')
        ]);

        Product::factory(50)->create();


    }
}
