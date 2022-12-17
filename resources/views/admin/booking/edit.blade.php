
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Amenities</div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ route('amenities.update',$data->id) }}">
                  @csrf
                  @method('PUT')
               
  
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Amenities</label>
                        <input type="text" class="form-control" name="amenities" value="{{$data->amenities}}" required>
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
 