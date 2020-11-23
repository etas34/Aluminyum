<?php

namespace App\Http\Controllers;

use App\AltKategori;
use App\Kategori;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $firma=User::where('durum',1)->get();
        $ustkategori=Kategori::all();
        $ustkategori_ilk=Kategori::first();
        $altkategori=AltKategori::where('ust_kategori_id',$ustkategori_ilk->id)->get();
        return view('index',compact('firma','ustkategori','altkategori'));
    }


    public function home()
    {
        return view('home');
    }
}
