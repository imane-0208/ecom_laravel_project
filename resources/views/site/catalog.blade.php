@extends('includes.site_layout')
@section('content')

<div class="main-wrapp left-filter">
    <div class="container">
        <div class="padd-80">
            <div class="row">
                <div class="col-md-12">
                    <div class="second-heading">
                        <div class="leyer-title"></div>
                        <div class="clip">
                            <div class="bg bg-bg-chrome" style="background-image:url({{asset('img/shop_image.jpg')}})">
                            </div>
                        </div>
                        <div class="vertical-align">
                            <div class="second-heading-txt">
                                <h2>@lang('Shop')</h2>
                                <div class="separ"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="shop-bar">
                    <div class="shop-chose-wrap">
                        <span>@lang('Filter by'):</span>
                        <div class="drop-wrap">
                            <div class="drop">
                                <b>all</b>
                                <a href="#" class="drop-list"><i class="fa fa-sort-down"></i></a>
                                <span id="filters" class="filter-drop shop-style">
                                    <button class="but activbut" data-filter="*">@lang('All')</button>
                                    @foreach ($categories as $item)
                                    <button class="but" data-filter=".{{$item->{'name_'.app()->getLocale() } }}">{{$item->{'name_'.app()->getLocale()} }}</button>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="shop-chose-wrap">
                        <span>sort by:</span>
                        <div class="drop-wrap">
                            <div class="drop">
                                <b>newest</b>
                                <a href="#" class="drop-list"><i class="fa fa-sort-down"></i></a>
                                <span>
                                    <a href="#">newest</a>
                                    <a href="#">price</a>
                                    <a href="#">rating</a>
                                    <a href="#">popular</a>
                                </span>
                            </div>
                        </div>
                    </div> --}}<div class="search">
                        <form action="{{route('catalog.search')}}">
                            <input type="text" placeholder="@lang('Search') ..." name="name" class="s-field" required>
                            <div class="search-button">
                                <input type="submit" value="">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>
                    </div>
                    <div class="price-chose">


                            <span>@lang('Price')</span>
                            <div class="price-bar">
                                <b>€ 5</b>
                                <input type="text" class="h-slider" value="" data-slider-min="5"
                                data-slider-max="1000" id="textInput"   data-slider-step="5" data-slider-value="[0,1000]">
                                <b>€ 1000</b>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="right-shop-cont">
                    <div class="row">
                        <div class="izotope-container wh-33" id="products">
                            <div class="grid-sizer"></div>
                            @forelse ($products as $item)

                            <div class="item {{$item->category->{'name_'.app()->getLocale() } }}">
                                <div class="shop-item">
                                    <div class="layer-shop">
                                        <div class="vertical-align">
                                            <a href="{{ route('details',$item->id)}}" class="card-button"><span
                                                    class="fa fa-shopping-cart"></span>Show</a>
                                        </div>
                                    </div>
                                    <img src="{{asset($item->photo)}}" alt="{{$item->{'name_'.app()->getLocale() } }}">
                                </div>
                                <div class="shop-title">
                                    <a href="{{ route('details',$item->id)}}">
                                        <h5>{{$item->{'name_'.app()->getLocale() } }}</h5>
                                    </a>
                                    <span class="style-link-1">{{$item->solde}}</span><span>{{$item->price}}</span>
                                </div>
                            </div>
                            @empty
                             <strong>@lang('There is no product')</strong>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
