@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Booking') }}
                        <a href="{{ route('bookings.index') }}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update/bookings/' . $bookings->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $bookings->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="snack"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Snack') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="snack" value="{{ $bookings->snack }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Creat By') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="user_id" value="{{ $bookings->user->name }}" class="form-control">
                                </div>
                            </div><div class="row mb-3">
                                <label for="room"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Room') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="room" value="{{ $bookings->room->name }}" class="form-control">
                                </div>
                            </div><div class="row mb-3">
                                <label for="instance"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Instance') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="instance" value="{{ $bookings->instance->name }}" class="form-control">
                                </div>
                            </div><div class="row mb-3">
                                <label for="start_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>
                                <div class="col-md-6">
                                    <input name="start_date" type="datetime-local" value="{{ $bookings->start_date }}"></input>
                                </div>
                            </div><div class="row mb-3">
                                <label for="end_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>
                                <div class="col-md-6">
                                    <input name="end_date" type="datetime-local" value="{{ $bookings->end_date }}"></input>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('Update') }}</button>
                                    <a href="{{ url('delete-bookings/' . $bookings->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
