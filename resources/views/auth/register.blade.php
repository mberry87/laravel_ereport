@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Register user baru</p>
        <div class="alert alert-danger" style="display: none;" id="msg">
            <span>Password minimal 5 karakter serta gabungan angka dan huruf</span>
        </div>
        <div class="alert alert-danger" style="display: none;" id="msg2">
            <span>Password dan password konfirmasi tidak sama</span>
        </div>
        <form method="POST" action="{{ route('register') }}" onsubmit ="return verifyPassword()">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email"
                    name="email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Kata sandi">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block disabled" id="submit">Daftar</button>
                </div>

            </div>
        </form>
        <a href="{{ route('login') }}" class="text-center">Sudah punya akun?</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        var submitbtn = $('#submit');
        var msg = $('#msg');
        var msg2 = $('#msg2');
        var password = $('input[name=password]');
        var password_c = $('input[name=password_confirmation]');
        password.on('keyup', function (e) {
            var passRegex = new RegExp("^(?=.*[A-Za-z])(?=.*[0-9])(?=.{5,})");
            if (passRegex.test(e.target.value)) {
                msg.css('display', 'none');
            } else {
                msg.css('display', 'block');
            }
        });
        password_c.on('keyup', function (e) {
            var password1 = $('input[name=password]');
            if (password1[0].value !== e.target.value) {
                submitbtn.addClass('disabled');
                msg2.css('display', 'block');
            } else {
                msg2.css('display', 'none');
                submitbtn.removeClass('disabled');
            }
        });
    });

</script>
@endsection
