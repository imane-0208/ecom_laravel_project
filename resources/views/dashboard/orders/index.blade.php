@extends('includes.dashboard_layout')
@section('content')

<div class="p-5">

    <!----------------------- content --------------------------------->
    <div class="">
        <div class="second-heading" style="height: 150px !important;">
            <div class="leyer-title"></div>
            <div class="clip">
                <div class="bg bg-bg-chrome" style="background-image:url(img/contact_image.jpg)">
                </div>
            </div>
            <div class="vertical-align">
                <div class="second-heading-txt">
                    <h2>Orders</h2>
                    <div class="separ"></div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------- content --------------------------------->

    <div class="card">

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th>product picture</th>
                        <th>Username</th>
                        <th>Products</th>
                        <th>price</th>
                        <th>etat</th>
                        <th>order date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>


                        <td >
                           <img src="{{asset($item->product->photo)}}" width="100px" alt="{{$item->product->name}}">
                        </td>
                        <td >
                            <P>
                              {{$item->user->name}}
                            </P>
                        </td>
                        <td >
                            <P>
                              {{$item->product->name_en}}
                            </P>
                        </td>
                        <td >
                            <P>
                              {{$item->product->price}}
                            </P>
                        </td>
                        <td >
                            <P>
                              @if($item->etat==0) <p class="text-danger">non valide</p>  @else  <p class="text-success"> valide</p>  @endif
                            </P>
                        </td>
                        <td >
                            <P>
                              {{$item->created_at->diffForHumans()}}
                            </P>
                        </td>
                        <td >
                            <a href="{{ route('orders.show',$item->id)}}" class="bg-dark btn">details</a>
                        </td>



                    </tr>
                    <div style="display: none; background-color: rgba(0, 0, 0, 0.315);" class="popup-ithem" id="popup{{$item->id}}">
                        <div class="col-md-5" style="background-color: #fff;position: relative;">
                            <div class="contact-form" style="padding: 20px 10px 10px;">
                                <div class="subtitle">
                                    <h4 class="text-center">Update role</h4>
                                </div>
                                <div id="sp_quickcontact124" class="sp_quickcontact">
                                    <div id="sp_qc_status"></div>
                                    <form  action="{{route('roles.update',$item)}}"  method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input placeholder="Name"  type="text" name="name" id="name" required="" value="{{ $item->name }}">
                                        @error('name')
                                        <p>{{$message}}</p>
                                        @enderror


                                            <div style="display: flex;">
                                                <input id="sp_qc_submit" style="width: 120px !important;margin-right: 10px;"
                                                onclick="event.preventDefault();
                                                document.getElementById('popup{{$item->id}}').style.display = 'none';" type="reset" value="Cancel">
                                                <input id="sp_qc_submit" type="submit" value="Add">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td>

                            There is no categories
                        </td>
                    </tr>

                    @endforelse


                </tbody>
            </table>
        </div>
    </div>








</div>


@endsection
