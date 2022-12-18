<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Room;

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
}
