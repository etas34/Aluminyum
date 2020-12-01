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
        return view('admin.gorusme.index',compact('gorusme'));
    }


}
