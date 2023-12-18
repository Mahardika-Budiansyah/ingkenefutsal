<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [   'name' => 'Lapangan 1',
                'fieldtype_id' => 1,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-1',
                'partner_id' => 3,
            ],
            [   'name' => 'Lapangan 2',
                'fieldtype_id' => 2,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-2',
                'partner_id' => 3,
            ],
            [   'name' => 'Lapangan 3',
                'fieldtype_id' => 1,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-3',
                'partner_id' => 3,
            ],
            [   'name' => 'Lapangan 4',
                'fieldtype_id' => 4,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-4',
                'partner_id' => 3,
            ],
            [   'name' => 'Lapangan 5',
                'fieldtype_id' => 5,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-5',
                'partner_id' => 3,
            ],
            [   'name' => 'Lapangan 6',
                'fieldtype_id' => 6,
                'description' => 'Musholla, WC, Foods and Drinks',
                'slug' => 'lapangan-6',
                'partner_id' => 3,
            ],

        ];

        foreach ($data as $value) {
            Field::insert([
                'name' => $value['name'],
                'fieldtype_id' => $value['fieldtype_id'],
                'description' => $value['description'],
                'slug' => $value['slug'],
                'partner_id' => $value['partner_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
