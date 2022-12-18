
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Booking </div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ route('booking.update',$data->id) }}">
                  @csrf
                  @method('PUT')
               
  
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Room</label>
                        <select class="form-control" name="room_id">
                            <option value="{{$data->room->id}}" selected>{{$data->room->name}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Amenities</label>
                        <select class="form-control" name="amenities_id">
                            <option value="{{$data->amenities->id}}" selected>{{$data->room->name}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Customer</label>
                        <select class="form-control" name="user_id">
                            <option value="{{$data->customer->id}}" selected>{{$data->customer->name}}</option>
                        </select>
                    </div>
                       
                    <div class="form-group">
                        <label for="type">Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if($data->status==1) selected @endif>Approve</option>
                            <option value="0" @if($data->status==0) selected @endif>Reject</option>
                        </select>
                    </div>
  
                      <button type="submit" class="btn btn-primary">
                              <i class="fas fa-plus-circle"></i>
                              <span>Update</span>
                      </button>
  
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 