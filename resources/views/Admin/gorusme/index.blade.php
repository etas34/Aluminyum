@extends('Admin.layouts.main')
@section('content')

    <div class="content-wrapper" style="min-height: 500px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $header }}</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!-- /.card-header -->

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Firma Sahibi</th>
                                                <th>Ad Soyad</th>
                                                <th>Mesaj</th>
                                                <th>Tarih</th>
                                                <th>Firma Bilgileri</th>
                                                <th>Ülke</th>
                                                <th>Görüşme Durumu</th>
                                                {{--                                        <th class="text-center">İşlemler</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($gorusme as $key=>$value)
                                                <tr>

                                                    <td>{{\App\User::find($value->user_id)['name']}}</td>
                                                    <td> {{ $value->ad_soyad }} </td>
                                                    <td> {{ $value->mesaj }} </td>
                                                    <td> {{ $value->tarih }} </td>
                                                    <td>
                                                        {{ $value->firma_unvan }}
                                                        <br/>
                                                        {{ $value->tel }}
                                                        <br/>
                                                        {{ $value->website }}
                                                    </td>


                                                    <td> {{ $value->ulke }} </td>
                                                    <td>
                                                        @if($value->durum == 0) <span class="badge bg-cyan p-2">İşlem İçin Bekleniyor</span>
                                                        @elseif($value->durum == 1) <span class="badge bg-warning p-2">Beklemede</span>
                                                        @elseif($value->durum == 2) <span class="badge bg-success p-2">Kabul Edildi</span>
                                                        @endif
                                                    </td>

                                                    {{--                                            <td class="text-center">--}}

                                                    {{--                                                <a  @if($value->durum == 1) style="  pointer-events: none; cursor: default;" @endif href="{{route('gorusme.bekleme',$value->id)}}"--}}
                                                    {{--                                                   onclick="return confirm('Görüşme Beklemeye Alınacak, Emin misiniz?')"--}}

                                                    {{--                                                ><span--}}
                                                    {{--                                                        class="badge bg-warning p-2">Beklemeye Al</span></a>--}}

                                                    {{--                                                <a href="{{route('gorusme.kabul',$value->id)}}"--}}
                                                    {{--                                                   @if($value->durum == 2) style="  pointer-events: none; cursor: default;" @endif onclick="return confirm('Görüşme Kabul Edilecek, Emin misiniz?')"><span--}}
                                                    {{--                                                        class="badge bg-success p-2">Kabul Et</span></a>--}}

                                                    {{--                                            </td>--}}

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
                    </div>
        </section>

    </div>


@endsection

@push('scripts')
    <script>
        $(function () {
            $('#example1').DataTable()

        })
    </script>

@endpush
