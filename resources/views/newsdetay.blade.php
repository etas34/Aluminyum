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
                <h4 style="font-weight: 200 !important;" >{{$bulten->baslik}}</h4>

{{--                <a href="#nd" class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                   More Information <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                </a>--}}

            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">

                <a class="d-block mb-2 text-center" href="#">
                    <img  src="{{$bulten->foto}}" alt="..." class="img-fluid" />
                </a>

{{--                <h5><a class="d-block text-secondary text-decoration-none" href="#">{{$bulten->baslik}}</a></h5>--}}
        <div class="col-12 mt-5">
            <div> {{$bulten->tarih}}</div>
        </div>
                <div id="nd" class="col-12">
                    <h1>{{$bulten->baslik}}</h1>
                </div>
                 <div class="col-12">
                  {!! $bulten->icerik !!}
                </div>

        </div>
    @if(($bulten->album))
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="text-danger">Album</h2>
            </div>
            <div class="col-12 col-xl-11 position-relative">
                <div class="d-flex justify-content-between d-lg-none mb-3">
                    <button class="btn btn-light swiper-left-arrow"><img
                            src="{{asset('public/assets/images/before-arrow.svg')}}" width="22" height="22"
                            alt="..."/></button>
                    <button class="btn btn-light swiper-right-arrow"><img
                            src="{{asset('public/assets/images/next-arrow.svg')}}" width="22" height="22" alt=""/>
                    </button>
                </div>
                <div class="threebox-slider swiper-container">
                    <div class="swiper-wrapper">

                        @foreach(unserialize($bulten->album)  as $value)
                            <div class="swiper-slide">
                                <div class="card">
                                <img class="card-img-top" src="{{$value}}" alt="..."/>
{{--                                    <div class="card-footer text-center bg-white">--}}
{{--                                       <a href="{{route('newsdetay',$value)}}"> <h6>{{$value->baslik}} </h6></a>--}}
{{--                                        <p class="card-text">{{ $value->aciklama }}</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-left-arrow  d-none d-xl-block"><img
                        src="{{asset('public/assets/images/left-arrow.svg')}}" alt="..."/></div>
                <div class="swiper-right-arrow  d-none d-xl-block"><img
                        src="{{asset('public/assets/images/right-arrow.svg')}}" alt="..."/></div>
            </div>
        </div>
    </div>
@endif
</main>

@endsection
