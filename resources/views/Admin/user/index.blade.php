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
                                                    <th>Firma Ünvan</th>
                                                    <th>Yetkili</th>
{{--                                                    <th>Kategori</th>--}}
                                                    <th>Telefon</th>
                                                    <th>Adres</th>
                                                    <th>Onaylı</th>
                                                    <th>Onay</th>
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
                                                        <td>@if($value->durum==1)<p  class="badge bg-success  p-2">Evet<p> @else <p  class="badge bg-danger  p-2">Hayır<p>   @endif</td>
                                                          <td>@if($value->durum==0)  <a href="{{route('admin.user.onayla',$value)}}" onclick="return confirm('Kullanıcı Kaydı Onaylanacak, Emin misiniz?')"><span
                                                                    class="badge bg-success p-2">Onayla</span></a>        @endif </td>

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


    @endpush
