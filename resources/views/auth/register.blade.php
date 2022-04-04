@extends('layouts.auth')

@section('content')
<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo" style="margin-top: 1rem;margin-bottom: 1rem;">
            <a href="{{ route('welcome') }}"><img src="{{asset('template/custom/logo.png')}}" alt="Logo"></a>
        </div>
        <p class="auth-text mb-5">Aplikasi Pendataan Warga</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat E-mail">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Kata Sandi">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Masuk</button>
        </form>

        <div class="text-center mt-4 text-lg fs-5">
            <p class="text-gray-600">
                Sudah punya akun?
                <a href="{{__('login')}}" class="font-bold">Masuk</a>.
            </p>
        </div>
    </div>
</div>
@endsection