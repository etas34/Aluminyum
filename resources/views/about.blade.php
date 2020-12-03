@extends('layouts.front_app')

@section('content')
<!-- hero start -->
<main class="detail">
    <div class="position-relative mb-4">
        <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid" />
        <div class="container">
            <div class="bread"><h1 class="text-white">About</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <h4>Rum intio veribus core adis exerum, vel el mollabo...</h4>

                <button class="btn btn-link text-dark ml-auto text-decoration-none">
                    Daha falza bilgi <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />
                </button>

            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @if($about->foto)
                     <img src="{{ $about->foto }}" class="img-fluid mb-5" alt="..." />
                @else
                    <img src="{{asset('public/assets/images/about.svg')}}" class="img-fluid mb-5" alt="..." />
                @endif
                <h2 class="text-danger">{{ $about->baslik }}</h2>

                   {{  $about->metin }}

            </div>
        </div>
    </div>

</main>


@endsection
