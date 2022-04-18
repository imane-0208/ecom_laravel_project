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
                    <h2>User</h2>
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
                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Name</th>
                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-secondary opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>

                        <td class="align-middle">
                            <P>
                              {{$item->name}}
                            </P>
                        </td>
                        <td class="align-middle">
                            <P>
                              {{$item->email}}
                            </P>
                        </td>

                        <td class="align-middle">
                            
                            <form action="{{ route('users.destroy', [$item->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button style="border: none;background:none" onclick="return confirm('Are you sure?')" class="delete-confirm"
                                    data-name="{{ $item->name }}" type="submit"><i class="bi bi-trash"></i> Delete</button>
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
