<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'code' => 'manager_001',
            'email' => 'manager_001@manager.com',
            'name' => 'manager_001',
            'level' => 1,
            'password' => Hash::make('manager_001'),
        ]);

        DB::table('managers')->insert([
            'code' => 'manager_002',
            'email' => 'manager_002@manager.com',
            'name' => 'manager_002',
            'level' => 1,
            'password' => Hash::make('manager_002'),
        ]);

        DB::table('managers')->insert([
            'code' => 'manager_003',
            'email' => 'manager_003@manager.com',
            'name' => 'manager_003',
            'level' => 2,
            'password' => Hash::make('manager_003'),
        ]);
        
        DB::table('managers')->insert([
            'code' => 'manager_004',
            'email' => 'manager_004@manager.com',
            'name' => 'manager_004',
            'level' => 2,
            'password' => Hash::make('manager_004'),
        ]);
    }
}
