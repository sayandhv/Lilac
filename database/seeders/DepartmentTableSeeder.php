<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'Name' => 'Sales and Marketing',
        ]);

        Department::create([
            'Name' => 'ApplicationDevelopment',
        ]);
    }
}
