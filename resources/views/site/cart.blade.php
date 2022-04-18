@extends('includes.site_layout')
@section('content')


@if (session('deletFromCartSuccess'))
<script>
    swal("{{ session('deletFromCartSuccess') }}", {
        icon: "success",
        buttons: false,
        timer: 3000,
    });

</script>
@endif


<div class="main-wrapp cart">
    <div class="container">

        <div class="padd-80">
            <div class="row">
                <div class="col-md-12">
                    <div class="second-heading">
                        <div class="leyer-title"></div>
                        <div class="clip" id="clip">
                            <div class="bg bg-bg-chrome" style="background-image:url(img/contact_image.jpg)">
                            </div>
                        </div>
                        <div class="vertical-align">
                            <div class="second-heading-txt">
                                <h2>@lang('My Cart')</h2>
                                <div class="separ"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="padd-80">
            <div class="row">
                <div class="col-md-8 product">

                    @php
                        $total = 0;
                    @endphp

                    @forelse ($orders as $item)
                    <div class="shop-price">
                        <div class="d-flex">
                            <img src="{{ asset($item->product()->photo) }}" alt="" height="70px">
                            <p>{{ $item->product()->{'name_'.app()->getLocale()} }}</p>
                        </div>
                        <div class="add-tocard">
                            <form id="updateProfile{{$item->id}}"  >
                                @csrf
                                @method('PUT')
                                <input name="quantity" id="quantity{{$item->id}}"  type="number" min="1" max="50"
                                    value="{{ $item->quantity }}" class="fl">
                            </form>

                        </div>
                        <div class="d-flex">
                          
                            <h5 class="bold">${{ $item->product()->price }}</h5>
                        </div>
                        <div>
                            <form action="{{ route('cart.delete',$item->id) }}" method="POST">
                                @csrf
                                {{ method_field("DELETE") }}

                                <button  onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i> @lang('Remove')</button>
                            </form>
                        </div>
                    </div>
                    @php
                        $total += $item->product()->price * $item->quantity;
                    @endphp
                    @empty

                        <p>@lang("You don't have any item in your cart !!")</p>

                    @endforelse

                    <div class="button-style-2">
                        <a href="{{ route('catalog') }}" style="margin-top: 20px" class="b-sm butt-style">CONTINUE
                            SHOPPING</a>
                    </div>
                </div>
                <div class="col-md-4 buy-cart">
                    <div class="second-heading">
                        <h4>ORDER SUMMARY</h4>
                        <div class="shop-price">
                            <div class="fl">
                                  <h6 class="fl">Subtotal</h6>
                            </div>
                            <div class="fr">
                                <h6 class="fr">
                                    $ <?php
                                    echo $total;
                                    ?>
                                </h6>
                            </div>
                        </div>
                        <div class="Total">
                            <div class="fl">
                                  <h5 class="bold fl">Estimated Total</h5>
                            </div>
                            <div class="fr">
                                <h5 class="bold fr">
                                    $ <?php
                                    echo $total;
                                    ?>
                                </h5>
                            </div>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('catalog') }}"class="b-sm butt-style">Buy new</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

@endsection
