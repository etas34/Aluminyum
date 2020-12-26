@extends('layouts.front_app')

@section('content')
<!-- hero start -->

<main class="detail">
    <div class="position-relative mb-4">
        <img src="{{asset('public/assets/images/contact.svg')}}" alt="" class="img-fluid" />

        <div class="container">
            <div class="bread"><h1 class="text-white">Contact</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <h4 style="font-weight: 200">We would love to hear from you</h4>

{{--                <a href="#contact" class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                    More Information <img class="ml-2" src="{{asset('public/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                </a>--}}

            </div>
        </div>
    </div>
    <hr />
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2  class="text-danger">Headquarters</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <iframe class="container-fluid" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d892.64562907046!2d28.821488269894534!3d40.999246640433554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1606133045783!5m2!1str!2str" width="540" height="305" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Istanbul Ferrous and Non-Ferrous Metals Exporters' Association

                </h4>
                <div class="mb-4">
                    Sanayi Cad. No:3, Dış Ticaret Kompleksi <br />
                    A Blok, Çobançeşme Mevkii 34196 <br />
                    Bahçelievler / İSTANBUL
                </div>
                <a class="text-dark text-decoration-none mb-2 d-block" href="tel:02126111515">+90 (212) 611 15 15 (Pbx)</a>
                <a class="text-dark text-decoration-none mb-4 d-block" href="mailto:info@turkishmetals.org">info@turkishmetals.org</a>
                <a href="https://goo.gl/maps/bHnwuaoJxjgwSd1Q9" target="_blank" class="text-danger">Go to Address </a>
            </div>
        </div>
    </div>
    <hr />
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-danger">Contact Form</h2>
            </div>
        </div>

        <form action="{{route('schedule')}}" method="post" autocomplete="off"  enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row mb-4">
            <div class="col-12">
                <textarea name="konu" class="form-control" rows="4" placeholder="Message"></textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-12">
                        <input type="text" name="ad" class="form-control" placeholder="Name" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <input type="text" name="eposta" class="form-control" placeholder="E-Mail" />
                    </div>
                </div>
                <div class="row mb-4 mb-md-0">
                    <div class="col-12">
                        <input type="text" name="telefon" class="form-control" placeholder="Phone Number" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <textarea name="adres"  class="form-control h-100"  placeholder="Address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-danger">Send</button>
            </div>
        </div>
        </form>
    </div>
    <hr />
    <div class="container py-5">
        <h2 class="text-danger mb-4">FAQ - Frequently Asked Questions</h2>
        <div class="accordion" id="accordionExample">

            @foreach($faq as $key=>$value)
            <div class="card mb-4">
                <div id="heading{{$key}}" class="card-header p-0 bg-white">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left  px-2 py-3  text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                            {{ $value->soru }}
                        </button>
                    </h2>
                </div>

                <div id="collapse{{$key}}" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                       {{ $value->cevap }}
                    </div>
                </div>
            </div>

            @endforeach

{{--            <div class="card mb-4">--}}
{{--                <div id="headingTwo" class="card-header p-0 bg-white">--}}
{{--                    <h2 class="mb-0">--}}
{{--                        <button class="btn btn-link btn-block text-left collapsed px-2 py-3 text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                            2023 Türkiye İhracat Stratejisi nedir?--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
{{--                    <div class="card-body">--}}
{{--                        <p>--}}
{{--                            2023 Türkiye İhracat Stratejisi, Türkiye’nin ulusal strateji ve politika dökümanlarında öngörülen--}}
{{--                            çerçeveye uygun olarak, Ticaret Bakanlığı’nın koordinasyonunda, Ticaret Bakanlığı, Kalkınma Bakanlığı--}}
{{--                            ve Türkiye İhracatçılar Meclisi (TİM) işbirliği içinde hazırlanmıştır.--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            2023 Türkiye İhracat Stratejisinin Vizyonu, “Cumhuriyetimizin 100. kuruluş yıldönümü olan 2023 yılında--}}
{{--                            500 milyar dolar ihracata ulaşarak, ülkemizin dünya ticaretinde lider ülkeler arasında yer almasının--}}
{{--                            sağlanması” olarak belirlenmiştir.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card mb-4">--}}
{{--                <div id="headingThree" class="card-header p-0 bg-white">--}}
{{--                    <h2 class="mb-0">--}}
{{--                        <button class="btn btn-link btn-block text-left collapsed px-2 py-3 text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                            Rest harchil moluptatur rest harchil moluptatur?--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
{{--                    <div class="card-body">--}}
{{--                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon--}}
{{--                        tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice--}}
{{--                        lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    --}}


        </div>
    </div>

</main>


@endsection
