@extends('Admin.layouts.main')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.adminurun.update',$urun)}}" method="post" autocomplete="off"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Ürün Düzenle</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Kategori Seçiniz</label>

                                            <select name="altkategori[]" required class="form-control select2" id="category"
                                                    multiple="multiple">
                                                @foreach(\App\Kategori::all() as $kategorival)
                                                    <optgroup label="{{$kategorival->ust_kategori}}">
                                                        @foreach(\App\AltKategori::where('ust_kategori_id',$kategorival->id)->get()  as $alt  )
                                                            <option

                                                                @if($urun->alt_kategori_id)
                                                                @if(  in_array( $alt->id  , explode(",",$urun->alt_kategori_id) )   )
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

                                        {{--                                    <div class="form-group col-md-6">--}}
                                        {{--                                        <label>Üst Kategori Seçiniz</label>--}}

                                        {{--                                        <select name="category" required class="form-control" id="category">--}}

                                        {{--                                            @foreach(\App\Kategori::all() as $values)--}}
                                        {{--                                            <option></option>--}}
                                        {{--                                                <option @if($urun->alt_kategori_id) @if(  $urun->kategori_id == $values->id  ) selected @endif  @endif value="{{ $values->id }}">{{ $values->ust_kategori }}</option>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                        {{--                                        <!-- /.input group -->--}}
                                        {{--                                    </div>--}}

                                        {{--                                    <div id="sub" class="form-group col-md-6">--}}
                                        {{--                                        <label>Alt Kategori Seçiniz</label>--}}

                                        {{--                                        <select class="form-control" name="subcategory" id="subcategory">--}}
                                        {{--                                            <option></option>--}}

                                        {{--                                        @foreach(\App\Kategori::all() as $values)--}}
                                        {{--                                                <optgroup label="{{$values->id}}">--}}
                                        {{--                                                    @foreach(\App\AltKategori::where('ust_kategori_id','=',$values->id)->get() as $values2)--}}
                                        {{--                                                        <option @if($urun->alt_kategori_id ==$values2->id ) selected @endif  value="{{$values2->id}}">{{$values2->alt_kategori}}</option>--}}
                                        {{--                                                    @endforeach--}}
                                        {{--                                                </optgroup>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                        {{--                                        <!-- /.input group -->--}}
                                        {{--                                    </div>--}}
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Ürün İsmi</label>
                                            <input type="text" name="ad" class="form-control" value="{{$urun->ad}}"
                                                   required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Ürün Açıklama</label>
                                            <input type="text" id="urunaciklama" value="{{  $urun->aciklama }}" maxlength="30" name="aciklama"
                                                   class="form-control" required>
                                            <span id="remaining2"></span>
                                            <span id="limit2">(30 karakter)</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Ürün Görseli</label><br>
                                            <img type="file" src="{{$urun->foto}}" height="200px">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Fotoğraf (800 X 600 )</label>
                                            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                                            <span id="error_foto"></span>

                                        </div>




                                        <!-- /.form group -->


                                        {{--                                    <div class="form-group col-md-12">--}}
                                        {{--                                        <label class="control-label">Açıklama</label>--}}
                                        {{--                                         <textarea class="form-control" name="aciklama" id="textarea" >{{$urun->aciklama}}</textarea>--}}
                                        {{--                                    </div>--}}


                                    </div>
                                    <div class="card-footer pull-right">
                                        <input type="submit" class="btn btn-success px-5 float-right"  id="edit" value="Kaydet">
                                    </div>
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
        var _URL2 = window.URL || window.webkitURL;
        $("#foto").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL2.createObjectURL(file);
                img.onload = function () {

                    if (this.width != 800 && this.height != 600) {

                        $('#error_foto').html('<label class="text-danger">Lütfen 800 X 600 boyutlarında yükleyiniz</label>');
                        $('#foto').addClass('has-error');
                        $('#edit').attr('disabled', true);
                    } else {

                        $('#error_foto').html('<label class="text-success"></label>');
                        $('#foto').removeClass('has-error');
                        $('#edit').attr('disabled', false);

                    }


                    _URL2.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

        })
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
            // Summernote

            $('.select2').select2()

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
