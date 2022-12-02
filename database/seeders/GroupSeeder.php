<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'code' => '01',
            'name' => 'GROUP1'
        ]);

        DB::table('groups')->insert([
            'code' => '02',
            'name' => 'GROUP2'
        ]);
    }
}
