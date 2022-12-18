
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List</div>
                <div class="card-body">
                    @if(Session::has('success'))
                      <p class="alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Room</th>
                                <th>Amenities</th>
                                <th>Customer</th>
                                <th>Approved By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ optional($item->room)->name }}</td>
                                    <td>{{ optional($item->amenities)->amenities}}</td>
                                    <td>{{ optional($item->customer)->name }}</td>
                                    <td>{{ optional($item->approvedBy)->name }}</td>
                                    <td>{{ $item->status==1 ? 'Approve' : 'Reject' }}</td>
                                    <td>
                                        <a href="{{ route('booking.edit',$item->id) }}">Edit</a> 
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
 