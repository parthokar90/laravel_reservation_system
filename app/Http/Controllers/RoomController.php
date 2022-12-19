<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\RoomRepository;

use App\Models\Amenities;

use App\Models\RoomAmenities;

class RoomController extends Controller
{

    public $room;
    
    public function __construct(RoomRepository $room)
    {
        $this->room = $room;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->room->index();

        return view('admin.room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenities::all();
        return view('admin.room.create',compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->room->store($request);
        return redirect()->route('rooms.index')->with('success','Data store Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->room->edit($id);
        $amenities = Amenities::all();
        $selected_amenities = RoomAmenities::where('room_id',$id)->join('amenities','amenities.id','=','room_amenities.amenities_id')->select('amenities')->get();
        return view('admin.room.edit',compact('data','amenities','selected_amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->room->update($id,$request);
        return redirect()->route('rooms.index')->with('success','Data Udate Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->room->delete($id);
        return redirect()->route('rooms.index')->with('success','Data Delete Successful');
    }
}
