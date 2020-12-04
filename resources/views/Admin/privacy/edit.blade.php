@extends('Admin.layouts.main')
@section('content')


    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.privacy.update',$privacy)}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Gizlilik Sayfasını Düzenle</h3>
                                </div>
                                <div class="card-body">



                                    <div class="form-group col-md-12">
                                        <label class="control-label">Metin</label>
                                        <textarea class="form-control" name="metin" rows="8" required>{{$privacy->metin}}</textarea>
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
        var _URL2 = window.URL || window.webkitURL;

        $("#header").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL2.createObjectURL(file);
                img.onload = function () {

                    if (this.width != 1200 && this.height != 470) {

                        $('#error_header').html('<label class="text-danger">Lütfen  1200 X 470 boyutlarında yükleyiniz</label>');
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
