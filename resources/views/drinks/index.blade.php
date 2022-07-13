@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Drink</h2>
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
                <form method="GET" action="{{ route('drinks.index') }}"
                    class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-5">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search Drink">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('drinks.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drinks as $drinks)
                        <tr>
                            <td>{{ $drinks->name }}</td>
                            <td>{{ $drinks->qty }}</td>
                            <td>
                                <a href="{{ url('drinks/edit/' . $drinks->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
