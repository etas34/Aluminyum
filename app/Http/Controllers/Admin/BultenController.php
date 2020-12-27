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
        $bulten=Bulten::all();
        return view('Admin.bulten.index',compact('bulten'));
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
//        dd(($request->album[0]->extension()));
        $bulten=new Bulten();

        $bulten->baslik=$request->baslik;
        $bulten->icerik=$request->icerik;
        $bulten->tarih=$request->tarih;

        if ($request->file('foto'))
        {

            $image=$request->file('foto');
            $ext=$image->extension();
            $image_name='bulten'.time().".".$ext;
            $upload_path='images/';
            $image_url="storage/app/".$upload_path.$image_name;

            $image->storeAs($upload_path,$image_name);

            $bulten->foto=url($image_url);

        }

        if($request->hasfile('album')){
            foreach ( $request->file('album') as $key=>$album){

                $ext=$album->extension();
                $image_name="$key-album".time().".".$ext;
                $upload_path='images/album/';
                $image_url="storage/app/".$upload_path.$image_name;

                $album->storeAs($upload_path,$image_name);
                $albumler[] = url($image_url);


            }
            $bulten->album = serialize($albumler);
        }




        $saved=$bulten->save();
        if ($saved)
            $notification=array(
                'messege'=>'Kayıt Başarılı',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Dikkat ! Bir Hata Oluştu',
                'alert-type'=>'error'
            );

        return redirect()->route('admin.bulten.index')->with($notification);

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
        return view('Admin.bulten.edit',compact('bulten'));
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

        $bulten->baslik=$request->baslik;
        $bulten->icerik=$request->icerik;
        $bulten->tarih=$request->tarih;

        if ($request->file('foto'))
        {

            $image=$request->file('foto');
            $ext=$image->extension();
            $image_name='bulten'.time().".".$ext;
            $upload_path='images/';
            $image_url="storage/app/".$upload_path.$image_name;

            $image->storeAs($upload_path,$image_name);

            $bulten->foto=url($image_url);

        }
        if($request->hasfile('album')){
            if ($bulten->album) {
                foreach (unserialize($bulten->album) as $album){
                    $path_parts = pathinfo($album);
                    $deleted = unlink(storage_path('app/images/album/' . $path_parts['basename']));
                }
                $bulten->album = "";
            }


            foreach ( $request->file('album') as $key=>$album){

                $ext=$album->extension();
                $image_name="$key-album".time().".".$ext;
                $upload_path='images/album/';
                $image_url="storage/app/".$upload_path.$image_name;

                $album->storeAs($upload_path,$image_name);
                $albumler[] = url($image_url);


            }
            $bulten->album = serialize($albumler);
        }

        $saved=$bulten->save();
        if ($saved)
            $notification=array(
                'messege'=>'Kayıt Başarılı',
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
     * @param  \App\Bulten  $bulten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulten $bulten)
    {
        if ($bulten->album) {
            foreach (unserialize($bulten->album) as $album){
                $path_parts = pathinfo($album);
                $deleted = unlink(storage_path('app/images/album/' . $path_parts['basename']));
            }
        }
        $saved=$bulten->delete();
        if ($saved)
            $notification=array(
                'messege'=>'Kayıt Başarı İle Silindi',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Dikkat ! Bir Hata Oluştu',
                'alert-type'=>'error'
            );

        return back()->with($notification);
    }
}
