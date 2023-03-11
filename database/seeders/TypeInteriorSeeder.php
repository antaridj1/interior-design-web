<?php

namespace Database\Seeders;

use App\Models\TypeInterior;
use Illuminate\Database\Seeder;

class TypeInteriorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =  [
            [
                'name' => 'Home',
                'description' => '-',
            ],
            [
                'name' => 'Apartment',
                'description' => '-',
            ],
            [
                'name' => 'Office',
                'description' => '-',
            ],
            [
                'name' => 'Cafe',
                'description' => '-',
            ],
            [
                'name' => 'Villa',
                'description' => '-',
            ],
            [
                'name' => 'Guest House',
                'description' => '-',
            ],
           
        ];

        foreach($types as $type){
            TypeInterior::create($type);
        } 
    }
}
