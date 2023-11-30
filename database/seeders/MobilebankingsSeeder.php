<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Mobilebanking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobilebankingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'BCA Mobile Banking'],
            ['name' => 'Livin by Mandiri'],
            ['name' => 'BRImo'],
            ['name' => 'BNI Mobile Banking'],
        ];

        foreach ($data as $value) {
            Mobilebanking::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
