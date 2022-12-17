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
      return Booking::find($id);
    }

    public function store($collection = []){

    }

    public function update( $id = null, $collection = [] ){

    }

    public function delete($id){

    }
}