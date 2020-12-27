@extends('layouts.front_app')

@section('content')
    <!-- hero start -->
    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid"/>

            <div class="container">
                <div class="bread"><h1 class="text-white">How It Works?</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4 style="font-weight: 200 !important;">Meet with Aluminium Producers via 3 Steps</h4>

                    {{--                <a href="#hiw" class="btn btn-link text-dark ml-auto text-decoration-none">--}}
                    {{--                    More Information <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
                    {{--                </a>--}}

                </div>
            </div>
        </div>
        <hr/>
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    @if($howitworks->foto)
                        <img src="{{$howitworks->foto}}" alt="" class="img-fluid"/>
                    @else
                        <img src="{{asset('public/assets/images/about.svg')}}" class="img-fluid mb-5" alt="..."/>
                    @endif
                    @if( $howitworks->baslik!='' )
                        <h2 id="hiw" class="text-danger mb-5">{{ $howitworks->baslik }}</h2>
                        @endif
                        @if($howitworks->metin!='')
                        {!! $howitworks->metin !!}
                    @endif
                </div>
            </div>
            <br>

            <div class="mb-5"> For more information, please send us an e-mail:
                <a class="text-danger" href="mailto:info@turkishaluminium365.com">info@turkishaluminium365.com</a>
            </div>
        </div>

    </main>


@endsection
