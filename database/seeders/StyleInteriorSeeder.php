<?php

namespace Database\Seeders;

use App\Models\StyleInterior;
use Illuminate\Database\Seeder;

class StyleInteriorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles =  [
            [
                'name' => 'Modern',
                'image' => 'modern.jpg',
                'description' => 'Modern Interior',
            ],
            [
                'name' => 'Minimalis',
                'image' => 'minimalis.jpg',
                'description' => 'Minimalis Interior',
            ],
            [
                'name' => 'Scandinavian',
                'image' => 'scandinavian.jpg',
                'description' => 'Scandinavian Interior',
            ],
            [
                'name' => 'Asian',
                'image' => 'asian.jpg',
                'description' => 'Asian Interior',
            ],
            [
                'name' => 'Luxury',
                'image' => 'luxury.jpg',
                'description' => 'Luxury Interior',
            ],
            [
                'name' => 'Industrial',
                'image' => 'industrial.jpg',
                'description' => 'Industrial Interior',
            ],
           
        ];

        foreach($styles as $style){
            StyleInterior::create($style);
        } 
    }
}
