@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Room</h2>
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <form method="GET" action="{{ route('rooms.index') }}" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-2">
                        <a href="{{ route('rooms.index') }}" class="float-right">Refresh</a>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search room">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Room Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $rooms)
                        <tr>
                            <th scope="row">{{ $rooms->id }}</th>
                            <td>{{ $rooms->room_code }}</td>
                            <td>{{ $rooms->name }}</td>
                            <td>
                                <a href="{{ route('rooms.edit', $rooms->id) }}" class="btn btn-primary">EDIT</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
