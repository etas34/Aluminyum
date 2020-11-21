<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- googlefonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- customfonts -->
    <link rel="stylesheet" href="{{asset('public/assets/fonts/fonts.css')}}" />
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{asset('public/assets/style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/responsive.css')}}" />

    <title>Aliminum v1</title>
</head>
<body>


<!-- header start -->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" id="mynavbar">
            <a href="{{route('index')}}" class="navbar-brand">LOGO</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mynav"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav align-items-lg-center ml-auto">
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">News</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">How it works?</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Calendar</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><button class="btn btn-outline-danger">LOGİN</button></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- header end -->

<!-- social start -->
<div class="left-social">
    <ul class="list-unstyled mb-0">
        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/twitter.svg')}}" alt="..." /></a></li>
        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/facebook.svg')}}" alt="..." /></a></li>
        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/instagram.svg')}}" alt="..." /></a></li>
        <li class="mb-2"><a href="#"><img src="{{asset('public/assets/images/linked.svg')}}" alt="..." /></a></li>
        <li><a href="#"><img src="{{asset('public/assets/images/youtube.svg')}}" alt="..." /></a></li>
    </ul>
</div>
<!-- social end -->

@yield('content')


<!-- footer start	 -->
<footer class="footer">
    <div class="footer-top border-top border-bottom py-5 position-relative">
        <a class="toTop bg-white" href="javascript:void(0);"><img src="{{asset('public/assets/images/arrow-up.svg')}}" alt="..." /></a>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <button class="btn btn-outline-secondary mb-2 mr-2">About</button>
                    <button class="btn btn-outline-secondary mb-2 mr-2">New</button>
                    <button class="btn btn-outline-secondary mb-2 mr-2">How it works</button>
                    <button class="btn btn-outline-secondary mb-2 mr-2">Calendar</button>
                    <button class="btn btn-outline-secondary mb-2 mr-2">Contact</button>
                    <button class="btn btn-outline-secondary mb-2">Üyelik</button> <br />
                    <button class="btn btn-outline-secondary mb-2 mr-2">Proﬁle</button>
                    <button class="btn btn-outline-secondary mb-2 mr-2">My Meetings</button>
                    <button class="btn btn-outline-secondary mb-2">Upcoming Meetings</button> <br />
                    <button class="btn btn-outline-secondary mr-2">Become Exhibitor</button>
                    <button class="btn btn-outline-secondary">Exhibitor Login</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="social list-inline">
                        <li class="list-inline-item"><a href="#"><img src="{{asset('public/assets/images/facebook.svg')}}" alt="..." /></a></li>
                        <li class="list-inline-item"><a href="#"><img src="{{asset('public/assets/images/instagram.svg')}}" alt="..." /></a></li>
                        <li class="list-inline-item"><a href="#"><img src="{{asset('public/assets/images/linked.svg')}}" alt="..." /></a></li>
                        <li class="list-inline-item"><a href="#"><img src="{{asset('public/assets/images/youtube.svg')}}" alt="..." /></a></li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="text-dark" href="#">Copyright © 2020,</a></li>
                        <li class="list-inline-item"><a class="text-dark" href="#">Her hakkı saklıdır</a></li>
                        <li class="list-inline-item"><a class="text-dark" href="#">Gizlilik  </a></li>
                        <li class="list-inline-item"><a class="text-dark" href="#">Şartlar   </a></li>
                        <li class="list-inline-item"><a class="text-dark" href="#">Site haritası   </a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h1 class="display-3"><a class="text-dark text-decoration-none" href="#">LOGO</a></h1>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end	 -->


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="{{asset('public/assets/main.js')}}"></script>

</body>
</html>
