@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Pantry</h2>
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
                <form method="GET" action="{{ route('pantries.index') }}"
                    class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-2">
                        <a href="{{ route('pantries.index') }}" class="float-right">Refresh</a>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('pantries.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Snack</th>
                        <th scope="col">Food</th>
                        <th scope="col">Drink</th>
                        <th scope="col">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pantries as $pantries)
                        <tr>
                            <td>{{ $pantries->snack }}</td>
                            <td>{{ $pantries->food }}</td>
                            <td>{{ $pantries->drink }}</td>
                            <td>
                                <a href="{{ route('pantries.index') }}" class="btn btn-primary">Delete</a>
                                <a href="{{ route('pantries.index') }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
