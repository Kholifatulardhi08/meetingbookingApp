@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="card">
                        <div class="card-header">
                            {{ __('Update Meals') }}
                            <a href="{{ route('meals.index') }}" class="float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('meals.update', $meals->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $meals->name) }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="qty"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Qty') }}</label>
                                    <div class="col-md-6">
                                        <input id="qty" type="qty"
                                            class="form-control @error('qty') is-invalid @enderror" name="qty"
                                            value="{{ old('qty', $meals->qty) }}" required autocomplete="qty">

                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('UPDATE') }}
                                        </button>
                                        <form method="POST" action="{{ route('meals.destroy', $meals->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">DELETE {{ $meals->name }} </button>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
