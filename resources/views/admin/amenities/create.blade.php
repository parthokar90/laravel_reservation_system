
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Amenities</div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ route('amenities.store') }}">
                  @csrf
               
  
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Amenities</label>
                        <input type="text" class="form-control" name="amenities" required>
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
 