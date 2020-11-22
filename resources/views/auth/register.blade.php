@extends('layouts.front_app')

@section('content')

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div style="text-align: center;">
                        <h2>Register</h2>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Firma Ünvanı</label>
                                    <div class="col-md-6">
                                    <input type="text" required name="firma_unvan" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Firma Yetkilisi</label>
                                <div class="col-md-6">
                                    <input type="text" required name="firma_yetkili" class="form-control" value=""/>
                                </div>

                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">YouTube Video Linki</label>
                                <div class="col-md-6">
                                    <input type="text" required name="video_url" class="form-control" value=""/>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Telefon</label>
                                <div class="col-md-6">
                              <div class="input-group">
                                        <input type="text" required class="form-control" name="telefon" id="phone">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>E-posta</label>

                                    <div class="input-group">
                                        <input type="email" required name="email" class="form-control">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                            </div>

                            <div class="col-md-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea name="adres" required class="form-control" rows="3" placeholder="Adresiniz..."></textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Hakkımızda</label>
                                <textarea class="form-control" required name="hakkimizda" id="textarea"></textarea>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-danger">
                                        {{__('Register')}}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
