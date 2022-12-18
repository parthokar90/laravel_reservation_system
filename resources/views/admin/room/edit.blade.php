
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Room</div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ route('rooms.update',$data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Description</label>
                        <textarea class="form-control" name="description" cols="5" rows="5" name="description" required>{{$data->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <img width="50px" height="50px" src="/room/{{ $data->photo }}">
                        <label for="type">Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>

                    <div class="form-group">
                        <label for="type">Size</label>
                        <input type="text" class="form-control" name="size" value="{{$data->size}}" required>
                    </div>

                    
                    <div class="form-group">
                        <label for="type">Occupancy</label>
                        <input type="text" class="form-control" name="occupancy" value="{{$data->occupancy}}" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$data->price}}" required>
                    </div>

                    <div class="form-group">
                      <label>Existing  Amenities</label>
                      @foreach($selected_amenities as $sem) 
                        <li>{{$sem->amenities}}</li>
                      @endforeach

                      <label>Select Amenities</label>
                      <select required class="form-control"  name="amenities_id[]" multiple="multiple">
                      @foreach($amenities as $am)
                          <option value="{{ $am->id }}">{{ $am->amenities}}</option>
                      @endforeach
                      </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="type">Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if($data->status==1) selected @endif>Active</option>
                            <option value="0" @if($data->status==0) selected @endif>Inactive</option>
                        </select>
                    </div>
  
                      <button type="submit" class="btn btn-primary">
                              <i class="fas fa-plus-circle"></i>
                              <span>Create</span>
                      </button>
  
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 