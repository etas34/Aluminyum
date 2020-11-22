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
                                <h3 class="card-title">Bültenler</h3>
                                <a href="{{route('admin.bulten.create')}}" class="btn btn-info" style="float: right !important;">Yeni Bülten Ekle</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Başlık</th>
                                        <th>Tarih</th>
                                        <th>Düzenle</th>
                                        <th>Kaldır</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bulten as $key=>$value)
                                        <tr>
                                            <td><img  src="{{$value->foto}}" height="100px"></td>
                                            <td>{{$value->baslik}}</td>
                                            <td>{{$value->tarih}}</td>
                                            <td><a href="{{route('admin.bulten.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                                            <td><a href="{{route('admin.bulten.destroy',$value)}}" onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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
