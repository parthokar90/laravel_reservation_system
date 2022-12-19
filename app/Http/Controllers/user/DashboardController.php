<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        return response()->json($user);
 
     }

     public function roomList(){
         $room = Room::orderBy('id','DESC')->get();
         $path=asset('room/');
         $data          = [];
        foreach ($room as $rooms) {
            $data[]       = [
                'id'         => $rooms->id,
                'name'=>$rooms->name,
                'photo'      =>  $path.'/'.$rooms->photo,
                'description'      => $rooms->description,
                'size' => $rooms->size,
                'price'       => $rooms->price,
            ];
        }
        return response()->json($data);
     }

     public function roomBook(Request $request){

        $checkRoom = Booking::where('room_id',$request->room_id)->count();

        if($checkRoom>0){
            return response()->json([
                'status'=>200,
                'message'=>'Room already booked'
            ]);
        }

        $user = Auth::user();
        Booking::insert([
          'check_in'=>$request->checkIn,
          'check_out'=>$request->checkOut,
          'room_id'=>$request->room_id,
          'user_id'=> $user->id,
          'status'=>0,
          'approved_by'=>0,
          'created_at'=>Carbon::now(),
          'updated_at'=>Carbon::now(),
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'Room book success'
        ]);
     }
}
