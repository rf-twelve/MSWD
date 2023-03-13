<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Administrator',
            'office_id' => 1,
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'francisco12rosel@gmail.com',
        ]);
    }
}
