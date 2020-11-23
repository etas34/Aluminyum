@extends('Admin.layouts.main')
@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="{{route('admin.kategori.storeAlt')}}" method="post" autocomplete="off"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-header">
                                    <h3 class="card-title">Alt Kategori Ekle</h3>
                                </div>
                                <div class="card-body">


                                    <div class="form-group col-md-12">
                                        <label for="ust_kategori_id">Üst Kategori</label>

                                        <select class="form-control" required name="ust_kategori_id"
                                                id="ust_kategori_id">
                                            <option value="" disabled selected>Üst Kategori Seçiniz </option>
                                            @foreach($kategori as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->ust_kategori}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Alt Kategori İsmi</label>
                                        <input type="text" name="alt_kategori" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">İkon Seç</label>
                                        <div class="row">

                                            @foreach($files as $file)

                                            <div class="input-group col-sm-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input id="{{$file->getFilename()}}" value="{{$file->getFilename()}}" type="radio" name="icon">
                                                    </div>
                                                </div>
                                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label  for="{{$file->getFilename()}}"> <img width="100" height="100" src="{{asset('public/icons/'.$file->getFilename())}}">  </label>
                                            </div>
                                                @endforeach
                                        </div>
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

@push('scripts')


    <script src="{{asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('#textarea').summernote({

                    height: 300,
                }
            );


            $('#tarih').daterangepicker({

                singleDatePicker: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            })
        })
    </script>


@endpush
