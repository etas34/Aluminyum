@extends('Admin.layouts.main')
@section('content')

    <div class="content-wrapper" style="min-height: 500px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Firmalar</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">

                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 table-responsive">
                                            <table id="example2" class="table table-bordered table-striped  dataTable">
                                                <thead>
                                                <tr>
                                                    <th>Firma Ünvan</th>
                                                    <th>Yetkili</th>
                                                    {{--                                                    <th>Kategori</th>--}}
                                                    <th>Telefon</th>
                                                    <th>Adres</th>
                                                    <th>Onaylı</th>
                                                    <th>Onay</th>
                                                    <th>Güncelleme Tarihi</th>

                                                    <th style="width: 100px">İşlemler</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $key=>$value)
                                                    <tr>
                                                        <td>{{$value->name}}</td>
                                                        <td>{{$value->yetkili}}</td>
                                                        {{--                                                        <td>{{$value->altkategori_id}}</td>--}}
                                                        <td>{{$value->phone}}</td>
                                                        <td>{{$value->adres}}</td>
                                                        <td>@if($value->durum==1)<p class="badge bg-success  p-2">Evet
                                                            <p> @else <p class="badge bg-danger  p-2">Hayır<p>   @endif
                                                        </td>
                                                        <td>@if($value->durum==0)  <a
                                                                href="{{route('admin.user.onayla',$value)}}"
                                                                onclick="return confirm('Kullanıcı Kaydı Onaylanacak, Emin misiniz?')"><span
                                                                    class="badge bg-success p-2">Onayla</span></a>        @endif
                                                        </td>

                                                        <td>{{$value->updated_at->format('d/m/Y - H:i')}}</td>

                                                        <td>
                                                            <a href="{{route('admin.user.edit',$value)}}"><span
                                                                    class="badge bg-primary p-2">Düzenle</span></a>
                                                            <a href="{{route('admin.user.destroy',$value)}}"
                                                               onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span
                                                                    class="badge bg-danger p-2">Sil</span></a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>

                </div>
            </div>
        </section>

    </div>


@endsection

@push('scripts')

    <script>
        $('#example2').DataTable({
            "order": [[6, "desc"]],
            "buttons": [
                "copy", "csv", "excel", "pdf", "print", "colvis"
            ],

            "autoWidth": false,
            responsive: true,
            "lengthChange": false,
            // "aaSorting": [[0,'desc']],
            language: {

                "emptyTable": "Tabloda herhangi bir veri mevcut değil",
                "info": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "infoEmpty": "Kayıt yok",
                "infoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                "infoThousands": ".",
                "lengthMenu": "Sayfada _MENU_ kayıt göster",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşleniyor...",
                "search": "Ara:",
                "zeroRecords": "Eşleşen kayıt bulunamadı",
                "paginate": {
                    "first": "İlk",
                    "last": "Son",
                    "next": "Sonraki",
                    "previous": "Önceki"
                },
                "aria": {
                    "sortAscending": ": artan sütun sıralamasını aktifleştir",
                    "sortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "1": "1 kayıt seçildi",
                        "0": "-"
                    },
                    "0": "-",
                    "1": "%d satır seçildi",
                    "2": "-",
                    "_": "%d satır seçildi",
                    "cells": {
                        "1": "1 hücre seçildi",
                        "_": "%d hücre seçildi"
                    },
                    "columns": {
                        "1": "1 sütun seçildi",
                        "_": "%d sütun seçildi"
                    }
                },
                "autoFill": {
                    "cancel": "İptal",
                    "fill": "Bütün hücreleri <i>%d<i> ile doldur<\/i><\/i>",
                    "fillHorizontal": "Hücreleri yatay olarak doldur",
                    "fillVertical": "Hücreleri dikey olarak doldur",
                    "info": "-"
                },
                "buttons": {
                    "collection": "Koleksiyon <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Sütun görünürlüğü",
                    "colvisRestore": "Görünürlüğü eski haline getir",
                    "copy": "Koyala",
                    "copyKeys": "Tablodaki sisteminize kopyalamak için CTRL veya u2318 + C tuşlarına basınız.",
                    "copySuccess": {
                        "1": "1 satır panoya kopyalandı",
                        "_": "%ds satır panoya kopyalandı"
                    },
                    "copyTitle": "Panoya kopyala",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Bütün satırları göster",
                        "1": "-",
                        "_": "%d satır göster"
                    },
                    "pdf": "PDF",
                    "print": "Yazdır"
                },
                "decimal": "-",
                "infoPostFix": "-",
                "searchBuilder": {
                    "add": "Koşul Ekle",
                    "button": {
                        "0": "Arama Oluşturucu",
                        "_": "Arama Oluşturucu (%d)"
                    },
                    "clearAll": "Hepsini Kaldır",
                    "condition": "Koşul",
                    "conditions": {
                        "date": {
                            "after": "Sonra",
                            "before": "Önce",
                            "between": "Arasında",
                            "empty": "Boş",
                            "equals": "Eşittir",
                            "not": "Değildir",
                            "notBetween": "Dışında",
                            "notEmpty": "Dolu"
                        },
                        "moment": {
                            "after": "Sonra",
                            "before": "Önce",
                            "between": "Arasında",
                            "empty": "Boş",
                            "equals": "Eşittir",
                            "not": "Değildir",
                            "notBetween": "Dışında",
                            "notEmpty": "Dolu"
                        },
                        "number": {
                            "between": "Arasında",
                            "empty": "Boş",
                            "equals": "Eşittir",
                            "gt": "Büyüktür",
                            "gte": "Büyük eşittir",
                            "lt": "Küçüktür",
                            "lte": "Küçük eşittir",
                            "not": "Değildir",
                            "notBetween": "Dışında",
                            "notEmpty": "Dolu"
                        },
                        "string": {
                            "contains": "İçerir",
                            "empty": "Boş",
                            "endsWith": "İle biter",
                            "equals": "Eşittir",
                            "not": "Değildir",
                            "notEmpty": "Dolu",
                            "startsWith": "İle başlar"
                        }
                    },
                    "data": "Veri",
                    "deleteTitle": "Filtreleme kuralını silin",
                    "leftTitle": "Kriteri dışarı çıkart",
                    "logicAnd": "ve",
                    "logicOr": "veya",
                    "rightTitle": "Kriteri içeri al",
                    "title": {
                        "0": "Arama Oluşturucu",
                        "_": "Arama Oluşturucu (%d)"
                    },
                    "value": "Değer"
                },
                "searchPanes": {
                    "clearMessage": "Hepsini Temizle",
                    "collapse": {
                        "0": "Arama Bölmesi",
                        "_": "Arama Bölmesi (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown}\/{total}",
                    "emptyPanes": "Arama Bölmesi yok",
                    "loadMessage": "Arama Bölmeleri yükleniyor ...",
                    "title": "Etkin filtreler - %d"
                },
                "searchPlaceholder": "Ara",
                "thousands": "."

            }
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    </script>
@endpush
