@extends('includes.dashboard_layout')
@section('content')


<div class="p-5 hero">

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
                    <h2>Products</h2>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Photo</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Name(en)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Name(ar)</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Prix</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Solde</th>
                        <th class="text-secondary opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $item)
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
                          {{$item->price}}
                        </td>
                        <td class="align-middle">
                          {{$item->solde}}
                        </td>

                        <td class="align-middle contact-form" >

                            <form action="{{route('updateetat',$item->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field("PUT") }}
                                    <input class="form-check-input mx-1 my-2 float-none single-checkbox" type="checkbox" onChange="this.form.submit()" id="etat" name="hero" style="margin: 0;width: 22px;height: 22px;padding: 10px;background: @if($item->hero == 'on' )  black @else white @endif" @if($item->hero == 'on' )  checked @else '' @endif>
                            </form>

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td>

                            There is no products
                        </td>
                    </tr>

                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    var hero = document.getElementsByName("hero");
    var j = 0;

    for(var i=0; i<hero.length; i++){
        if(hero[i].style.background == "black"){
            j++;
        }
    }
    console.log(j);
    for(var v=0; v<hero.length; v++){
        if(hero[v].style.background == "white" && j == 5){
            hero[v].disabled = true;
        }
    }




</script>




@endsection
