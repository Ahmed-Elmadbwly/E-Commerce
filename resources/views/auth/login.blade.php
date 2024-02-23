@extends('layout.auth')

@section('content')
    <section class="sign-in" style="margin-top: 50px;">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                        <span style="color: red;"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input name="password" type="password" required autocomplete="current-password"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
