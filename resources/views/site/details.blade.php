@extends('includes.site_layout')
@section('content')


@if (session('addToCartSuccess'))
  <script>

    swal("{{ session('addToCartSuccess') }}", {
        icon: "success",
        buttons: false,
        timer: 3000,
        });

  </script>
@endif

<div class="main-wrapp">
    <div class="container">
         <div class="padd-80">
        <div class="row">
           <div class="col-md-12">
             <div class="second-heading">
              <div class="leyer-title"></div>
               <div class="clip">
                 <div class="bg bg-bg-chrome" style="background-image:url(img/contact_image.jpg)">
                 </div>
             </div>
             <div class="vertical-align">
                 <div class="second-heading-txt">
                    <h2>@lang('Shop detail')</h2>
                      <div class="separ"></div>
                 </div>
               </div>
              </div>
            </div>
         </div>
       </div>

          <div class="padd-80">
          <div class="row">
              <div class="col-md-12">
                  <div class="swiper-container slider-7" data-autoplay="3000" data-touch="1" data-mouse="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-loop="0" data-speed="1800" data-mode="horizontal" id="slider-7">
                     <div class="swiper-wrapper">
                        @foreach ($product->photos as $item)

                        <div class="swiper-slide">
                          <div class="det-slider-shop">
                              <img src="{{asset($item->photo)}}" alt="">
                          </div>
                        </div>
                        @endforeach
                         <div class="swiper-slide">
                           <div class="det-slider-shop">
                               <img src="{{asset('img/shop_det_2.jpg')}}" alt="">
                           </div>
                         </div>
                         <div class="swiper-slide">
                           <div class="det-slider-shop">
                               <img src="{{asset('img/shop_det_3.jpg')}}" alt="">
                           </div>
                         </div>
                         <div class="swiper-slide">
                           <div class="det-slider-shop">
                               <img src="{{asset('img/shop_det_4.jpg')}}" alt="">
                           </div>
                         </div>
                     </div>
                     <div class="pagination"></div>
                 </div>
                 <div class="slide-prev arrow-style-1"><span class="fa fa-angle-left"></span></div>
                 <div class="slide-next arrow-style-1"><span class="fa fa-angle-right"></span></div>
              </div>
         </div>
     </div>
         <div class="padd-80">
              <div class="col-md-12">
                  <div class="shop-detail-info">
                      <h4>{{$product->{'name_'.app()->getLocale() } }}</h4>
                        <div class="shop-price">
                               <div class="fl">
                                     <h6 class="style-link-1 fl">{{$product->solde}}$</h6><h5 class="bold fl">${{$product->price}}</h5>
                               </div>
                               <div class="rate-info fr">
                                     <span class="fa fa-star star-act"></span>
                                     <span class="fa fa-star star-act"></span>
                                     <span class="fa fa-star star-act"></span>
                                     <span class="fa fa-star"></span>
                                     <span class="fa fa-star"></span>
                               </div>
                        </div>
                        <p>{{$product->{'description_'.app()->getLocale() } }}</p>
                        <div class="add-tocard">
                             {{-- <input type="number" min="1" max="50" value="1" class="fl"> --}}
                               <div class="button-style-2" style="display: flex">
                                  <a href="#" class="b-sm butt-style">@lang('Buy Now')</a>
                                  @if(Auth::user())
                                    @if (!$cartCount->where('product_id', $product->id)->first())
                                      <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button ><a  class="b-sm butt-style">@lang('Add To Cart')</a></button>
                                      </form>
                                    @endif
                                  @endif
                            </div>
                        </div>
                        <div class="shop-det-tags">
                            <div class="shop-det-tags-wr">
                               <h5 class="fl">@lang('Category')</h5> <a href="#">{{$product->category->{'name_'.app()->getLocale()}??'not selected'}}</a>
                            </div>
                            {{-- <div class="shop-det-tags-wr">
                               <h5 class="fl">Tags:</h5> <a href="#">phone</a><a href="#">accessories</a><a href="#">tablet</a>
                         </div> --}}
                        </div>
                  </div>
              </div>
          </div>

       </div>
    </div>
 </div>

@endsection
