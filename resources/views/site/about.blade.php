@extends('includes.site_layout')
@section('content')
<div class="main-wrapp start-line time-line">
    <div class="container">
        <div class="padd-80">
             <div class="row">
                  <div class="col-md-12">
                    <div class="second-heading">
                     <div class="leyer-title"></div>
                         <div class="clip">
                             <div class="bg bg-bg-chrome" style="background-image:url(img/about_image_2.jpg)">
                             </div>
                         </div>
                         <div class="vertical-align">
                             <div class="second-heading-txt">
                                <h2>@lang('about')</h2>
                                  <div class="separ"></div>
                             </div>
                         </div>
                    </div>
                  </div>
             </div>

        </div>
        <div class="padd-80">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-uppercase">@lang('first title about')</h2>
                    <p class="mt-20">
                        @lang('first text about')
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('img/about_image_2.jpg')}}" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="padd-80">
            <div class="row">
                <div class="col-md-6 ">
                    <img src="{{asset('img/about_image_2.jpg')}}" width="100%" alt="">
                </div>
                <div class="col-md-6 ">
                    <h2 class="text-uppercase">@lang('second title about')</h2>
                    <p class="mt-20">
                        @lang('second text about')
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
