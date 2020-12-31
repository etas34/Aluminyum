@extends('Admin.layouts.mainFront')

@section('content')
    <div class="content-wrapper" style="min-height: 500px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Görüşme Talepleri</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Ad Soyad</th>
                                        <th>Mesaj</th>
                                        <th>Tarih</th>
                                        <th>Firma Bilgileri</th>
                                        <th>Ülke</th>
                                        <th>Görüşme Durumu</th>
                                        <th class="text-center">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gorusme as $key=>$value)
                                        <tr>

                                            <td> {{ $value->ad_soyad }} </td>
                                            <td> {{ $value->mesaj }} </td>
                                            <td> {{ $value->tarih }} </td>
                                            <td>
                                                {{ $value->firma_unvan }}
                                                <br/>
                                                {{ $value->tel }}
                                                <br/>
                                                {{ $value->website }}
                                                <br>
                                                {{ $value->email }}
                                            </td>


                                            <td> {{ $value->ulke }} </td>
                                            <td>
                                                @if($value->durum == 0) <span class="badge bg-cyan p-2">İşlem İçin Bekleniyor</span>
                                                @elseif($value->durum == 1) <span
                                                    class="badge bg-danger p-2">Reddedildi</span>
                                                <br>
                                                    Sebep:<br>
                                                    {{$value->reddetme_sebep}}
                                                @elseif($value->durum == 2) <span class="badge bg-success p-2">Kabul Edildi</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a type="button" class="badge bg-primary p-2"
                                                   data-id="{{$value->id}}"
                                                   data-toggle="modal" data-target="#exampleModal">
                                                    Tarih revizesi yap
                                                </a>
                                                <br>
                                                <br>
                                                @if( $value->durum == 0)      <a
                                                    type="button"
                                                    data-id2="{{$value->id}}"
                                                    data-toggle="modal" data-target="#exampleModal2"

                                                ><span class="badge bg-danger p-2">Reddet</span></a>@endif




                                                @if($value->durum == 1 or $value->durum == 0)
                                                    <a href="{{route('gorusme.kabul',$value->id)}}"
                                                       onclick="return confirm('Görüşme Kabul Edilecek, Emin misiniz?')"><span
                                                            class="badge bg-success p-2">Kabul Et</span></a> @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>

                </div>
            </div>
        </section>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tarih revizesi yap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('gorusme.revize')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Tarih Giriniz <span style="color: red">* </span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="datetimes"/>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.input group -->                        </div>
                        <input hidden type="text" name="gorusme_id" id="inputid" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reddetme Nedeni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('gorusme.bekleme')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label class="control-label" for="othercheck">Reddetme nedeninizi aşağıdaki listedem seçiniz.</label>
                                <select name="neden" id="othercheck" class="form-control">

                                    <option value="Another meeting">Another meeting</option>
                                    <option value="Out of Office">Out of Office</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div id="gizleme" style="display: none">

                                    <label class="control-label" for="neden">Lütfen görüşmenizi neden reddetiğinizi kısaca açıklayın:</label>

                                    <textarea id="neden2" name="neden2" class="form-control"></textarea>

                                </div>
                            </div>
                        </div>

                        <input hidden type="text" name="gorusme_id2" id="inputid2" class="form-control">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


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
                        'DD/MM/YYYY H:mm',
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

    <script>
        $('#exampleModal').on('show.bs.modal', function (e) {
            var Id = $(e.relatedTarget).data('id');
            $('#inputid').val(Id);
        })
        $('#exampleModal2').on('show.bs.modal', function (e) {
            var Id2 = $(e.relatedTarget).data('id2');
            $('#inputid2').val(Id2);
        })
        $(function() {
            $("#othercheck").on("change",function() {
                $('#gizleme').toggle(this.value == "Other");
            }).change(); // in case of reload
        });


    </script>
@endpush
