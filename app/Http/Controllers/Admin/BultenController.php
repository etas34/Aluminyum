<?php

namespace App\Http\Controllers\Admin;

use App\Bulten;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class BultenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.bulten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bulten  $bulten
     * @return \Illuminate\Http\Response
     */
    public function show(Bulten $bulten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bulten  $bulten
     * @return \Illuminate\Http\Response
     */
    public function edit(Bulten $bulten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bulten  $bulten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bulten $bulten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bulten  $bulten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulten $bulten)
    {
        //
    }
}
