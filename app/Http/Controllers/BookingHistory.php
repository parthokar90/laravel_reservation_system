<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\BookingRepository;

class BookingHistory extends Controller
{

    public $booking;
    
    public function __construct(BookingRepository $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->booking->index();
        return view('admin.booking.index',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->booking->delete($id);
        return redirect()->route('booking.index')->with('success','Booking deleted Successful');
    }

    public function approveBook($id,$status){
        $this->booking->approveBook($id,$status);
        return redirect()->route('booking.index')->with('success','Booking update Successful');
    }
}
