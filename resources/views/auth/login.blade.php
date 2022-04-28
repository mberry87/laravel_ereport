@extends('layouts.auth')

@section('title', 'Halaman Login')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan login untuk memulai</p>
            @if ($message = Session::get('msg'))
                <div class="alert alert-info">
                    {{ $message }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="Alamat email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Kata sandi">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Masuk') }}</button>
                    </div>
                </div>
            </form>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('Daftar akun baru') }}</a>
            </p>
        </div>
    </div>
@endsection
