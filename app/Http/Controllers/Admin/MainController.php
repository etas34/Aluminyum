<?php

namespace App\Http\Controllers\Admin;

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
}
