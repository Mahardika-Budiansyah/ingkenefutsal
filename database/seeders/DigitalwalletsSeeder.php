<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Digitalwallet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DigitalwalletsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Dana'],
            ['name' => 'ShopeePay'],
            ['name' => 'Gopay'],
            ['name' => 'OVO'],
            ['name' => 'LinkAja'],
        ];

        foreach ($data as $value) {
            Digitalwallet::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
