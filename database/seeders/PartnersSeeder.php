<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [   'name' => 'partner',
                'email' => 'partner@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$AB4NhZRqrKI5YKa4xI44xOcLZwAlcF2f6qbEVgd1n0PkxGXnkGwuG',
                'slug' => 'partner',
            ],
            
        ];

        foreach ($data as $value) {
            Partner::insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'email_verified_at' => $value['email_verified_at'],
                'password' => $value['password'],
                'slug' => $value['slug'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
