@extends('layouts.front_app')

@section('content')
<!-- hero start -->

<main class="detail">
    <div class="position-relative mb-4">
        <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid" />
        <div class="container">
            <div class="bread"><h1 class="text-white">News</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <h3>{{$bulten->baslik}}</h3>

                <button class="btn btn-link text-dark ml-auto text-decoration-none">
                    Daha fazla bilgi <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />
                </button>

            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">

                <a class="d-block mb-2 text-center" href="#">
                    <img  src="{{$bulten->foto}}" alt="..." class="img-fluid" />
                </a>

{{--                <h5><a class="d-block text-secondary text-decoration-none" href="#">{{$bulten->baslik}}</a></h5>--}}
        <div class="col-12">
                        <h5><a class="d-block text-secondary text-decoration-none" href="#" class="date">{{$bulten->tarih}}</a></h5>
        </div>
                <div class="col-12 text-center">
                    <h1>{{$bulten->baslik}}</h1>
                </div>
                 <div class="col-12">
                  {!! $bulten->icerik !!}
                </div>

        </div>
    </div>

</main>

@endsection
