@extends('layouts.siswa')

@section('navigation')
@include('navigation.siswa')
@endsection
@section('content')
<div class="container py-5 mt-4">
    <div class="d-flex justify-content-center">
        <div class="card text-center border-dark mb-3 shadow bg-dark" style="width: 38rem; height: 18rem;">
            <div class="card-header text-white">
                Silahkan login
            </div>
            <div class="card-body shadow">
                <form method="POST" action="{{ route('siswa.login') }}">
                    @csrf

                    <div class="form-group row text-white mb-2">
                        <label for="nis" class="col-sm-4 col-form-label text-md-right">{{ __('NIS') }}</label>

                        <div class="col-md-6">
                            <input id="nis" type="text"
                                class="form-control{{ $errors->has('nis') ? ' is-invalid' : '' }}" name="nis"
                                value="{{ old('nis') }}" required autofocus>

                            @if ($errors->has('nis'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nis') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row text-white mb-2">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection