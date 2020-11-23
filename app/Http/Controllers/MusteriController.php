<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use http\Encoding\Stream\Inflate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MusteriController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \App\User::find(Auth::id());

        return view('musteri.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = \App\User::find(Auth::id());
        $user->altkategori_id =$request->subcategory;
        $user->name =$request->firma_unvan;
        $user->email =$request->email;
        $user->youtube_link =$request->video_url;
        $user->yetkili =$request->firma_yetkili;
        $user->phone =$request->telefon;
        if ($request->file('foto'))
        {

            $image=$request->file('foto');
            $ext=$image->extension();
            $image_name='logo'.time().".".$ext;
            $upload_path='logolar/';
            $image_url="storage/app/".$upload_path.$image_name;

            $image->storeAs($upload_path,$image_name);

            $user->logo=url($image_url);

        }

        $user->adres =$request->adres;
        $user->hakkimizda =$request->hakkimizda;

        $saved = $user->save();

        if ($saved)
            $notification=array(
                'messege'=>'Düzenleme Başarılı',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Dikkat ! Bir Hata Oluştu',
                'alert-type'=>'error'
            );

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
