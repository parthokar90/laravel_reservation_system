<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Amenities;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'amenities'=>'Wifi',
                'status'=>1,
            ],
            [
                'amenities'=>'Breakfast',
                'status'=>1,
            ],
            [
                'amenities'=>'Ac',
                'status'=>1,
            ],
          
        ];

        foreach($data as $amenities){
            Amenities::create($amenities);
        }
    }
}
