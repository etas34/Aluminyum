@extends('layouts.front_app')

@section('content')
<!-- hero start -->
<div class="hero mb-5 text-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="museo900">Turkish Aluminium 365 ile</h1>
                <h2 class="museo500">dijitalleşen alüminyum sektörü  <br />
                    ihracat dünyasını keşfedin!
                </h2>
                <p class="font-weight-light">Ürün arama ve online b2b toplantı araçlarını kullanarak  <br />
                    en iyi aliminyum ürünlerini ve üreticilerini keşfedin!
                </p>
                <div class="row mb-5">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select name="cat" class="form-control">
                            <option value="1">Categories</option>
                            <option value="2">cat 1</option>
                            <option value="3">cat 2</option>
                        </select>
                    </div>
                    <div class="col-md-7 mb-3 mb-md-0">
                        <input type="text" class="form-control" placeholder="Search Product Name, Company or Brand Name" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger">SEARCH</button>
                    </div>
                </div>
                <a href="javascript:void(0);" class="toBottom text-dark"><img src="{{asset('public/assets/images/arrow-down.svg')}}" alt="" /></a>
            </div>
        </div>
    </div>
</div>
<!-- hero end -->

<!-- filter start -->
<div class="filter">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="text-danger">Aliminum Products</h2>
                <h2 class="text-secondary font-weight-light">Explore aliminum categories and products</h2>
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col-12">
                <button class="btn btn-outline-secondary mr-2 mb-2 mb-md-0">Bars, Rods & Profiles</button>
                <button class="btn btn-danger mr-2 mb-2 mb-md-0">Flat Products</button>
                <button class="btn btn-outline-secondary mr-2 mb-2 mb-md-0">Construction Materials</button>
                <button class="btn btn-outline-secondary mr-2 mb-2 mb-md-0">Others</button>
                <button class="btn btn-outline-secondary mb-2 mb-md-0">Vehicle Parts</button>
            </div>
        </div>
        <div class="row text-center mb-5">
            <div class="col-12 d-flex flex-wrap align-items-strech justify-content-center">
                <button class="btn btn-outline-danger mr-3 mb-2 mb-md-0"><img class="mr-2" src="{{asset('public/assets/images/sheet.svg')}}" alt="..." />Sheet</button>
                <button class="btn btn-outline-secondary mr-3 mb-2 mb-md-0"><img class="mr-2" src="{{asset('public/assets/images/roll.svg')}}" alt="..." />Roll</button>
                <button class="btn btn-outline-secondary mr-3 mb-2 mb-md-0"><img class="mr-2" src="{{asset('public/assets/images/disc.svg')}}" alt="..." />Disc</button>
                <button class="btn btn-outline-secondary mb-2 mb-md-0"><img class="mr-2" src="{{asset('public/assets/images/foil.svg')}}" alt="..." />Foil</button>
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col-12">
                <h4>Aluminium Sheet Producers</h4>
            </div>
        </div>
        <div class="row row-cols-sm-2 row-cols-md-3">
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 mb-md-5">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="{{asset('public/assets/images/logo1.png')}}" alt="..." />
                    </div>
                    <div class="card-footer text-center bg-white">
                        <p class="card-text">
                            Deima <br />
                            Elektronik Urunler Imalat <br />
                            San.ve Tic. A.S.
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- filter end	 -->

@endsection
