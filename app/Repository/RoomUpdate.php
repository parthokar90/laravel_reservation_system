<?php 

namespace App\Repository;

use App\Models\Room;

use App\Models\RoomAmenities;

use App\Repository\RoomRepository;


class RoomUpdate implements RoomRepository
{   
    protected $data = null;

    public function index()
    {
        return Room::all();
    }

    public function create(){
       
    }

    public function store($collection = [] )
    {   

        $imageName = time().'.'.$collection['photo']->extension();  
        $collection['photo']->move(public_path('room'), $imageName);

        $data = new Room;
        $data->name = $collection['name'];
        $data->description = $collection['description'];
        $data->photo = $imageName;
        $data->size = $collection['size'];
        $data->occupancy = $collection['occupancy'];
        $data->price = $collection['price'];
        $data->status = $collection['status'];
        $data->save();

        //room amenities 
        for($i=0;$i<count($collection['amenities_id']);$i++){
           $ame = new RoomAmenities;
           $ame->room_id = $data->id;
           $ame->amenities_id = $collection['amenities_id'][$i];
           $ame->save();
        }

        return $ame;

    }

    public function edit($id)
    {
        return Room::find($id);
    }


    public function update( $id=null, $collection = [] )
    {   

        $data =  Room::find($id);
        if($collection['photo']!=''){
            $imageName = time().'.'.$collection['photo']->extension();  
            $collection['photo']->move(public_path('room'), $imageName);
        }else{
            $imageName = $data->photo;  
        }
       
        $data->name = $collection['name'];
        $data->description = $collection['description'];
        $data->photo = $imageName;
        $data->size = $collection['size'];
        $data->occupancy = $collection['occupancy'];
        $data->price = $collection['price'];
        $data->status = $collection['status'];
        $data->save();

        //room amenities 
        RoomAmenities::where('room_id',$data->id)->delete();
        for($i=0;$i<count($collection['amenities_id']);$i++){
           $ame = new RoomAmenities;
           $ame->room_id = $data->id;
           $ame->amenities_id = $collection['amenities_id'][$i];
           $ame->save();
        }

        return $ame;
    }
    
    public function delete($id)
    {
        return Room::find($id)->delete();
    }
}