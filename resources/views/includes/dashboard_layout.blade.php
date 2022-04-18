<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />


        <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
            <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <link href="{{asset('css/animsition.min.css')}}" rel="stylesheet"/>
	        <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet"/>
            <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
{{-- nedded for catalog --}}
            <link href="{{asset('css/font.css')}}" rel="stylesheet" />
            <link href="{{asset('css/slider.css')}}" rel="stylesheet"/>
            <!-- SweetAlert2 -->
{{-- dropify --}}
        <link rel="stylesheet" href="{{asset('css/dropify.css')}}">

      <title>Acerola</title>
  </head>
<body class="animsition">

<div class="" style="display: flex;">
    <div class="main-side">
       @include('includes.sidebar')
    </div>
    <div class="" style="background-color: #F6F6F9;width: 100%;position: relative;">
        @include('includes.topmenu')
        
        @yield('content')
    </div>
</div>

<script>
    function openForm() {
        document.getElementById("popup").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popup").style.display = "none";
    }

</script>


    <script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/jquery.countTo.js')}}"></script>
    <script src="{{asset('js/jquery.animsition.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.sliphover.min.js')}}"></script>
    <script src="{{asset('js/idangerous.swiper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-slider.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/dropify.js')}}"></script>
    {{-- dropify --}}
    <script>
        $('.dropify').dropify();
    </script>





</body>
</html>
