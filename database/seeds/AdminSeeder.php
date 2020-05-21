<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@vcommerce.test',
            'password' => Hash::make('admin'),
            'roles' => json_encode(['ADMIN']),
            'address' => 'Jl. Test No. 404',
            'phone' => '12345678910',
        ]);
    }
}
