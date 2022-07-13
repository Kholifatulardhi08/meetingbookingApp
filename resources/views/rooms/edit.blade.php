@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Room') }}
                        <a href="{{ route('rooms.index') }}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update/rooms/' . $rooms->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $rooms->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" value="{{ $rooms->code }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="capacity" value="{{ $rooms->capacity }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    <a href="{{ url('delete-rooms/' . $rooms->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
