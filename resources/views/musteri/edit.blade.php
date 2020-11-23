@extends('Admin.layouts.mainFront')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">

                        <form action="{{route('musteri.update')}}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-header">
                                <h3 class="card-title"><strong>Firma</strong> Bilgisi Düzenleme</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    @if($user->foto)
                                        <label class="control-label">Seçili Logo</label>
                                        <div class="form-group col-md-12">
                                            <img height="100" src="{{$user->foto}}">
                                        </div>

                                    @endif
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Logo</label>
                                        <input type="file" name="foto" class="form-control" accept="image/*">
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
                                    <div class="form-group col-md-6">
                                        <label>Üst Kategori Seçiniz</label>

                                        <select required class="form-control" id="category">

                                            @foreach(\App\Kategori::all() as $values)
                                                <option  @if( (\App\Kategori::find(\App\AltKategori::find($user->altkategori_id))->first()->id) == $values->id )  selected @endif value="{{$values->id}}">{{$values->ust_kategori}}</option>
                                            @endforeach
                                        </select>
                                        <!-- /.input group -->
                                    </div>
                                    @if($user->logo)
                                    <div class="form-group col-md-6">
                                        <img width="150" height="150" src="{{$user->logo}}">
                                    <!-- /.form group -->

{{----}}
                                    <div id="sub" class="form-group col-md-6">
                                        <label>Alt Kategori Seçiniz</label>

                                        <select class="form-control" name="subcategory" id="subcategory">
                                            @foreach(\App\Kategori::all() as $values)
                                                <optgroup label="{{$values->id}}">
                                                    @foreach(\App\AltKategori::where('ust_kategori_id','=',$values->id)->get() as $values2)
                                                        <option @if($user->altkategori_id ==$values2->id ) selected @endif  value="{{$values2->id}}">{{$values2->alt_kategori}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>YouTube Video Linki</label>
                                            <input type="text" value="{{$user->youtube_link}}" name="video_url"
                                                   class="form-control"/>
                                        </div>

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
                                        <textarea required class="form-control" name="hakkimizda"
                                                  id="textarea">{{$user->hakkimizda}}</textarea>
                                    </div>



                                </div>
                                <p style="padding: 19px"></p>
                                <div class=" pull-right">
                                    <input type="submit" class="btn btn-success px-5 float-right" value="Kaydet">
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
        $(document).ready(function () {


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
        $(function () {
            // Summernote
            $('#textarea').summernote({

                    height: 300,
                }
            )
        })

    </script>


@endpush
