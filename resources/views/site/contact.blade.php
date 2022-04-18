@extends('includes.site_layout')
@section('content')

<div class="main-wrapp">
    <div class="container">
         <div class="padd-80">
        <div class="row">
            <div class="col-md-12">
               <div class="second-heading">
                 <div class="leyer-title"></div>
                 <div class="clip">
                     <div class="bg bg-bg-chrome" style="background-image:url(img/about_image.jpg)">
                     </div>
                 </div>
                 <div class="vertical-align">
                     <div class="second-heading-txt">
                        <h2>@lang('Contact us')</h2>
                          <div class="separ"></div>
                     </div>
                 </div>
              </div>
            </div>
         </div>
       </div>

            <div class="row">
                <div class="col-md-6">
                <div class="row">
                   <div class="col-md-12">
                     <div class="subtitle">
                           <h4>@lang('Get in touch')</h4>
                       </div>
                       <p>
                        @lang('contact text')
                        </p>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-4 col-sm-4 col-xs-12">
                       <div class="adress-block">

                              <h5>@lang('Email')</h5>
                                <a href="mailto:">{{$pages->where('name','email')->first()->{'value_'.app()->getLocale() }??'' }}</a>
                       </div>
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                       <div class="adress-block">

                              <h5>@lang('Phone')</h5>
                                <a href="tel:">{{$pages->where('name','phone')->first()->{'value_'.app()->getLocale() }??'' }}</a>
                       </div>
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                       <div class="adress-block">
                              <h5>@lang('Address')</h5>
                                <p>
                                    {{$pages->where('name','address')->first()->{'value_'.app()->getLocale() }??'' }}
                                </p>
                       </div>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                 <div class="contact-form">
                     <div class="subtitle">
                           <h4>@lang('Do you have a questions?')</h4>
                       </div>
                       <form action="{{route('contact.send')}}" method="post" name="contactform">
                        @csrf
                           <input type="text" placeholder="@lang('Name')" name="name" required>
                           <input type="email" placeholder="@lang('Email')" name="email" required>
                           <input type="text" placeholder="@lang('Subject')" name="subject">
                           <textarea placeholder="@lang('message')"  name="message" required></textarea>
                           <input type="submit" value="@lang('send message')" name="submit">
                       </form>
                 </div>
             </div>
            </div>
       </div>
    </div>
 </div>
 <div class="map">
      <div class="map-canvas" id="map-canvas-contact" data-lat="40.7797115" data-lng="-74.1755574" data-zoom="13" data-style="style-1">
      </div>
 </div>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
@endsection
