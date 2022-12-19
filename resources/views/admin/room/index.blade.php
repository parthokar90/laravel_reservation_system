
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List</div>
                <div>
                    <a href="{{ route('rooms.create') }}" style="float:right; margin-right:10px;">Create Room</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                      <p class="alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img width="30px" height="30px" src="/room/{{ $item->photo }}"></td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->status==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('rooms.edit',$item->id) }}">Edit</a> 

                                        <form action="{{route('rooms.destroy',[$item->id])}}" method="POST">
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
 