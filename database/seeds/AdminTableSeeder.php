<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'acct_type' => '1',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('admin1234'),
            'remember_token' => Str::random(10),
        ]);
    }
}
