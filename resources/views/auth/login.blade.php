@extends('layouts.app')

@section('custom_css')
<style>
    .is-invalid{
        background-color : rgb(255, 0, 0)!important;
    }
</style>
@endsection

@section('content')
<section class="">
    <div class="container">
        <div class="row pt-3" style="margin-bottom: 100px">
            <div class="text-center col-lg-12">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to Legion-Tix</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input__item">
                            {{-- @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            {{-- @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-white form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-btn">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5 login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="{{ route('register') }}" class="primary-btn">Register Now</a>
                </div>
                @if (Route::has('password.request'))
                    <div class="login__register">
                        <h3>{{ __('Forgot Your Password?') }}</h3>
                        <a href="{{ route('password.request') }}" class="primary-btn">Reset Password</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
