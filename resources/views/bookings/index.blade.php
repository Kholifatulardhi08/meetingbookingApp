@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Booking</h2>
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-header">
                <form method="GET" action="{{ route('bookings.index') }}"
                    class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-5">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search booking">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('bookings.create') }}" class="btn btn-danger">Create</a>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Snack</th>
                        <th scope="col">Create</th>
                        <th scope="col">Room</th>
                        <th scope="col">Instance</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $bookings)
                        <tr>
                            <td>{{ $bookings->name }}</td>
                            <td>{{ $bookings->snack }}</td>
                            <td>{{ $bookings->user->name }}</td>
                            <td>{{ $bookings->room->name }}</td>
                            <td>{{ $bookings->instance->name }}</td>
                            <td>{{ $bookings->start_date }}</td>
                            <td>{{ $bookings->end_date }}</td>
                            <td>
                                <a href="{{ url('bookings/edit/' . $bookings->id) }}" class="btn btn-danger">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
