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
                                <h3 class="card-title">Üst Kategoriler</h3>
                                <a href="{{route('admin.kategori.createAlt')}}" class="btn btn-info" style="float: right !important;">Yeni Alt Kategori Ekle</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Alt Kategori İsmi</th>
                                        <th>Üst Kategorisi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($altkategori as $key=>$value)
                                        <tr>
                                            <td>{{$value->alt_kategori}}</td>
                                            <td>{{\App\Kategori::find($value->ust_kategori_id)['ust_kategori']}}</td>
                                            <td><a href="{{route('admin.kategori.editAlt',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                                            <td><a href="{{route('admin.kategori.destroyAlt',$value)}}" onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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


@endsection

@push('scripts')


@endpush
