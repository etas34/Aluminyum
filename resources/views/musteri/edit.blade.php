@extends('Admin.layouts.mainFront')

@section('content')

    <div class="content-wrapper" style="min-height: 1203.6px;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">

                        <form action="{{route('musteri.update')}}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-header">
                                <h3 class="card-title"><strong>Firma</strong> Bilgisi Düzenleme</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Firma Ünvanı</label>
                                            <input required type="text" value="{{$user->name}}"  name="firma_unvan" class="form-control" />
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label>E-posta</label>

                                            <div class="input-group">
                                                <input required type="email" value="{{$user->email}}" name="email" class="form-control">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Firma Yetkilisi</label>
                                            <input required type="text" value="{{$user->yetkili}}" name="firma_yetkili" class="form-control" />
                                        </div>

                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>YouTube Video Linki</label>
                                            <input required type="text" value="{{$user->youtube_link}}" name="video_url" class="form-control" />
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Telefon</label>

                                            <div class="input-group">
                                                <input required type="text" value="{{$user->phone}}" class="form-control" name="telefon" id="phone">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Logo</label>
                                        <input type="file"  name="foto" class="form-control" accept="image/*">
                                    </div>
                                    @if($user->logo)
                                    <div class="form-group col-md-6">
                                        <img width="150" height="150" src="{{$user->logo}}">
                                    </div>

                                    @endif


                                    <div class="col-md-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Adres</label>
                                            <textarea required name="adres" class="form-control" rows="3" placeholder="Adresiniz...">{{$user->adres}}</textarea>
                                        </div>
                                    </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Hakkımızda</label>
                                            <textarea required class="form-control" name="hakkimizda" id="textarea">{{$user->hakkimizda}}</textarea>
                                        </div>



                                </div>
                                <p style="padding: 19px"></p>
                                <div class=" pull-right" >
                                    <input type="submit" class="btn btn-success px-5 float-right" value="Kaydet">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')


    <script src="{{asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('public/adminlte/plugins/inputmask/jquery.inputmask.js')}}"></script>


    <script>
        $("#phone").inputmask({"mask": "(999) 999-9999"});
        $(function () {
            // Summernote
            $('#textarea').summernote({

                    height: 300,
                }
            )
        })

    </script>


@endpush
