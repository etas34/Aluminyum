<?php

namespace App\Http\Controllers\Admin;

use App\Howitworks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowitworksController extends Controller
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
        //
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
     * @param  \App\Howitworks  $howitworks
     * @return \Illuminate\Http\Response
     */
    public function show(Howitworks $howitworks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Howitworks  $howitworks
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $howitworks = Howitworks::first();

        return view('Admin.howitworks.edit', compact('howitworks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Howitworks  $howitworks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $howitworks = Howitworks::first();
        if ($request->file('foto')) {

            $image = $request->file('foto');
            $ext = $image->extension();
            $image_name = 'howitworks' . time() . "." . $ext;
            $upload_path = 'howitworks/';
            $image_url = "storage/app/" . $upload_path . $image_name;

            $image->storeAs($upload_path, $image_name);

            $howitworks->foto = url($image_url);

        }
        $howitworks->baslik = $request->baslik;
        $howitworks->metin = $request->metin;
        $saved = $howitworks->save();
        if ($saved)
            $notification = array(
                'messege' => 'Kayıt Başarılı',
                'alert-type' => 'success'
            );
        else
            $notification = array(
                'messege' => 'Dikkat ! Bir Hata Oluştu',
                'alert-type' => 'error'
            );

        return redirect()->route('admin.howitworks.edit')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Howitworks  $howitworks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Howitworks $howitworks)
    {
        //
    }
}
