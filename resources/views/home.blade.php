@extends('Admin.layouts.mainFront')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Urun::where('user_id','=',Auth::id())->count()}}</h3>

                                <p>Ürünler</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-navicon"></i>
                            </div>
                            <a href="{{route('urun.index')}}" class="small-box-footer">Detaylar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>&nbsp;<sup style="font-size: 20px">Yeni Ürün Ekle</sup></h3>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-plus-circled"></i>
                            </div>
                            <a href="{{route('urun.create')}}" class="small-box-footer">Git <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>&nbsp;<sup style="font-size: 20px">Firma Ayarları</sup></h3>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-edit"></i>
                            </div>
                            <a href="{{route('musteri.edit')}}" class="small-box-footer">Düzenle <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>


            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

@endsection
