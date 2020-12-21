@extends('layouts.front_app')

@section('content')
<!-- hero start -->
<div class="hero mb-5 text-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="museo500">Discover the world of export<br /> in the digitalized aluminium industry <br />
                    with Turkish Aluminium 365!
                </h2>
                <p class="font-weight-light">Discover the best aluminium products and producers   <br />
                    by using product research and online B2B meeting tools!
                </p>
                <div class="row mb-5">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select name="cat" id="category" class="form-control">

                            @foreach($ustkategori as $key=>$value)
                            <option value="{{$value->id}}">{{$value->ust_kategori}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-7 mb-3 mb-md-0">
                        <input type="text" id="searchinput" class="form-control" placeholder="Search Category Name" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger" onclick="myFunction3(this)">SEARCH</button>
                    </div>
                </div>
                <a href="javascript:void(0);" class="toBottom text-dark"><img src="{{asset('public/assets/images/arrow-down.svg')}}" alt="" /></a>
            </div>

        </div>
    </div>
</div>
<!-- hero end -->

<!-- filter start -->
<div id="filtre" class="filter">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="text-danger">Aliminum Products</h2>
                <h2 class="text-secondary font-weight-light">Explore aliminum categories and products</h2>
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col-12 filterBtn">

                @foreach($ustkategori as $key=>$value)
                <button class="btn btn-outline-secondary mr-2 mb-2 mb-md-0 ustkategori" id="ustkat{{$value->id}}" onclick="myFunction2(this)" data-id="{{$value->id}}">{{$value->ust_kategori}}</button>
                    @endforeach

            </div>
        </div>
        <div class="row text-center mb-5">
            <div class="col-12 d-flex flex-wrap align-items-strech justify-content-center filterBtn" id="altkategoriappend">

{{--                @foreach($altkategori as $key=>$value)--}}
{{--                    <button class="btn btn-outline-secondary mr-3 mb-2 mb-md-0 altkategori"  onclick="myFunction(this)" data-id="{{$value->id}}"><img class="mr-2" src="{{asset('public/assets/images')}}/{{$value->icon}}" alt="..." />{{$value->alt_kategori}}</button>--}}
{{--                @endforeach--}}
            </div>
        </div>
{{--        <div class="row text-center mb-4">--}}
{{--            <div class="col-12">--}}
{{--                <h4>Aluminium Sheet Producers</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row row-cols-sm-2 row-cols-md-3" id="firmaAppend">

{{--            @foreach($firma as $key=>$value)--}}
{{--            <div class="col-12 mb-3 mb-md-5 firma">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <img class="card-img-top" src="{{$value->logo}} " height="255" width="360" alt="..." />--}}
{{--                    </div>--}}
{{--                    <div class="card-footer text-center bg-white">--}}
{{--                        <p class="card-text">--}}
{{--                           <a style="color: #212529;" href="{{route('details',$value->id)}}"> {{$value->name}}</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                @endforeach--}}



    </div>
</div>
<!-- filter end	 -->
</div>
<hr class="pb-5">
<div class="container ">
    <div class="row">
        <div class="col-12">

            <img src="{{asset('public/assets/images/illu.png')}}" class="img-fluid mb-5" alt="..." />


        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        function myFunction(elem) {

            $('.firma').remove();

            var x = $(elem).attr("data-id");


            $.ajax({

                type:'POST',
                url: '{{ route('getUser') }}',

                data:{altkategori_id:x},

                success:function(data){


                    data.forEach(function(firma) {

                        var url = '{{ route("details", ":id") }}';
                            url = url.replace(':id', firma['id']);
                            var temp = '<div class="col-12 mb-3 mb-md-5 firma">' +
                                '<div class="card">' +
                                '<div class="card-header">' +
                                '<img class="card-img-top" src="'+firma['logo']+'" alt="..." />' +
                                '</div>' +
                                '<div class="card-footer text-center bg-white">' +
                                '<p class="card-text">' +
                                '<a  style="color: #212529;" href="'+url+'"> '+firma['name']+'</a><br />' +
                                '</p></div></div></div>';

                        $("#firmaAppend").append(temp);
                        });

                    // $("#ad").val(data.ad);

                }

            });


            $(elem).siblings().removeClass("btn-danger").addClass("btn-outline-secondary");


            $(elem).removeClass("btn-outline-secondary").addClass("btn-danger");

        }


        function myFunction2(elem) {

            $('.firma').remove();
            $('.altkategori').remove();

            var x = $(elem).attr("data-id");

            $.ajax({

                type:'POST',
                url: '{{ route('getUser2') }}',

                data:{ustkategori_id:x},

                success:function(data){


                    data.forEach(function(firma) {



                        var url = '{{ route("details", ":id") }}';
                        url = url.replace(':id', firma['id']);
                        var temp = '<div class="col-12 mb-3 mb-md-5 firma">' +
                            '<div class="card">' +
                            '<div class="card-header">' +
                            '<img class="card-img-top" src="'+firma['logo']+'" alt="..."  />' +
                            '</div>' +
                            '<div class="card-footer text-center bg-white">' +
                            '<p class="card-text">' +
                            '<a style="color: #212529;"  href="'+url+'"> '+firma['name']+'</a><br />' +
                            '</p></div></div></div>';

                        $("#firmaAppend").append(temp);
                    });

                    // $("#ad").val(data.ad);

                }

            });

            $.ajax({

                type:'POST',
                url: '{{ route('getAltkategori') }}',

                data:{ustkategori_id:x},

                success:function(data){

                    console.log(data);

                    data.forEach(function(altkategori) {


                       var temp='<button class="btn btn-outline-secondary mr-3 mb-2 mb-md-0 altkategori"  onclick="myFunction(this)" data-id="'+altkategori['id']+'"><img class="mr-2" src="{{asset('public/icons')}}/'+altkategori['icon']+'" alt="..." />'+altkategori['alt_kategori']+'</button>';

                        $("#altkategoriappend").append(temp);
                    });

                    // $("#ad").val(data.ad);

                }


        });

        }


        function myFunction3() {
            var ustkategori_id = document.getElementById("category");
            var text = document.getElementById("searchinput");
            // alert(text.value);
            location.href = "#filtre";


            $('.ustkategori').removeClass("btn-danger").addClass("btn-outline-secondary");
            var element =document.getElementById('ustkat'+ustkategori_id.value);
            element.classList.remove("btn-outline-secondary");
            element.classList.add("btn-danger");



            $('.firma').remove();
            $('.altkategori').remove();

            var x = ustkategori_id.value;
            $.ajax({

                type:'POST',
                url: '{{ route('getUser3') }}',

                data:{
                    ustkategori_id:x,
                    text:text.value,
                    },

                success:function(data){

                        data.forEach(function(firma) {



                            var url = '{{ route("details", ":id") }}';
                            url = url.replace(':id', firma['id']);
                            var temp = '<div class="col-12 mb-3 mb-md-5 firma">' +
                                '<div class="card">' +
                                '<div class="card-header">' +
                                '<img class="card-img-top" src="'+firma['logo']+'" alt="..."  />' +
                                '</div>' +
                                '<div class="card-footer text-center bg-white">' +
                                '<p class="card-text">' +
                                '<a style="color: #212529;"  href="'+url+'"> '+firma['name']+'</a><br />' +
                                '</p></div></div></div>';

                            $("#firmaAppend").append(temp);
                        });


                    }


            });



            $.ajax({

                type:'POST',
                url: '{{ route('getAltkategori') }}',

                data:{ustkategori_id:x},

                success:function(data){

                    console.log(data);

                    data.forEach(function(altkategori) {


                        var temp='<button class="btn btn-outline-secondary mr-3 mb-2 mb-md-0 altkategori"  onclick="myFunction(this)" data-id="'+altkategori['id']+'"><img class="mr-2" src="{{asset('public/icons')}}/'+altkategori['icon']+'" alt="..." />'+altkategori['alt_kategori']+'</button>';

                        $("#altkategoriappend").append(temp);
                    });

                    // $("#ad").val(data.ad);

                }


            });


        }

    </script>


    @endpush
