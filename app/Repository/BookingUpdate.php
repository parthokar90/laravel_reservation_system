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

    public function delete($id){
      return Booking::find($id)->delete();
    }

    public function approveBook($id,$status){
      $data = Booking::find($id);
      $data->approved_by = auth()->user()->id;
      $data->status = $status;
      return $data->save();
    }
}