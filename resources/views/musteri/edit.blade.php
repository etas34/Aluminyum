@extends('Admin.layouts.mainFront')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        @if(\App\User::find(Auth::id())->durum == 0 )
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4><i class="icon fa fa-ban"></i> Uyarı!</h4>
                                        Firmanız henüz onaylanmadı. Firmanızın bilgilerini doldurduktan sonra, en kısa
                                        sürede firmanız onaylanacaktır
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form action="{{route('musteri.update')}}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-header">
                                <h3 class="card-title"><strong>Firma</strong> Bilgisi Düzenleme</h3>
                            </div>


                            <div class="card-body">
                                <div class="row">

                                    @if($user->logo)
                                        <label class="control-label">Seçili Logo</label>
                                        <div class="form-group col-md-12">
                                            <img height="100" src="{{$user->logo}}">
                                        </div>

                                    @endif
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Logo</label>
                                        <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                                        <span id="error_foto"></span>
                                    </div>


                                    @if($user->header)
                                        <label class="control-label">Seçili Başlık Fotoğrafı</label>
                                        <div class="form-group col-md-12">
                                            <img height="100" src="{{$user->header}}">
                                        </div>

                                    @endif
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Başlık Fotoğrafı</label>
                                        <input id="header" type="file" name="header" class="form-control"
                                               accept="image/*">
                                        <span id="error_header"></span>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Firma Ünvanı</label>
                                            <input required type="text" value="{{$user->name}}" name="firma_unvan"
                                                   class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label>E-posta</label>

                                            <div class="input-group">
                                                <input required type="email" value="{{$user->email}}" name="email"
                                                       class="form-control">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Firma Yetkilisi</label>
                                            <input required type="text" value="{{$user->yetkili}}" name="firma_yetkili"
                                                   class="form-control"/>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Telefon</label>

                                            <div class="input-group">
                                                <input required type="text" value="{{$user->phone}}"
                                                       class="form-control" name="telefon" id="phone">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>İhracat Sorumlusu</label>
                                            <input required type="text" value="{{$user->ihracat}}" name="ihracat"
                                                   class="form-control"/>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>İhracat Sorumlusunun Telefon Numarası</label>

                                            <div class="input-group">
                                                <input required type="text" value="{{$user->ihracat_tel}}"
                                                       class="form-control" name="ihracat_tel" id="phone2">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                    </div>

                                    {{--                                        <div class="form-group col-md-12">--}}
                                    {{--                                            <label>Alt Kategori Seçiniz</label>--}}
                                    {{--                                            <select class="form-control select2" name="subcategory" id="subcategory" multiple="multiple" data-placeholder="Select a State">--}}
                                    {{--                                                <option value=""></option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}

                                    {{--                                    <div class="form-group col-md-12">--}}
                                    {{--                                        <label>Alt Kategori Seçiniz</label>--}}

                                    {{--                                        <select required class="form-control select2" id="category" multiple="multiple" >--}}
                                    {{--                                            @foreach(\App\AltKategori::all() as $values)--}}
                                    {{--                                            <optgroup label="{{\App\Kategori::find($values->ust_kategori_id)['ust_kategori']}}">--}}
                                    {{--                                             <option> {{$values->alt_kategori}} </option>--}}
                                    {{--                                            </optgroup>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </select>--}}
                                    {{--                                        <!-- /.input group -->--}}
                                    {{--                                    </div>--}}


                                    <div class="form-group col-md-12">
                                        <label>Kategori Seçiniz</label>

                                        <select name="altkategori[]" required class="form-control select2" id="category"
                                                multiple="multiple">
                                            @foreach(\App\Kategori::all() as $kategorival)
                                                <optgroup label="{{$kategorival->ust_kategori}}">
                                                    @foreach(\App\AltKategori::where('ust_kategori_id',$kategorival->id)->get()  as $alt  )
                                                        <option

                                                            @if($user->altkategori_id)
                                                                    @if(  in_array( $alt->id  , explode(",",$user->altkategori_id) )   )
                                                                        selected
                                                                    @endif
                                                            @endif




                                                            value="{{ $alt->id }}"> {{ $alt->alt_kategori }}  </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <!-- /.input group -->
                                    </div>

                                    {{----}}
                                    {{--                                    <div id="sub" class="form-group col-md-6">--}}
                                    {{--                                        <label>Alt Kategori Seçiniz</label>--}}

                                    {{--                                        <select class="form-control select2" name="subcategory" id="subcategory" multiple="multiple" data-placeholder="Select a State">--}}
                                    {{--                                            @foreach(\App\Kategori::all() as $values)--}}
                                    {{--                                                <optgroup label="{{$values->id}}">--}}
                                    {{--                                                    @foreach(\App\AltKategori::where('ust_kategori_id','=',$values->id)->get() as $values2)--}}
                                    {{--                                                        <option @if($user->altkategori_id ==$values2->id ) selected @endif  value="{{$values2->id}}">{{$values2->alt_kategori}}</option>--}}
                                    {{--                                                    @endforeach--}}
                                    {{--                                                </optgroup>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </select>--}}
                                    {{--                                        <!-- /.input group -->--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <!-- /.form group -->--}}


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Firma Tanıtım YouTube Video Linki</label>
                                            <input type="text" value="{{$user->youtube_link}}" name="video_url"
                                                   class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Web Site URL</label>
                                            <input type="text" value="{{$user->website}}" name="website"
                                                   class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">

                                        <label for="ulke" class="col-form-label">Ülke</label>
                                        <select required class="form-control" name="ulke" id="ulke">
                                            @if($user->ulke)
                                                <option selected value="{{$user->ulke}}"> {{$user->ulke}} </option>
                                                <option disabled></option>
                                                <option disabled></option>

                                            @endif
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

                                    <div class="col-md-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Adres</label>
                                            <textarea required name="adres" class="form-control" rows="3"
                                                      placeholder="Adresiniz...">{{$user->adres}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Hakkımızda</label>
                                        <textarea rows="10" required class="form-control" name="hakkimizda"
                                        >{{$user->hakkimizda}}</textarea>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="control-label">Anahtar Kelimeler</label>
                                        <input height="100" name="anahtar_kelime" id="tag"
                                               placeholder="örn : (Aluminyum - Aluminium Sheet - Aluminium Sheet  )"
                                               value="{{$user->anahtar_kelime}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Katıldığı Fuarlar</label>
                                        <input name="fuar" id="tag2"
                                               placeholder="örn : (European Aluminium 2019 - European Aluminium 2019 - European Aluminium 2018 )"
                                               value="{{$user->fuar}}">
                                    </div>


                                </div>
                                <p style="padding: 19px"></p>
                                <div class=" pull-right">
                                    <input type="submit" id="edit" class="btn btn-success px-5 float-right"
                                           value="Kaydet">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')


    <script src="{{asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('public/adminlte/plugins/inputmask/jquery.inputmask.js')}}"></script>


    <script>
        var _URL1 = window.URL || window.webkitURL;
        var _URL2 = window.URL || window.webkitURL;
        $("#foto").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL1.createObjectURL(file);
                img.onload = function () {

                    if (this.width != this.height) {
                        $('#error_foto').html('<label class="text-danger">Lütfen 1:1 Oranında Fotoğraf Yükleyiniz</label>');
                        $('#foto').addClass('has-error');
                        $('#edit').attr('disabled', true);
                    } else {
                        $('#error_foto').html('<label class="text-success"></label>');
                        $('#foto').removeClass('has-error');
                        $('#edit').attr('disabled', false);

                    }


                    _URL1.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

        })
        $("#header").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL2.createObjectURL(file);
                img.onload = function () {

                    if (this.width != 1900 && this.height != 260) {

                        $('#error_header').html('<label class="text-danger">Lütfen 1900 X 260 boyutlarında yükleyiniz</label>');
                        $('#header').addClass('has-error');
                        $('#edit').attr('disabled', true);
                    } else {

                        $('#error_header').html('<label class="text-success"></label>');
                        $('#header').removeClass('has-error');
                        $('#edit').attr('disabled', false);

                    }


                    _URL2.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

        })


        $('#tag').tagify();
        $('#tag2').tagify();
        $(document).ready(function () {
            $('.select2').select2()

            // $( "#sub" ).hide();
            var $optgroups = $('#subcategory > optgroup');

            $("#category").on("change", function () {
                $("#sub").show();
                var selectedVal = this.value;

                // if (selectedVal == "")
                //     $( "#sub" ).hide();


                $('#subcategory').html($optgroups.filter('[label="' + selectedVal + '"]'));
            });
        });
        $("#phone").inputmask({"mask": "(999) 999-9999"});
        $("#phone2").inputmask({"mask": "(999) 999-9999"});
        $(function () {
            // Summernote
            $('#textarea').summernote({

                    height: 300,
                }
            )
        })

    </script>


@endpush
