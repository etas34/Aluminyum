<?php

namespace App\Http\Controllers\Admin;

use App\Gorusme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Admin.home');
    }
    public function gorusme()
    {
        $gorusme = Gorusme::all();
        $header = "Görüşme Talepleri";
        return view('admin.gorusme.index',compact('gorusme','header'));
    }
    public function gorusmekabul()
    {
        $gorusme = Gorusme::where('durum',2)
        ->get();
        $header = "Kabul Edilen Görüşme Talepleri";
        return view('admin.gorusme.index',compact('gorusme','header'));
    }
    public function gorusmebekle()
    {
        $gorusme = Gorusme::where('durum',1)
            ->get();
        $header = "Beklemeye Alınan Görüşme Talepleri";

        return view('admin.gorusme.index',compact('gorusme','header'));
    }


}
