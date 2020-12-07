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
                <h4 style="font-weight: 200 !important;" >Recent News about Turkish Aluminium Sector</h4>


            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">
        <div class="row row-cols-sm-2">
            @foreach($bulten as $values)
            <div class="col-12 mb-3 mb-md-5">
                <a class="d-block mb-2" href="{{route('newsdetay',$values)}}">
                    <img style="width:540px;height:331px;" src="{{$values->foto}}" alt="..." class="img-fluid" />
                </a>
                <h5><a class="d-block text-secondary text-decoration-none small " href="{{route('newsdetay',$values)}}" class="date">{{$values->tarih}}</a></h5>
                <h3><a class="d-block text-dark text-secondary text-decoration-none" href="{{route('newsdetay',$values)}}" ><b> {{$values->baslik}} </b></a></h3>
            </div>
            @endforeach

        </div>
    </div>

</main>

@endsection
