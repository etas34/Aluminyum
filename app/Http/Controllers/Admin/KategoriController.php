<?php

namespace App\Http\Controllers\Admin;

use App\AltKategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;
use File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUst()
    {
        $kategori = Kategori::all();
        return view('Admin.kategori.indexUst',compact('kategori'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAlt()
    {
        $altkategori = AltKategori::all();
        return view('Admin.kategori.indexAlt',compact('altkategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUst()
    {

        return view('Admin.kategori.createUst');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAlt()
    {
        $path = public_path('icons');
        $files = File::files($path);
        $kategori = Kategori::all();
        return view('Admin.kategori.createAlt',compact('kategori','files'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function storeUst(Request $request)
    {
        $kategori = new Kategori();
        $kategori->ust_kategori = $request->ust_kategori;
        $saved = $kategori->save();
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
        return redirect()->route('admin.kategori.indexUst')->with($notification);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAlt(Request $request)
    {


        $kategoriAlt = new AltKategori();
        $kategoriAlt->ust_kategori_id = $request->ust_kategori_id;
        $kategoriAlt->alt_kategori = $request->alt_kategori;
        $kategoriAlt->icon = $request->icon;
        $saved = $kategoriAlt->save();
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
        return redirect()->route('admin.kategori.indexAlt')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\  Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function editUst(Kategori $kategori)
    {


        return view('Admin.kategori.editUst',compact('kategori'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AltKategori $altkategori
     * @return \Illuminate\Http\Response
     */
    public function editAlt(AltKategori $altkategori)
    {
        $path = public_path('icons');
        $files = File::files($path);
        $kategori = Kategori::all();
        return view('admin.kategori.editAlt',compact('altkategori','kategori','files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function updateUst(Request $request, Kategori $kategori)
    {

        $kategori->ust_kategori = $request->ust_kategori;
        $saved = $kategori->save();
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
        return redirect()->route('admin.kategori.indexUst')->with($notification);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function updateAlt(Request $request, AltKategori $altkategori)
    {

        $altkategori->ust_kategori_id = $request->ust_kategori_id;
        $altkategori->alt_kategori = $request->alt_kategori;
        $altkategori->icon = $request->icon;
        $saved = $altkategori->save();
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
        return redirect()->route('admin.kategori.indexAlt')->with($notification);
    }



    public function getAltkategori(Request $request)

    {

        $altkategori =AltKategori::where('ust_kategori_id',$request->ustkategori_id)->get();


        return response()->json($altkategori);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroyUst(Kategori $kategori)
    {
        $altkategori = AltKategori::where('ust_kategori_id','=',$kategori->id)
            ->get();
        if ($altkategori)
            foreach ($altkategori as $value)
                $value->delete();
        $saved = $kategori->delete();
        if ($saved)
            $notification=array(
                'messege'=>'Silme Başarılı',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Dikkat ! Bir Hata Oluştu',
                'alert-type'=>'error'
            );
        return redirect()->route('admin.kategori.indexUst')->with($notification);

    }    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroyAlt(AltKategori $altkategori)
    {
        $saved = $altkategori->delete();
        if ($saved)
            $notification=array(
                'messege'=>'Silme Başarılı',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Dikkat ! Bir Hata Oluştu',
                'alert-type'=>'error'
            );
        return redirect()->route('admin.kategori.indexAlt')->with($notification);
    }
}
