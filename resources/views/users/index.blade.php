@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">User</h2>
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
            <a href="{{ route('users.create') }}" class="float-right">Create</a>
        </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                    <tr>
                        <th scope="row">{{ $users->id }}</th>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $users->id) }}" class="btn btn-light">EDIT</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
