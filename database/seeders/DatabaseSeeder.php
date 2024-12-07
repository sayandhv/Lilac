<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;      
use Database\Seeders\DepartmentTableSeeder;  
use Database\Seeders\DesignationTableSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            DepartmentTableSeeder::class, 
            DesignationTableSeeder::class, 
            UsersTableSeeder::class,      
        ]);
    }
}
