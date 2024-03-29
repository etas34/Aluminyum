@extends('layouts.front_app')

@section('content')
    <!-- hero start -->
    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid"/>
            <div class="container">
                <div class="bread"><h1 class="text-white">About</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4 style="font-weight: 200 !important;">Explore Turkish Aluminium Products</h4>

                    <a href="#about" class="btn btn-link text-dark ml-auto text-decoration-none">
                        More Information <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}"
                                              width="22" height="22" alt="..."/>
                    </a>

                </div>
            </div>
        </div>
        <hr/>
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    @if($about->foto)
                        <img src="{{ $about->foto }}" class="img-fluid mb-5" alt="..."/>
                    @else
                        <img src="{{asset('public/assets/images/about.svg')}}" class="img-fluid mb-5" alt="..."/>
                    @endif
                    <h2 id="about" class="text-danger mb-5">{{ $about->baslik }}</h2>

                    {!!   $about->metin !!}

                </div>
            </div>
        </div>
        <div class="mb-5">
        </div>

    </main>


@endsection
