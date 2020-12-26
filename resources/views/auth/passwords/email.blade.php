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

                    <div style="text-align: center;"><h2>Reset Password</h2></div>



                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit"  class="btn btn-outline-danger mb-2 mr-2">
                                            Send Password Reset Link
                                        </button>
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
