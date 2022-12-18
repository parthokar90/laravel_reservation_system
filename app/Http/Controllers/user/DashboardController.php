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
         return response()->json($room);
     }
}
