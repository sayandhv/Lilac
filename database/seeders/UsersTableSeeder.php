<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'Name' => 'John Due',
            'phone_number' => '958741256',
            'fk_department' => 1,
            'fk_designation' => 1,
        ]);

        User::create([
            'Name' => 'Tommy Mark',
            'phone_number' => '789654125',
            'fk_department' => 2,
            'fk_designation' => 2,
        ]);

        User::create([
            'Name' => 'John Due',
            'phone_number' => '8564124785',
            'fk_department' => 1,
            'fk_designation' => 1,
        ]);

        User::create([
            'Name' => 'Tommy Mark',
            'phone_number' => '8523456987',
            'fk_department' => 2,
            'fk_designation' => 2,
        ]);
    }
}
