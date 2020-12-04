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
                                <h3 class="card-title">FAQ's</h3>
                                <a href="{{route('admin.faq.create')}}" class="btn btn-info" style="float: right !important;">Yeni SSS Ekle</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Soru</th>
                                        <th>Cevap</th>

                                        <th>Düzenle</th>
                                        <th>Kaldır</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faq as $key=>$value)
                                        <tr>
                                            <td>{{$value->soru}}</td>
                                            <td>{{$value->cevap}}</td>
                                            <td><a href="{{route('admin.faq.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                                            <td><a href="{{route('admin.faq.destroy',$value)}}" onclick="return confirm('Kayıt Silinecek, Emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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
