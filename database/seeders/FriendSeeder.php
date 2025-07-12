<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->insert([
            'id' => 1,
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('secret'),
            'age' => '100',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
