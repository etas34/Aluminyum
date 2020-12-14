
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 Turkish Metal Developed By   <a href="https://www.omerli.co/">omerli.co </a> & <a href="http://www.felixartstudios.com/">felixartstudios.com </a></strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/tagify/jQuery.tagify.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('public/adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('public/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('public/adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('public/adminlte/dist/js/adminlte.min.js')}}"></script>



<script>
        @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>
<script>


    // jQuery plugin to prevent double submission of forms
    jQuery.fn.preventDoubleSubmission = function() {
        $(this).on('submit',function(e){
            var $form = $(this);

            if ($form.data('submitted') === true) {
                // Previously submitted - don't submit again
                e.preventDefault();
            } else {
                // Mark it so that the next submit can be ignored
                $form.data('submitted', true);
            }
        });

        // Keep chainability
        return this;
    };

    $(function () {
        //double click engelleme
        $('form').preventDoubleSubmission();


    });

</script>


<script type="text/javascript">
    $(document).ready(function () {


        $('#example1').DataTable({

            "buttons": [
                "copy", "csv", "excel", "pdf", "print", "colvis"
            ],

            "autoWidth": false,
            responsive : true,
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WWDRYK49B9"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WWDRYK49B9');
</script>
</body>
</html>
