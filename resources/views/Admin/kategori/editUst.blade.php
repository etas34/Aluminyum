@extends('Admin.layouts.main')
@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.kategori.updateUst',$kategori)}}" method="post" autocomplete="off"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Üst Kategori Düzenle</h3>
                                </div>
                                <div class="card-body">


                                    <div class="form-group col-md-12">
                                        <label class="control-label">Üst Kategori İsmi</label>
                                        <input type="text" value="{{$kategori->ust_kategori}}" name="ust_kategori" class="form-control" required>
                                    </div>





                                </div>
                                <div class="card-footer pull-right">
                                    <input type="submit" class="btn btn-success px-5 float-right" value="Kaydet">
                                </div>

                            </form>
                        </div>



                    </div>

                </div>
            </div>
        </section>

    </div>

@endsection
