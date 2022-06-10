<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('members')->insert([
           'name' => 'John',
           'nic' => '164976484619N',
           'email' => 'john@gmail.com',
           'address' => 'Wellawatta, Colombo',
           'expire_on' => '2022-12-12',
           'created_at' => now(),
           'updated_at' => now(),
       ]);
        DB::table('members')->insert([
            'name' => 'Mary',
            'nic' => '194653256986N',
            'email' => 'mary@gmail.com',
            'address' => 'Wattala, Colombo',
            'expire_on' => '2023-04-05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('members')->insert([
            'name' => 'Peter',
            'nic' => '497979936408N',
            'email' => 'peter@gmail.com',
            'address' => 'Dehiwala, Colombo',
            'expire_on' => '2023-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('members')->insert([
            'name' => 'Anne',
            'nic' => '795797975268N',
            'email' => 'anne@gmail.com',
            'address' => 'Pettah, Colombo',
            'expire_on' => '2022-06-05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
