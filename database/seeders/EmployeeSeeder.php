<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $employees =  [
            [
                'name' => 'Arsitek A',
                'email' => 'arsitek1@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => false
            ],
            [
                'name' => 'Arsitek B',
                'email' => 'arsitek2@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => false
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => true
            ],
           
        ];

        foreach($employees as $employee){
            Employee::create($employee);
        } 
       
    }
}
