@extends('Admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">

                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>&nbsp;<sup style="font-size: 20px"></sup></h3>

                                <p>Yeni Bülten Ekle</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-plus-circled"></i>
                            </div>
                            <a href="{{route('admin.bulten.create')}}" class="small-box-footer">Ekle <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Bulten::count()}}<sup style="font-size: 20px"></sup></h3>

                                <p>Bültenler</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                            <a href="{{route('admin.bulten.index')}}" class="small-box-footer">Listele <i class="fas fa-arrow-circle-right"></i></a>
                        </div>

                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{\App\User::count()}}</h3>

                                <p>Tüm Bayiler</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-navicon"></i>
                            </div>
                            <a href="{{route('admin.user.index')}}" class="small-box-footer">Listele <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{\App\User::where('durum','=',0)->count()}}</h3>

                                <p>Onay Bekleyen Bayiler</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-close-circled"></i>
                            </div>
                            <a href="{{route('admin.user.onaylanmamis')}}" class="small-box-footer">Listele <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{\App\Gorusme::where('durum','=',0)->count()}}</h3>
                                <p>İşlem İçin Bekleyen Görüşmeler</p>

                            </div>
                            <div class="icon">
                                <i class="ion ion-clock"></i>
                            </div>
                            <a href="{{route('admin.gorusme.gorusmebekle')}}" class="small-box-footer">Listele <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{\App\Gorusme::where('durum','=',2)->count()}}</h3>

                                <p>Kabul Edilen Görüşmeler</p>

                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox-working"></i>
                            </div>
                            <a href="{{route('admin.gorusme.gorusmekabul')}}" class="small-box-footer">Listele <i class="fas fa-arrow-circle-right"></i></a>
                        </div>


                    </div>
                    <!-- ./col -->
                </div>


            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

@endsection
