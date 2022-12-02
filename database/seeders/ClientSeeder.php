<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'code' => '001',
            'cnpj' => '001',
            'name' => 'teste1',
            'foundation_date' => now(),
            'group_id' => 1
        ]);

        DB::table('clients')->insert([
            'code' => '002',
            'cnpj' => '002',
            'name' => 'teste2',
            'foundation_date' => now(),
            'group_id' => 1
        ]);

        DB::table('clients')->insert([
            'code' => '003',
            'cnpj' => '003',
            'name' => 'teste3',
            'foundation_date' => now(),
            'group_id' => 2
        ]);
        
        DB::table('clients')->insert([
            'code' => '004',
            'cnpj' => '004',
            'name' => 'teste4',
            'foundation_date' => now(),
            'group_id' => 2
        ]);
    }
}
