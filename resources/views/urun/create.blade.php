@extends('Admin.layouts.mainFront')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-12">
                        <div class="card card-primary">
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
                            <form action="{{route('urun.store')}}" method="post" autocomplete="off"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Yeni Ürün Ekle</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Fotoğraf</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*"
                                                   required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Ürün İsmi</label>
                                            <input type="text" id="urunisim" maxlength="30" name="ad"
                                                   class="form-control" required>
                                            <span id="remaining"></span>
                                            <span id="limit">(30 karakter)</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Ürün Açıklama</label>
                                            <input type="text" id="aciklama" maxlength="30" name="aciklama"
                                                   class="form-control" required>
                                            <span id="remaining2"></span>
                                            <span id="limit2">(30 karakter)</span>
                                        </div>


                                        {{--                                    <div class="form-group col-md-12">--}}
                                        {{--                                        <label class="control-label">Açıklama</label>--}}
                                        {{--                                         <textarea class="form-control" name="aciklama" id="textarea" ></textarea>--}}
                                        {{--                                    </div>--}}

                                        <div class="form-group col-md-12">
                                            <label>Kategori Seçiniz</label>

                                            <select name="altkategori[]" required class="form-control select2"
                                                    id="category"
                                                    multiple="multiple">
                                                @foreach(\App\Kategori::all() as $kategorival)
                                                    <optgroup label="{{$kategorival->ust_kategori}}">
                                                        @foreach(\App\AltKategori::where('ust_kategori_id',$kategorival->id)->get()  as $alt  )
                                                            <option



                                                                value="{{ $alt->id }}"> {{ $alt->alt_kategori }}  </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            <!-- /.input group -->
                                        </div>


                                        {{--                                        <div class="form-group col-md-6">--}}
                                        {{--                                            <label>Üst Kategori Seçiniz</label>--}}

                                        {{--                                            <select name="category" required class="form-control" id="category">--}}

                                        {{--                                                @foreach(\App\Kategori::all() as $values)--}}
                                        {{--                                                    <option></option>--}}
                                        {{--                                                    <option value="{{ $values->id }}">{{ $values->ust_kategori }}</option>--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                            </select>--}}
                                        {{--                                            <!-- /.input group -->--}}
                                        {{--                                        </div>--}}

                                        {{--                                        <div id="sub" class="form-group col-md-6">--}}
                                        {{--                                            <label>Alt Kategori Seçiniz</label>--}}

                                        {{--                                            <select class="form-control" name="subcategory" id="subcategory">--}}
                                        {{--                                                <option></option>--}}

                                        {{--                                                @foreach(\App\Kategori::all() as $values)--}}
                                        {{--                                                    <optgroup label="{{$values->id}}">--}}
                                        {{--                                                        @foreach(\App\AltKategori::where('ust_kategori_id','=',$values->id)->get() as $values2)--}}
                                        {{--                                                            <option value="{{$values2->id}}">{{$values2->alt_kategori}}</option>--}}
                                        {{--                                                        @endforeach--}}
                                        {{--                                                    </optgroup>--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                            </select>--}}
                                        {{--                                            <!-- /.input group -->--}}
                                        {{--                                        </div>--}}

                                    </div>

                                </div>
                                <div class="card-footer pull-right">
                                    <input type="submit" class="btn btn-success px-5 float-right" value="Kaydet">
                                </div>

                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </section>

    </div>

@endsection

@push('scripts')


    <script src="{{asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $('#urunisim').keyup(function () {
            if (this.value.length === 0) {
                $('#limit').show();
                $('#remaining').hide();
            } else {
                $('#limit').hide();
                $('#remaining').show();
            }

            if (this.value.length > 30) {
                return false;
            }
            if (this.value.length < 25)
                $('#remaining').removeClass('text-danger');
            else
                $('#remaining').addClass('text-danger');


            $("#remaining").html("30 / " + (30 - this.value.length));
        });
        $('#urunaciklama').keyup(function () {
            if (this.value.length === 0) {
                $('#limit2').show();
                $('#remaining2').hide();
            } else {
                $('#limit2').hide();
                $('#remaining2').show();
            }

            if (this.value.length > 30) {
                return false;
            }
            if (this.value.length < 25)
                $('#remaining2').removeClass('text-danger');
            else
                $('#remaining2').addClass('text-danger');


            $("#remaining2").html("30 / " + (30 - this.value.length));
        });
        $(function () {

                $('.select2').select2()

                // Summernote
            $('#textarea').summernote({

                    height: 300,
                }
            );


            $('#tarih').daterangepicker({

                singleDatePicker: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            })
        })
    </script>


@endpush
