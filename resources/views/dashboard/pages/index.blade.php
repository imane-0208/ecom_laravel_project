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
                    <h2>Pages</h2>
                    <div class="separ"></div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------- content --------------------------------->
    <div style="padding: 30px 10px 0;">
        <button type="button" style="border: 1px solid #ccc;padding: 10px;background-color: #fff;"
            onclick="openForm()" data-toggle="tooltip" data-original-title="Edit user">
            Add New page
        </button>
    </div>
    <div class="card">

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name(en)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name(ar)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value(en)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value(ar)</th>
                        <th class="text-secondary opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $item)
                    <tr>
                        <td>
                           <p>{{$item->name_en}}</p>
                        </td>
                        <td>
                           <p>{{$item->name_ar}}</p>
                        </td>

                        <td class="align-middle">
                          {{$item->value_en}}
                        </td>
                        <td class="align-middle">
                          {{$item->value_ar}}
                        </td>

                        <td class="align-middle">
                            <a href="" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Edit user"
                                onclick="event.preventDefault();
                                    document.getElementById('popup{{$item->id}}').style.display = 'block';"
                                >
                                <i class="bi bi-pencil"></i> Edit
                            </a>


                            <div>

                            </div>
                        </td>
                    </tr>
                    <div style="display: none; background-color: rgba(0, 0, 0, 0.315);" class="popup-ithem" id="popup{{$item->id}}">
                        <div class="col-md-5" style="background-color: #fff;position: relative;">
                            <div class="contact-form" style="padding: 20px 10px 10px;">
                                <div class="subtitle">
                                    <h4 class="text-center">Update page</h4>
                                </div>
                                <div id="sp_quickcontact124" class="sp_quickcontact">
                                    <div id="sp_qc_status"></div>
                                    <form  action="{{route('pages.update',$item)}}"  method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input placeholder="Name"  type="text" name="name_en" id="name" required="" value="{{ $item->name_en }}">
                                        @error('name_en')
                                        <p>{{$message}}</p>
                                        @enderror
                                        <input placeholder="Value"  type="text" name="value_en" id="value" required="" value="{{ $item->value_en }}">
                                        @error('value_en')
                                        <p>{{$message}}</p>
                                        @enderror
                                        <input placeholder="Name"  type="text" name="name_ar" id="name" required="" value="{{ $item->name_ar }}">
                                        @error('name_ar')
                                        <p>{{$message}}</p>
                                        @enderror
                                        <input placeholder="Value"  type="text" name="value_ar" id="value" required="" value="{{ $item->value_ar }}">
                                        @error('value_ar')
                                        <p>{{$message}}</p>
                                        @enderror


                                            <div style="display: flex;margin-top:20px">
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

                            There is no pages
                        </td>
                    </tr>

                    @endforelse


                </tbody>
            </table>
        </div>
    </div>








</div>

<div style="display: none; background-color: rgba(0, 0, 0, 0.315);" id="popup">
    <div class="col-md-5" style="background-color: #fff;position: relative;">
        <div class="contact-form" style="padding: 20px 10px 10px;">
            <div class="subtitle">
                <h4>Add new page</h4>
            </div>
            <div id="sp_quickcontact124" class="sp_quickcontact">
                <div id="sp_qc_status"></div>
                <form  action="{{route('pages.store')}}" method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                    @csrf
                    <label for="">name en</label>
                    <input placeholder="Name" type="text" name="name_en" id="name" required="">
                    @error('name_en')
                    <p>{{$message}}</p>
                    @enderror
                    <label for="">value en</label>
                    <input placeholder="value" type="text" name="value_en" id="value" required="">
                    @error('value_en')
                    <p>{{$message}}</p>
                    @enderror
                    <label for="">name ar</label>
                    <input placeholder="Name" type="text" name="name_ar" id="name" required="">
                    @error('name_ar')
                    <p>{{$message}}</p>
                    @enderror
                    <label for="">value ar</label>
                    <input placeholder="value" type="text" name="value_ar" id="value" required="">
                    @error('value_ar')
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
