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
                <form method="GET" action="{{ route('users.index') }}" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-5">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search user">
                        </div>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </form>
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
