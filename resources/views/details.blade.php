@extends('layouts.front_app')

@section('content')
    <!-- hero start -->
    <main class="detail">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            SCHEDULE MEETING
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('schedule')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Date and Time <span style="color: red">* </span></label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control" name="datetimes"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.input group -->

                                <div class="form-group col-md-6">
                                    <label for="adSoyad" class="col-form-label">Full Name <span
                                            style="color: red">* </span></label>
                                    <input type="text" required class="form-control" name="adSoyad" id="adSoyad">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="adSoyad" class="col-form-label">Email<span
                                            style="color: red">* </span></label>
                                    <input type="text" required class="form-control" name="email_firma" id="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firmaUnvan" class="col-form-label">Company Name<span
                                            style="color: red">* </span></label>
                                    <input type="text" required class="form-control" name="firmaUnvan" id="firmaUnvan">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefon" class="col-form-label">Phone Number <span
                                            style="color: red">* </span></label>
                                    <input type="tel" required class="form-control" name="telefon" id="telefon">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="website" class="col-form-label">Web Address</label>
                                    <input type="text" class="form-control" name="website" id="website">
                                </div>


                                <div class="form-group col-md-12">

                                    <label for="ulke" class="col-form-label">Country <span
                                            style="color: red">* </span></label>
                                    <select required class="form-control" name="ulke" id="ulke">
                                        <option value="Türkiye">Türkiye</option>


                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>


                                </div>


                                <div class="form-group col-md-12">
                                    <label for="message-text" class="col-form-label">Your Message <span
                                            style="color: red">* </span></label>
                                    <textarea required class="form-control" name="mesaj" id="message-text"></textarea>
                                </div>
                                <input type="text" hidden name="email" value="{{$user->email}}">
                                <input type="text" hidden name="user_id" value="{{$user->id}}">

                            </div>
                            <h6>  <span style="color: red">* </span>  : Required Fields</h6>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-outline-danger">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="detailbg text-center">
            @if($user->header)
            <img src="{{$user->header}}" alt="..." class="img-fluid"/>
            @else
            <img style="background-color: #F1F1F1; border-color: #8C8C8C; border-style: solid; border-width: 1px; " src="{{asset('public/assets/images/detaybg.svg')}}" alt="..." class="img-fluid"/>
            @endif
            <img style="background-color: #F1F1F1; border-color: #8C8C8C; border-style: solid; border-width: 1px; "  height="200" width="200" src="{{$user->logo}}" alt="..." class="detail-logo"/>
        </div>


        <!-- Modal -->
        <div style="margin-top: -100px" class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="font-weight-light">
                        {{$user->name}}<br/> &nbsp;

                    </h1>
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        SCHEDULE MEETING
                    </button>
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
                                <iframe
                                    src='https://www.youtube.com/embed/{!! explode("?v=",$user->youtube_link)[1] !!}'
                                    frameborder='0'
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
                                            <p class="card-text">{{ $value->aciklama }}</p>
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

                    {!!  $user->hakkimizda !!}

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
                    <div class="mb-6">
                        <span>{{$user->adres}}</span>
                    </div>
                  <a class="text-dark text-decoration-none mb-2 d-block"
                           href="tel:{{$user->phone}}">{{$user->phone}}</a>
                   <a class="text-dark text-decoration-none mb-4 d-block"
                           href="mailto:{{$user->email}}">{{$user->email}}</a>

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

        $(function () {
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
