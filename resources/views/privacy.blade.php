@extends('layouts.front_app')

@section('content')
<!-- hero start -->
<main class="detail">
    <div class="position-relative mb-4">
        <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid" />
        <div class="container">
            <div class="bread"><h1 class="text-white">Privacy Policy</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
{{--                <h4>Privacy Policy</h4>--}}

                <button class="btn btn-link text-dark ml-auto text-decoration-none">
                    More Information  <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />
                </button>

            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">
        <div class="row">
            <div class="col-12">

{{--                <h2 class="text-danger">{{ $about->baslik }}</h2>--}}

                   {!!   $privacy->metin !!}

            </div>
        </div>
    </div>

</main>


@endsection
