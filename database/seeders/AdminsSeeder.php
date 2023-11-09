<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [   'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$FbkdDaCnsNHEn54uvVZScuqvqLNW8P7.zis.wgoTxhL.xg2LAbRZa',
                'slug' => 'admin',
            ],
            
        ];

        foreach ($data as $value) {
            Admin::insert([
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
