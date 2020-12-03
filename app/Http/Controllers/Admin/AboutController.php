<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::first();

        return view('Admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $about = About::first();
        if ($request->file('foto')) {

            $image = $request->file('foto');
            $ext = $image->extension();
            $image_name = 'about' . time() . "." . $ext;
            $upload_path = 'about/';
            $image_url = "storage/app/" . $upload_path . $image_name;

            $image->storeAs($upload_path, $image_name);

            $about->foto = url($image_url);

        }
        $about->baslik = $request->baslik;
        $about->metin = $request->metin;
        $saved = $about->save();
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

        return redirect()->route('admin.about.edit')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
