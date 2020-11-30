@extends('Admin.layouts.mainFront')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('urun.store')}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Yeni Ürün Ekle</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Fotoğraf</label>
                                        <input type="file" name="foto" class="form-control" accept="image/*"  required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Ürün İsmi</label>
                                        <input type="text"  name="ad" class="form-control" required>
                                    </div>


{{--                                    <div class="form-group col-md-12">--}}
{{--                                        <label class="control-label">Açıklama</label>--}}
{{--                                         <textarea class="form-control" name="aciklama" id="textarea" ></textarea>--}}
{{--                                    </div>--}}

                                        <div class="form-group col-md-6">
                                            <label>Üst Kategori Seçiniz</label>

                                            <select name="category" required class="form-control" id="category">

                                                @foreach(\App\Kategori::all() as $values)
                                                    <option></option>
                                                    <option value="{{ $values->id }}">{{ $values->ust_kategori }}</option>
                                                @endforeach
                                            </select>
                                            <!-- /.input group -->
                                        </div>

                                        <div id="sub" class="form-group col-md-6">
                                            <label>Alt Kategori Seçiniz</label>

                                            <select class="form-control" name="subcategory" id="subcategory">
                                                <option></option>

                                                @foreach(\App\Kategori::all() as $values)
                                                    <optgroup label="{{$values->id}}">
                                                        @foreach(\App\AltKategori::where('ust_kategori_id','=',$values->id)->get() as $values2)
                                                            <option value="{{$values2->id}}">{{$values2->alt_kategori}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            <!-- /.input group -->
                                        </div>

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
        $(function () {
            // Summernote
            $('#textarea').summernote({

                height: 300,
                }
            );


            $('#tarih').daterangepicker({

                singleDatePicker:true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            })
        })
    </script>


    @endpush
