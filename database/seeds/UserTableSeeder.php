<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> Str::random(10),
            'email'=> Str::random(10)."@gmail.com",
            'password' => Hash::make('password'),
            'phone' => Str::random(10),
            'national_number' => Str::random(14),
            'national_number' => Str::random(16)
        ]);
    }
}
