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

                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 table-responsive">
                                            <table id="example1" class="table table-bordered table-striped  dataTable">
                                                <thead>
                                                <tr>
                                                    <th>Müşteri Ünvanı</th>
                                                    <th>Ürün Görseli</th>
                                                    <th>Ürün İsmi</th>
                                                    <th>Kategoriler</th>

                                                    <th>Düzenle</th>
                                                    <th>Kaldır</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($urun as $key=>$value)
                                                    <tr>
                                                        <td>{{\App\User::find($value->user_id)['name']}}
                                                            <br>
                                                        <b>{{\App\User::find($value->user_id)['email']}}</b>
                                                        </td>
                                                        <td><img src="{{$value->foto}}" height="100px"></td>
                                                        <td>{{$value->ad}}</td>
                                                        <td>
                                                            Üst kategori:   @foreach (explode(',',$value->kategori_id ) as $value2)
                                                                {{ \App\Kategori::find($value2)['ust_kategori']  }}
                                                            @endforeach
                                                            <br/>
                                                            Alt kategori:   @foreach (explode(',',$value->alt_kategori_id ) as $value3)
                                                                {{ \App\AltKategori::find($value3)['alt_kategori'] }}
                                                            @endforeach



                                                        </td>

                                                        <td><a href="{{route('admin.adminurun.edit',$value)}}"><span
                                                                    class="badge bg-warning p-2">Düzenle</span></a></td>
                                                        <td><a href="{{route('admin.adminurun.destroy',$value)}}"
                                                               onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span
                                                                    class="badge bg-danger p-2">Sil</span></a></td>

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


    @endpush
