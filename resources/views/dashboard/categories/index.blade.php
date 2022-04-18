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
                    <h2>Categories</h2>
                    <div class="separ"></div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------- content --------------------------------->
    <div style="padding: 30px 10px 0;">
        <button type="button" style="border: 1px solid #ccc;padding: 10px;background-color: #fff;"
            onclick="openForm()" data-toggle="tooltip" data-original-title="Edit user">
            Add New Category
        </button>
    </div>
    <div class="card">

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Photo</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Name (en)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Name (ar)</th>
                        <th class="text-secondary opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                    <tr>
                        <td>
                            <div class="" style="display: flex;padding: 0.25rem 0.5rem;">
                                <div>
                                    <img src="{{asset($item->photo)}}"
                                        class="avatar">
                                </div>

                            </div>
                        </td>

                        <td class="align-middle">
                          {{$item->name_en}}
                        </td>
                        <td class="align-middle">
                          {{$item->name_ar}}
                        </td>

                        <td class="align-middle">
                            <a href="" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Edit user"
                                onclick="event.preventDefault();
                                    document.getElementById('popup{{$item->id}}').style.display = 'block';"
                                >
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', [$item->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button style="border: none;background:none" onclick="return confirm('Are you sure?')" class="delete-confirm"
                                    data-name="{{ $item->name_en }}" type="submit"><i class="bi bi-trash"></i> Delete</button>
                            </form>

                            {{-- <script>
                                $('.delete-confirm').click(function (event) {
                                    var form = $(this).closest("form");
                                    var name = $(this).data("name");
                                    event.preventDefault();
                                    swal({
                                            title: `Are you sure you want to delete ${name}?`,
                                            text: "If you delete this, it will be gone forever.",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                form.submit();
                                            }
                                        });
                                });
                            </script> --}}
                            <div>

                            </div>
                        </td>
                    </tr>
                    <div style="display: none; background-color: rgba(0, 0, 0, 0.315);" class="popup-ithem" id="popup{{$item->id}}">
                        <div class="col-md-5" style="background-color: #fff;position: relative;">
                            <div class="contact-form" style="padding: 20px 10px 10px;">
                                <div class="subtitle">
                                    <h4 class="text-center">Update category</h4>
                                </div>
                                <div id="sp_quickcontact124" class="sp_quickcontact">
                                    <div id="sp_qc_status"></div>
                                    <form  action="{{route('categories.update',$item)}}"  method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input placeholder="Name"  type="text" name="name_en" id="name" required="" value="{{ $item->name_en }}">
                                        @error('name_en')
                                        <p>{{$message}}</p>
                                        @enderror
                                        <input placeholder="Name"  type="text" name="name_ar" id="name" required="" value="{{ $item->name_ar }}">
                                        @error('name_ar')
                                        <p>{{$message}}</p>
                                        @enderror

                                        <label for="">Photo *  (pleaew make sure that your photo size 400*400)</label>
                                        <input type="file" class="dropify" data-default-file="{{asset($item->photo)}}" name="photo" id="photo" >
                                        @error('photo')
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

                            There is no categories
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
                <h4>Add new category</h4>
            </div>
            <div id="sp_quickcontact124" class="sp_quickcontact">
                <div id="sp_qc_status"></div>
                <form  action="{{route('categories.store')}}" method="POST" id="sp-quickcontact-form" class="contactform" enctype="multipart/form-data">
                    @csrf
                    <input placeholder="Name" type="text" name="name_en" id="name" required="">
                    @error('name_en')
                    <p>{{$message}}</p>
                    @enderror
                    <input placeholder="Name" type="text" name="name_ar" id="name" required="">
                    @error('name_ar')
                    <p>{{$message}}</p>
                    @enderror
                    <label for="">Photo *  (pleaew make sure that your photo size 400*400)</label>
                    <input type="file" name="photo" class="mb-20 dropify"  id="photo" required="">
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
