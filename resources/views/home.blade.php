@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{route('amenities.index')}}">Amenities List</a></li>
                        <li><a href="{{route('rooms.index')}}">Room List</a></li>
                        <li><a href="{{route('booking.index')}}">Booking List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
