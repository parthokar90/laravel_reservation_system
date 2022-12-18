
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Room</div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ route('rooms.store') }}" enctype="multipart/form-data">
                  @csrf
               
  
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Description</label>
                        <textarea class="form-control" name="description" cols="5" rows="5" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Photo</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Size</label>
                        <input type="text" class="form-control" name="size" required>
                    </div>

                    
                    <div class="form-group">
                        <label for="type">Occupancy</label>
                        <input type="text" class="form-control" name="occupancy" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Price</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Select Amenities</label>
                        <select  class="form-control" name="amenities_id[]" multiple>
                            @foreach($amenities as $am)
                              <option value="{{$am->id}}">{{$am->amenities}}</option>
                            @endforeach 
                        </select>
                    </div>
                       
                    <div class="form-group">
                        <label for="type">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
 