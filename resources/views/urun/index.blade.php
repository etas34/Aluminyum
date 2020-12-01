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
                                <h3 class="card-title">Ürünler</h3>
                                <a href="{{route('urun.create')}}" class="btn btn-info"
                                   style="float: right !important;">Yeni Ürün Ekle</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Ürün Görseli</th>
                                        <th>Ürün İsmi</th>
                                        <th>Üst Kategori</th>
                                        <th>Alt Kategori</th>
                                        <th>Düzenle</th>
                                        <th>Kaldır</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($urun as $key=>$value)
                                        <tr>
                                            <td><img src="{{$value->foto}}" height="100px"></td>
                                            <td>{{$value->ad}}</td>
                                            <td>{{\App\Kategori::find($value->kategori_id)['ust_kategori']}}</td>
                                            <td>{{\App\AltKategori::find($value->alt_kategori_id)['alt_kategori']}}</td>

                                            <td><a href="{{route('urun.edit',$value)}}"><span
                                                        class="badge bg-warning p-2">Düzenle</span></a></td>
                                            <td><a href="{{route('urun.destroy',$value)}}"
                                                   onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span
                                                        class="badge bg-danger p-2">Sil</span></a></td>

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
