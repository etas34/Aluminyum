@extends('layouts.front_app')

@section('content')
    <hr/>
    <div style="margin-bottom: 100px;"></div>
    <main class="py-4">
        <div class="container">
            <div class="row">

                <div class="col-md-5">


{{--                    <img src="https://via.placeholder.com/400X200">--}}
                    <img class="img-fluid" src="{{asset('public/assets/images/reglog.png')}}">

                </div>

                <div class="col-md-7 ml-auto mr-8">

                    <div style="text-align: center;"><h2>Login</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <a class="mt-2" href="/password/reset" style="color: rgb(51, 51, 51); font-size: 14px; font-weight: bold;">Forgot your password?</a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit"
                                            class="btn btn-outline-danger mb-2 mr-2">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <div style="margin-bottom: 100px;"></div>
@endsection
