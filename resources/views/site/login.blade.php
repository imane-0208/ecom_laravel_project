@extends('includes.site_layout')
@section('content')

<div class="mt-200 mb-200 login ">

    <div class="content-login">
        <div class="col-md-6">
            <div class="contact-form">
                <div class="subtitle">
                      <h2 class="text-center">@lang('Log in')</h2>
                  </div>
                  <form action="{{ route('login') }}" method="post" name="contactform">

                    @csrf

                      <input type="email" class="@error('email') is-invalid @enderror" placeholder="@lang("Email")" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                      <input type="password" class="@error('password') is-invalid @enderror" placeholder="@lang('password')" id="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        {{-- <div class="" style="display: flex">
                            <input class="input-checkbox"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="" style="margin-left: 20px" for="remember"><p>Remember Me</p></label>
                        </div> --}}
                        <br><br>


                        <input type="submit" value="login" name="submit"><br>
                      <div class="help-login">
                        @if (Route::has('password.request'))
                              <a href="{{ route('password.request') }}"><p>@lang('Forgot Your Password') ?</p></a><br>

                          @endif
                        <p>@lang("You don't have an account") : <strong><a href="{{route('register')}}">@lang('Register')</a></strong></p>
                      </div><br><br>
                      <a href="{{ url('auth/google') }}" class="login-google">
                        <p><i class="bi bi-google"></i> @lang('Log in with Google')</p>
                    </a>
                    <br>
                      <a href="{{ url('auth/facebook') }}" class="login-google">
                        <p><i class="bi bi-facebook"></i> @lang('Log in with Facebook')</p>
                    </a>




                  </form>
            </div>
        </div>
    </div>

</div>

@endsection
