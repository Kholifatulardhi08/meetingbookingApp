@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Booking') }}
                        <a href="{{ route('bookings.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookings.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="snack"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Snack') }}</label>

                                <div class="col-md-6">
                                    <input id="snack" type="snack"
                                        class="form-control @error('snack') is-invalid @enderror" name="snack"
                                        value="{{ old('snack') }}" required autocomplete="code">

                                    @error('snack')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Creat By') }}</label>

                                <div class="col-md-6">
                                    <select name="user-id" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking }}">{{ $booking->user->id }}</option>
                                        @endforeach
                                    </select>

                                    @error('creat by')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="room"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Room') }}</label>

                                <div class="col-md-6">
                                    <select name="room" class="form-control @error('room') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking }}">{{ $booking->room->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('room')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="instance"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Instance') }}</label>

                                <div class="col-md-6">
                                    <select name="instance" class="form-control @error('instance') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking }}">{{ $booking->instance->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('snack')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="instance"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input name="start_date" type="datetime-local">

                                    </input>

                                    @error('snack')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input name="end_date" type="datetime-local"></input>

                                    @error('snack')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
