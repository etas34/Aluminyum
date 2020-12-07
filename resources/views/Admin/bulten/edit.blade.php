@extends('Admin.layouts.main')
@section('content')


    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.bulten.update',$bulten)}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Bülten Düzenle</h3>
                                </div>
                                <div class="card-body">

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Seçili Fotoğraf</label><br>
                                        <img type="file" src="{{$bulten->foto}}" height="200px" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Fotoğraf</label>
                                        <input type="file"  name="foto" class="form-control" accept="image/*" >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Baslik</label>
                                        <input type="text"  name="baslik" class="form-control" value="{{$bulten->baslik}}" required>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="control-label">İçerik</label>
                                        <textarea class="form-control" id="textarea" name="icerik" rows="8" required>{{$bulten->icerik}}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Tarih</label>
                                        <input type="text" class="form-control pull-right" name="tarih" value="{{$bulten->tarih}}" id="tarih">
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
                    format: 'DD/MM/YYYY',
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
            })
        })
    </script>


@endpush
