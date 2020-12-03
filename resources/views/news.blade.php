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
                <h4>News - Recent News about Turkish Aluminium Sector
                    How it works - Meet with Aluminium Producers via 3 Steps
                    Contact - We would love to hear from you</h4>

                <button class="btn btn-link text-dark ml-auto text-decoration-none">
                    More Information <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />
                </button>

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
                <h5><a class="d-block text-secondary text-decoration-none" href="{{route('newsdetay',$values)}}" class="date">{{$values->tarih}}</a></h5>
                <h5><a class="d-block text-secondary text-decoration-none" href="{{route('newsdetay',$values)}}" >{{$values->baslik}}</a></h5>
            </div>
            @endforeach

        </div>
    </div>

</main>

@endsection
