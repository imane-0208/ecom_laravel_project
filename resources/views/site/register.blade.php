@extends('includes.site_layout')
@section('content')

<div class="mt-200 mb-200 login ">

    <div class="content-login">
        <div class="col-md-5">
            <div class="contact-form">
                <div class="subtitle">
                      <h2 class="text-center">@lang('Register')</h2>
                  </div>
                  <form action="{{ route('register') }}" method="post" name="contactform">
                    @csrf

                      <input id="name" type="text" class="@error('name') is-invalid @enderror" placeholder="@lang('Name')" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                      <input id="email" type="email" class="@error('email') is-invalid @enderror" placeholder="@lang('Email')" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                      <input id="password" type="password" class="@error('password') is-invalid @enderror" placeholder="@lang('password')" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                      <input id="password-confirm" type="password" placeholder="@lang('Confirm password')" name="password_confirmation" required autocomplete="new-password" required><br>

                      <input type="submit" value="@lang('Register')" name="submit">
                      <p>@lang('You already have an account') : <strong><a href="{{route('login')}}">@lang('Log in')</a></strong></p>
                  </form>
            </div>
        </div>
    </div>

</div>

@endsection
