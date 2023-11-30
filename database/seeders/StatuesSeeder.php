<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [   'name' => 'Menunggu Pembayaran'],
            [   'name' => 'Berhasil'],
            [   'name' => 'Selesai'],
        ];

        foreach ($data as $value) {
            Status::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
