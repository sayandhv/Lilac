<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    public function run()
    {
        Designation::create([
            'Name' => 'Marketing Manager',
        ]);

        Designation::create([
            'Name' => 'Mobile Application Developer',
        ]);
    }
}
