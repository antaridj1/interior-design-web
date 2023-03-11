<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies =  [
            [
                'name' => 'SEMARA MULIA STUDIO',
                'address' => 'Jalan Subak Belaki, Batuyang, Batubulan Kangin, Gianyar, Bali',
                'telp' => '081929202666',
                'email' => 'semaramuliaofficial@gmail.com',
                'description' => 'Jasa Desain Interior & Produksi Interior berlokasi di BALI',
                'logo' => 'image.jpg',
                'favicon' => 'image.jpg',
                'jumbotron' => 'image.jpg',
            ]
        ];

        foreach($companies as $company){
            Company::create($company);
        } 
    }
}
