@extends('includes.dashboard_layout')
@section('content')



<div class="p-5 dash-datails">

    <!----------------------- content --------------------------------->
    <div class="">
        <div class="second-heading" style="height: 150px !important;">
            <div class="leyer-title"></div>
            <div class="clip">
                <div class="bg bg-bg-chrome" style="background-image:url({{asset('img/contact_image.jpg')}})">
                </div>
            </div>
            <div class="vertical-align">
                <div class="second-heading-txt">
                    <h2>Product</h2>
                    <div class="separ"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ml-50  mt-50" style="background:rgb(255, 251, 251);padding:12px; border:1px solid #fff;">

        <div class="row ">
            <div class="col-md-4">
                <img src="{{asset($product->photo)}}" width="100%" alt="">
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6"><p><strong> Name(en)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->name_en}}</p></div>
                    <div class="col-md-6"><p><strong> Name(ar)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->name_ar}}</p></div>
                    <div class="col-md-6"><p><strong> Price</strong></p></div>
                    <div class="col-md-6"><p>{{$product->price}}</p></div>
                    <div class="col-md-6"><p><strong>Solde</strong></p></div>
                    <div class="col-md-6"><p>{{$product->solde}}</p></div>
                    <div class="col-md-6"><p><strong>description(en)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->description_en}}</p></div>
                    <div class="col-md-6"><p><strong>description(ar)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->description_ar}}</p></div>
                    <div class="col-md-6"><p><strong>category (en)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->category->name_en ?? ''}}</p></div>
                    <div class="col-md-6"><p><strong>category (ar)</strong></p></div>
                    <div class="col-md-6"><p>{{$product->category->name_ar ?? ''}}</p></div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------- content --------------------------------->
    <div style="padding: 30px 10px 0;">
        <button type="button" style="border: 1px solid #ccc;padding: 10px;background-color: rgb(0, 0, 0);color:white"
            onclick="openForm()" data-toggle="tooltip" data-original-title="Edit user">
            Add New photo
        </button>
    </div>
    <div class="ml-50">
        <div class=" mt-50">

            @forelse ($product->photos as $item)

            <div class="col-md-4">
                <img src="{{asset($item->photo)}}" width="100%" alt="">
            </div>
            @empty
            <h2 class="no-product">There is no record</h2>
            @endforelse
        </div>
    </div>









</div>

<div style="display: none; background-color: rgba(0, 0, 0, 0.315);" id="popup">
    <div class="col-md-5" style="background-color: #fff;position: relative;">
        <div class="contact-form" style="padding: 20px 10px 10px;">
            <div class="subtitle">
                <h4 class="text-center">Add new photo</h4>
            </div>
            <div id="sp_quickcontact124" class="sp_quickcontact">
                <div id="sp_qc_status"></div>
                <form  action="{{route('photos.store')}}"  method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product">
                    <label for="">Photo *  </label>
                    <input type="file" class="dropify " name="photo" id="photo" required="">
                    @error('photo')
                    <p>{{$message}}</p>
                    @enderror
                        <div style="display: flex;margin-top:20px">
                            <input id="sp_qc_submit" style="width: 120px !important;margin-right: 10px;" onclick="closeForm()" type="reset" value="Cancel">
                            <input id="sp_qc_submit" type="submit" value="Add">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
