<?php 

namespace App\Repository;

use App\Repository\BookingRepository;

use App\Models\Booking;

class BookingUpdate implements BookingRepository{

    protected $data = null;

    public function index()
    {
        return Booking::with('room','amenities','customer','approvedBy')->get();
    }

    public function create(){

    }

    public function edit($id){
      return Booking::with('room','amenities','customer','approvedBy')->find($id);
    }

    public function store($collection = []){

    }

    public function update( $id = null, $collection = [] ){
      $data = Booking::find($id);
      $data->room_id = $collection['room_id'];
      $data->amenities_id = $collection['amenities_id'];
      $data->user_id = $collection['user_id'];
      $data->approved_by = auth()->user()->id;
      $data->status = $collection['status'];
      return $data->save();
    }

    public function delete($id){

    }
}