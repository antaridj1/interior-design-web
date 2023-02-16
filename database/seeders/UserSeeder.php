<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  [
            [
                'name' => 'Unit A',
                'email' => 'unit1@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'unit'
            ],
            [
                'name' => 'Pegawai 1',
                'email' => 'pegawai1@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'pegawai'
            ],
            [
                'name' => 'Pegawai 2',
                'email' => 'pegawai2@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'pegawai'
            ],
            [
                'name' => 'Master Admin',
                'email' => 'masteradmin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'master_admin'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        } 
       
    }
}
