@extends('layouts.auth')

@section('content')
<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo mt-4" style=";margin-bottom: 1rem;">
            <a href="{{ route('welcome') }}"><img src="{{asset('template/custom/logo.png')}}" alt="Logo"></a>
        </div>
        <p class="auth-text mb-5">Aplikasi Pendataan Warga</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username atau E-mail">
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
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Masuk</button>
        </form>

        <div class="text-center mt-4 text-lg fs-5">
            <p class="text-gray-600">
                Belum punya akun?
                <a href="{{__('register')}}" class="font-bold">Daftar</a>.
            </p>
        </div>
    </div>
</div>
@endsection