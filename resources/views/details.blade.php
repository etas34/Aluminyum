@extends('layouts.front_app')

@section('content')
    <!-- hero start -->
    <main class="detail">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('schedule')}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="modal-body">


                            <div class="form-group">
                                <label>Tarih Ve Saat Seçiniz</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text"  class="form-control"  name="datetimes" />
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.input group -->

                            <div class="form-group">
                                <label for="adSoyad"  class="col-form-label">Ad Soyad</label>
                                <input type="text" required class="form-control" name="adSoyad" id="adSoyad">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mesaj</label>
                                <textarea  class="form-control" name="mesaj" id="message-text"></textarea>
                            </div>
                        <input type="text" hidden name="email" value="{{$user->email}}">

                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-outline-danger">Gönder</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="detailbg">
            <img src="{{asset('public/assets/images/detaybg.svg')}}" alt="..." class="img-fluid"/>
            <img height="200" width="200" src="{{$user->logo}}" alt="..." class="detail-logo"/>
        </div>



        <!-- Modal -->
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="font-weight-light">
                        {{$user->name}}<br/> &nbsp;

                    </h1>
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">SCHEDULE MEETING</button>
                </div>
            </div>
        </div>




@if(strpos($user->youtube_link,'?v='))
        <hr/>
        <div class="video-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{--                    <img src="{{asset('public/assets/images/player.svg')}}" alt="..."  />--}}
                        <style>.embed-container {
                                position: relative;
                                padding-bottom: 56.25%;
                                height: 0;
                                overflow: hidden;
                                max-width: 100%;
                            }

                            .embed-container iframe, .embed-container object, .embed-container embed {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                            }</style>
                        <div class='embed-container'>
                            <iframe src='https://www.youtube.com/embed/{!! explode("?v=",$user->youtube_link)[1] !!}' frameborder='0'
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        @endif
        <!-- threebox slider start -->
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-12 text-center mb-4">
                    <h2 class="text-danger">Products</h2>
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
                            @foreach($urun as $value)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$value->foto}}" alt="..."/>
                                        <div class="card-footer text-center bg-white">
                                            <h6>{{$value->ad}} </h6>

                                        </div>
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
        <!-- threebox slider end -->
        <hr/>
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger">About Company</h3>
                    <br>

                        {!! $user->hakkimizda !!}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h4>Keywords</h4>
                    @if($user->anahtar_kelime)
                        @foreach(json_decode($user->anahtar_kelime) as $value)
                             <button class="btn btn-outline-secondary mr-2 mb-2">{{$value->value}}</button>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>Fairs Participated</h4>
                    @if($user->fuar)
                        @foreach(json_decode($user->fuar) as $value)
                            <button class="btn btn-outline-secondary mr-2 mb-2">{{$value->value}}</button>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
        <hr/>
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger">Contact</h3>
                </div>
            </div>
            <div class="row">
{{--                <div class="col-md-6">--}}

{{--                    <img src="{{asset('public/assets/images/map.svg')}}" alt="..." class="img-fluid"/>--}}
{{--                </div>--}}
                <div class="col-md-12">
                    <h4 class="mb-6">{{$user->name}} <br/>

                    </h4>
                    <h6 class="mb-6">
                       {{$user->adres}}
                    </h6>
                    <h5><a class="text-dark text-decoration-none mb-2 d-block" href="tel:{{$user->phone}}">{{$user->phone}}</a></h5>
                    <h5><a class="text-dark text-decoration-none mb-4 d-block" href="mailto:{{$user->email}}">{{$user->email}}</a>
                    </h5>
{{--                    <h5><a href="#" class="text-danger">Adrese Git</a></h5>--}}
                </div>
            </div>
        </div>

    </main>


@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>

            $(function() {
                $('input[name="datetimes"]').daterangepicker({
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format:
                        'DD/MM/YYYY hh:mm',
                        "separator": " - ",
                        "applyLabel": "Uygula",
                        "cancelLabel": "Vazgeç",
                        "fromLabel": "Dan",
                        "toLabel": "a",
                        "customRangeLabel": "Seç",
                        "daysOfWeek": [
                            "Pt",
                            "Sl",
                            "Çr",
                            "Pr",
                            "Cm",
                            "Ct",
                            "Pz"
                        ],
                        "monthNames": [
                            "Ocak",
                            "Şubat",
                            "Mart",
                            "Nisan",
                            "Mayıs",
                            "Haziran",
                            "Temmuz",
                            "Ağustos",
                            "Eylül",
                            "Ekim",
                            "Kasım",
                            "Aralık"
                        ],
                        "firstDay": 1
                    }

                });
            });
        </script>


@endpush
