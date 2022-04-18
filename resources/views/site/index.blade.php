@extends('includes.site_layout')
@section('content')

<div class="main-wrapp home">
    <div class="container">
        @if ($productsHero->count() > 3)

        <div class="padd-80">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="det-img ellem" style="height: 300px">
                        <img src="{{asset($productsHero[0]->photo)}}" style="height: 100%;object-fit: cover;" alt="">
                    </div>
                    <span class="name-hero">
                        <p style="font-weight: 900;text-shadow: #FFF 1px 0 10px;text-transform: uppercase;">
                            {{$productsHero[0]->{'name_'.app()->getLocale() } }}</p>
                    </span>
                </div>
                <div class="col-sm-6 col-xs-12" style="position: relative">
                    <div class="det-img ellem" style="height: 300px;">
                        <img src="{{asset($productsHero[1]->photo)}}" style="height: 100%;object-fit: cover;" alt="">
                    </div>
                    <span class="name-hero">
                        <p style="font-weight: 900;text-shadow: #FFF 1px 0 10px;text-transform: uppercase;">
                            {{$productsHero[1]->{'name_'.app()->getLocale() } }}</p>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="det-img ellem" style="height: 250px">
                        <img src="{{asset($productsHero[2]->photo)}}" style="height: 100%;object-fit: cover;" alt="">
                    </div>
                    <span class="name-hero">
                        <p style="font-weight: 900;text-shadow: #FFF 1px 0 10px;text-transform: uppercase;">
                            {{$productsHero[2]->{'name_'.app()->getLocale() } }}</p>
                    </span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="det-img ellem" style="height: 250px">
                        <img src="{{asset($productsHero[3]->photo)}}" style="height: 100%;object-fit: cover;" alt="">
                    </div>
                    <span class="name-hero">
                        <p style="font-weight: 900;text-shadow: #FFF 1px 0 10px;text-transform: uppercase;">
                            {{$productsHero[3]->{'name_'.app()->getLocale() } }}</p>
                    </span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="det-img ellem" style="height: 250px">
                        <img src="{{asset($productsHero[4]->photo)}}" style="height: 100%;object-fit: cover;" alt="">
                    </div>
                    <span class="name-hero">
                        <p style="font-weight: 900;text-shadow: #FFF 1px 0 10px;text-transform: uppercase;">
                            {{$productsHero[4]->{'name_'.app()->getLocale() } }}</p>
                    </span>
                </div>
            </div>

        </div>
        @endif
        <div class="center-slide-categories" style="padding-bottom: 80px;">
            @foreach ($categories as $item)
            <a href="">
                <div class="det-img ellem center-slide-categorie">
                    <img src="{{asset($item->photo)}}" alt="">
                    <div class="overlay-color"></div>
                    <p class="name-slide-categorie"> {{$item->{'name_'.app()->getLocale() } }} </p>
                </div>
            </a>
            @endforeach

        </div>

        <div class="row" style="padding-bottom: 80px;">
            <div class="col-md-12">
                <div class="swiper-container slider-7" data-autoplay="3000" data-touch="1" data-mouse="0"
                    data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3"
                    data-lg-slides="3" data-loop="0" data-speed="1800" data-mode="horizontal" id="slider-7">
                    <div class="swiper-wrapper">

                        @foreach ($categories as $item)
                        <div class="swiper-slide">
                            <a href="">
                                <div class="det-img ellem center-slide-categorie det-slider-shop">
                                    <img src="{{asset($item->photo)}}" alt="">
                                    <div class="overlay-color"></div>
                                    <p class="name-slide-categorie">{{$item->{'name_'.app()->getLocale() } }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <div class="pagination"></div>
                </div>
                <div class="slide-prev arrow-style-1"><span class="fa fa-angle-left"></span></div>
                <div class="slide-next arrow-style-1"><span class="fa fa-angle-right"></span></div>
            </div>
        </div>

        <div class="padd-80">
            <div class="row">
                <div id="filters" class="fillter-wrap">
                    <button class="but activbut" data-filter="*">@lang('All')</button>
                    @foreach ($categoriesFilter as $item)
                    <button class="but" data-filter=".{{ $item->name_en }}">{{ $item->{'name_'.app()->getLocale() } }}</button>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="izotope-container gutt-col3 sliphover">
                    <div class="grid-sizer"></div>

                    @foreach ($product as $item)
                    <div class="item {{ $item->category->name_en }}">
                        <a href="{{ route('details',$item->id)}}"></a>
                        <div class="det-img ellem"
                            data-caption="<a href='{{ route('details',$item->id)}}' class='sleep-title'><span class='vertical-align'><h4>{{ $item->{"name_".app()->getLocale() } }}</h4><span class='pr-sutitle'>{{ $item->price }} / <span class='style-link-1'>{{ $item->solde }}</span></span></span></a>">
                            <img src="{{asset($item->photo)}}" alt="">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
