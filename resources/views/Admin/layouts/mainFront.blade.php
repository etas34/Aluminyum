@include('Admin.layouts.headerFront')
@include('Admin.layouts.sidebarFront')

@yield('content')

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Şifre Değiştir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('musteri.sifre')}}" method="post" autocomplete="off">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label>Yeni Şifre</label>
                    <input type="text" class="form-control" name="sifre" min="6">
                </div>
            </div>
            <div class="modal-footer pull-right">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@include('Admin.layouts.footer')
@stack('scripts')
