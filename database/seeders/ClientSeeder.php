<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    use RefreshDatabase;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $group1 = Group::where('code', '01')->first();
        $group2 = Group::where('code', '02')->first();

        $client1 = new Client();
        $client1->fill(
            [
                'code' => '001',
                'cnpj' => '001',
                'name' => 'teste1',
                'foundation_date' => now(),
                'group_id' => $group1->id
            ]
        );
        $client1->save();
        


        $client2 = new Client();
        $client2->fill(
            [
                'code' => '002',
                'cnpj' => '002',
                'name' => 'teste2',
                'foundation_date' => now(),
                'group_id' => $group1->id
            ]
        );
        $client2->save();
        
        $client3 = new Client();
        $client3->fill(
            [
                'code' => '003',
                'cnpj' => '003',
                'name' => 'teste3',
                'foundation_date' => now(),
                'group_id' => $group2->id
            ]
        );
        $client3->save();

        $client4 = new Client();
        $client4->fill(
            [
                'code' => '004',
                'cnpj' => '004',
                'name' => 'teste4',
                'foundation_date' => now(),
                'group_id' => $group2->id
            ]
        );
        $client4->save();
    }
}
