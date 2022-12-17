
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List</div>
                <div>
                    <a href="{{ route('amenities.create') }}" style="float:right; margin-right:10px;">Create Amenities</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                      <p class="alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Amenities</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->amenities }}</td>
                                    <td>{{ $item->status==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('amenities.edit',$item->id) }}">Edit</a> 
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 