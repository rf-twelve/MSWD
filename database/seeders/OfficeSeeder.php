<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'code' => 'itss',
            'name' => 'Information Technology Services Section',
        ]);

        Office::create([
            'code' => 'omm',
            'name' => 'Office of Municipal Mayor',
        ]);
    }
}
