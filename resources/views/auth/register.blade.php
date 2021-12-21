@extends('layouts.app')

@section('content')
<section class="pt-5 pb-0 login spad">
    <div class="container">
        <div class="row" style="margin-bottom: 100px">
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input__item">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>
                            <span class="icon_profile"></span>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            <span class="icon_mail"></span>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            <span class="icon_lock"></span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5 login__register">
                    <h3>Have An Account?</h3>
                    <a href="{{ route('login') }}" class="primary-btn">Login Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
