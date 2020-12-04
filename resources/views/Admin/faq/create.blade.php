@extends('Admin.layouts.main')
@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.faq.store')}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Yeni SSS Ekle</h3>
                                </div>
                                <div class="card-body">

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Soru</label>
                                        <input type="text"  name="soru" class="form-control" required>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="control-label">Cevap</label>
                                         <textarea class="form-control" name="cevap" rows="8"  required></textarea>
                                    </div>



                                </div>
                                <div class="card-footer pull-right">
                                    <input type="submit" class="btn btn-success px-5 float-right" id="edit" value="Kaydet">
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
        var _URL1 = window.URL || window.webkitURL;

        $("#foto").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL1.createObjectURL(file);
                img.onload = function () {

                    if (  this.width / this.height === (4 / 3)) {

                        $('#error_foto').html('<label class="text-success"></label>');
                        $('#foto').removeClass('has-error');
                        $('#edit').attr('disabled', false);
                    } else {

                        $('#error_foto').html('<label class="text-danger">Lütfen 4:3 Oranında Fotoğraf Yükleyiniz</label>');
                        $('#foto').addClass('has-error');
                        $('#edit').attr('disabled', true);


                    }


                    _URL1.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

        })

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
