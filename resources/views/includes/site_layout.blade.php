<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>



      <title>Acerola</title>
  </head>
<body class="animsition">

  <script src="{{asset('js/sweet-alert.js')}}"></script>

    @include('includes.site_header')
    @yield('content')
    @include('includes.footer')


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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script>
      var limit = 3;
      var checked = 0;
      $('.single-checkbox').on('change', function() {
        if($(this).is(':checked'))
          checked = checked+1;

        if($(this).is(':checked') == false)
          checked = checked-1;

        if(checked > limit) {
          this.checked = false;
          checked = limit;
        }
      });
    </script>

<script>
  $('.center-slide-categories').slick({
  // centerMode: true,
  // centerPadding: '60px',
  slidesToShow: 5,
  autoplay: true,
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        // infinite: true,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        // infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
</script>

<script>
  function submitForm(elem) {
      if (elem.value) {
          elem.form.submit();
      }
  }
</script>
@auth
@if ($item->id??'')
<script >



    $('#updateProfile{{$item->id}}').on('change', function (e) {
        e.preventDefault();
        let id = "{{$item->id}}";
        let q = $('#quantity{{$item->id}}').val();
        $.ajax({
            url: window.your_route = "{{ route('cart.update',$item->id) }}",
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                quantity: q,
            },
            success: function (response) {
                if (response) {
                    console.log(response.cart);
                    location.reload();

                } else {
                    console.log('faild');
                }
            },
        });
    });
</script>
    @endif
@endauth
<script>
    $('#contactform').on('submit', function (e) {
        e.preventDefault();

        let email = $('#emailfooter').val();
        $.ajax({
            url: window.your_route = "{{ route('newslatter') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",

                email: email,
            },
            success: function (response) {
                if (response) {
                    $('.msg').replaceWith('<p class="msg">' +  response.msg +'</p>' );
                } else {
                    console.log('faild');
                }
            },
        });
    });
</script>

</body>
</html>
