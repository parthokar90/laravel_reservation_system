<?php 

namespace App\Repository;

use App\Models\Amenities;

use App\Repository\AmenitiesRepository;


class CreateAmenities implements AmenitiesRepository
{   
    protected $data = null;

    public function index()
    {
        return Amenities::all();
    }

    public function create(){
       
    }

    public function store($collection = [] )
    {   
        $data = new Amenities;
        $data->amenities = $collection['amenities'];
        $data->status = $collection['status'];
        return $data->save();
    }

    public function edit($id)
    {
        return Amenities::find($id);
    }


    public function update( $id=null, $collection = [] )
    {   
            $data = Amenities::find($id);
            $data->amenities = $collection['amenities'];
            $data->status = $collection['status'];
            return $data->save();
    }
    
    public function delete($id)
    {
        return Amenities::find($id)->delete();
    }
}