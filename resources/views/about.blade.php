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
                <img src="{{asset('public/assets/images/about.svg')}}" class="img-fluid mb-5" alt="..." />
                <h2 class="text-danger">About Turkish Aluminium</h2>
                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh.</p>

                <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>

                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>

                <p>Curabitur aliquet quam id dui posuere blandit. Curabitur aliquet quam id dui posuere blandit. Proin eget tortor risus. Proin eget tortor risus. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>

            </div>
        </div>
    </div>

</main>


@endsection
