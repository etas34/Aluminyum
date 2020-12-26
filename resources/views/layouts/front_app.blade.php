<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- googlefonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- customfonts -->
    <link rel="stylesheet" href="{{asset('public/assets/fonts/fonts.css')}}"/>
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{asset('public/assets/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/assets/responsive.css')}}"/>
    <!-- toastr CSS -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


    <title>Aluminium v1</title>
</head>
<body>


<!-- header start -->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" id="mynavbar">
            {{--            <a href="{{route('index')}}" class="navbar-brand">LOGO</a>--}}
            <a href="{{route('index')}}"> <img width="180" src="{{asset('public/assets/images/Header_Logo.svg')}}"
                                               alt="..."/>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mynav"><span
                    class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav align-items-lg-center ml-auto">
                    <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('news')}}" class="nav-link">News</a></li>
                    <li class="nav-item"><a href="{{ route('howitworks') }}" class="nav-link">How it works?</a></li>
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                    @if(Auth::check())
                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link">
                                <button class="btn btn-outline-danger">{{Auth::user()['name']}}</button>
                            </a></li>
                    @else
                        <li class="nav-item"><a href="{{route('register')}}" class="btn btn-danger">Register</a> </li>

                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link"><button class="btn btn-outline-danger">LOGIN</button></a></li>  @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- header end -->

<!-- social start -->
{{--<div class="left-social">--}}
{{--    <ul class="list-unstyled mb-0">--}}
{{--        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/twitter.svg')}}" alt="..." /></a></li>--}}
{{--        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/facebook.svg')}}" alt="..." /></a></li>--}}
{{--        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/instagram.svg')}}" alt="..." /></a></li>--}}
{{--        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/linked.svg')}}" alt="..." /></a></li>--}}
{{--        <li><a href="#"><img src="{{asset('public/assets/images/youtube.svg')}}" alt="..." /></a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
<!-- social end -->

@yield('content')


<!-- footer start	 -->
<footer class="footer">
    <div class="footer-top border-top border-bottom py-5 position-relative">
        <a class="toTop bg-white" href="javascript:void(0);"><img src="{{asset('public/assets/images/arrow-up.svg')}}"
                                                                  alt="..."/></a>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <a href="{{route('about')}}" class="btn btn-outline-secondary mb-2 mr-2">About</a>
                    <a href="{{route('news')}}" class="btn btn-outline-secondary mb-2 mr-2">News</a>
                    <a href="{{ route('howitworks') }}" class="btn btn-outline-secondary mb-2 mr-2">How it works</a>
                    <a href="{{route('contact')}}" class="btn btn-outline-secondary mb-2 mr-2">Contact</a>
                    <a href="{{route('login')}}" class="btn btn-outline-secondary mb-2 mr-2">Exhibitor Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="social list-inline">
                        <li class="list-inline-item"><a href="https://www.facebook.com/iddmib/"><img
                                    src="{{asset('public/assets/images/facebook.svg')}}" alt="..."/></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/iddmibtr?s=20"><img
                                    src="{{asset('public/assets/images/twitter.svg')}}" alt="..."/></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/iddmib/"><img
                                    src="{{asset('public/assets/images/instagram.svg')}}" alt="..."/></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/11780823"><img src="{{asset('public/assets/images/linked.svg')}}"
                                                                      alt="..."/></a></li>
                        <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCtm4OO9pVLzCXUjKk75cK8A"><img
                                    src="{{asset('public/assets/images/youtube.svg')}}" alt="..."/></a></li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item">Copyright © 2020,</li>
                        <li class="list-inline-item">All right reserved</li>
                        <li class="list-inline-item"><a class="text-dark" href="{{ route('privacy') }}">Privacy
                                Policy </a></li>
{{--                        <li class="list-inline-item"><a class="text-dark" href="{{ route('howitworks') }}">How it--}}
{{--                                Works </a></li>--}}
                        {{--                        <li class="list-inline-item"><a class="text-dark" href="#">Terms of Use   </a></li>--}}
                        {{--                        <li class="list-inline-item"><a class="text-dark" href="#">Site Map   </a></li>--}}
                    </ul>
                </div>
                <div class="col-md-3">
                    <img src="{{asset('public/assets/images/Footer_Logo.svg')}}" alt="..."/>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end	 -->


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset('public/assets/main.js')}}"></script>

<script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var page = url.split('page=')[1];
        window.history.pushState("", "", url);
        filtre(page);
    })
</script>
@stack('scripts')
</body>
</html>
