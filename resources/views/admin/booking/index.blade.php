
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
                                <th>Check In</th>
                                <th>Check Out</th>
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
                                    <td>{{ date('d-M-Y',strtotime($item->check_in)) }}</td>
                                    <td>{{ date('d-M-Y',strtotime($item->check_out)) }}</td>
                                    <td>{{ optional($item->customer)->name }}</td>
                                    <td>{{ optional($item->approvedBy)->name }}</td>
                                    <td>{{ $item->status==1 ? 'Approve' : 'Reject' }}</td>
                                    <td>
                                        @if($item->status==1)
                                          <a class="btn btn-danger" href="{{ route('book_approve',array('id'=>$item->id,'status'=>0)) }}">Reject</a> 
                                          @else 
                                          <a class="btn btn-success" href="{{ route('book_approve',array('id'=>$item->id,'status'=>1)) }}">Approve</a> 
                                        @endif 

                                        <form action="{{route('booking.destroy',[$item->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>               
                                        </form>
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
 