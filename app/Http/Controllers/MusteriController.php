<?php

namespace App\Http\Controllers;

use App\AltKategori;
use App\Kategori;
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
        return view('kullanim.index');

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



        $ustkategoris ="";

        $user = \App\User::find(Auth::id());
        $user->durum = 0;
        if ($user->email != $request->email)
            $validateData = $request->validate([
                'email'=> 'required|unique:users|max:255'
            ]);
        $user->altkategori_id = implode(',',$request->altkategori);

        foreach ( $request->altkategori as $value ){
            $altkategori = AltKategori::find($value)['ust_kategori_id'];
            $ustkategoris .= Kategori::find($altkategori)['id'] . ",";

        }


        $ust_kategori = implode(',', array_unique(explode(',', $ustkategoris)));
        $user->ustkategori_id = rtrim($ust_kategori,",");
//       dd($user->ustkategori_id);

        $user->name =$request->firma_unvan;
        $user->email =$request->email;
        $user->youtube_link =$request->video_url;
        $user->yetkili =$request->firma_yetkili;
        $user->phone =$request->telefon;

        $user->ihracat =$request->ihracat;
        $user->ihracat_tel =$request->ihracat_tel;
        $user->website =$request->website;
        $user->ulke =$request->ulke;
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
        if ($request->file('header'))
        {

            $image=$request->file('header');
            $ext=$image->extension();
            $image_name='header'.time().".".$ext;
            $upload_path='headerlar/';
            $image_url="storage/app/".$upload_path.$image_name;

            $image->storeAs($upload_path,$image_name);

            $user->header=url($image_url);

        }


        $user->adres =$request->adres;
        $user->hakkimizda =$request->hakkimizda;
        $user->anahtar_kelime = $request->anahtar_kelime;
        $user->fuar = $request->fuar;

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
