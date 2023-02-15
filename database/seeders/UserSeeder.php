<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Database\Seeders\Hash;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_user')->insert([
            'userID' => 'ADM',
            'courseID' => 'NULL',
            'name' => 'binus',
            'address' => 'Universitas Bina Nusantara, Kemanggisan, Kembangan, Jakarta Barat.',
            'gender' => 'NULL',
            'email' => 'binus.edu@mail.com',
            'dob' => 'NULL',
            'school' => 'BINUS UNIVERSITY',
            'grade' => 'NULL',
            'username' => 'binus',
            'password' => Hash::make('123'),
            'category' => 'NULL',
            'userCategory' => 'admin',

        ]);
    }
}
