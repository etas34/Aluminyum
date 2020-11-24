
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

<!-- InputMask -->
<script src="{{asset('public/adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('public/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>


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

        $('#example2').DataTable({

            "autoWidth": false,
            responsive : true,

            // "aaSorting": [[0,'desc']],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json'
            }
        });
    });
</script>

</body>
</html>
