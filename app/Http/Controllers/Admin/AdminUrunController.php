<?php

namespace App\Http\Controllers\Admin;

use App\AdminUrun;
use App\AltKategori;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Urun;
use Illuminate\Http\Request;

class AdminUrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urun = Urun::all();
        return view('Admin.adminurun.index',compact('urun'));
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
     * @param  \App\AdminUrun  $adminUrun
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUrun $adminUrun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminUrun  $adminUrun
     * @return \Illuminate\Http\Response
     */
    public function edit(Urun $urun)
    {
//        dd('');
        return view('Admin.adminurun.edit',compact('urun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminUrun  $adminUrun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urun $urun)
    {
        $ustkategoris = "";
        if ($request->file('foto')) {

            $image = $request->file('foto');
            $ext = $image->extension();
            $image_name = 'logo' . time() . "." . $ext;
            $upload_path = 'urun/';
            $image_url = "storage/app/" . $upload_path . $image_name;

            $image->storeAs($upload_path, $image_name);

            $urun->foto = url($image_url);

        }
        $urun->ad = $request->ad;
        $urun->aciklama = $request->aciklama;
        $urun->kategori_id = $request->category;
        $urun->alt_kategori_id = $request->subcategory;
        $urun->aciklama = $request->aciklama;
        $urun->alt_kategori_id = implode(',',$request->altkategori);

        foreach ( $request->altkategori as $value ){
            $altkategori = AltKategori::find($value)['ust_kategori_id'];
            $ustkategoris .= Kategori::find($altkategori)['id'] . ",";

        }


        $ust_kategori = implode(',', array_unique(explode(',', $ustkategoris)));
        $urun->kategori_id = rtrim($ust_kategori,",");
        $saved = $urun->save();

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
        return redirect()->route('Admin.adminurun.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminUrun  $adminUrun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urun $urun)
    {
        if ($urun->foto) {
            $path_parts = pathinfo($urun->foto);
            $deleted = unlink(storage_path('app/urun/' . $path_parts['basename']));
        }


        $saved = $urun->delete();
        if ($saved)
            $notification = array(
                'messege' => 'Silme Başarılı',
                'alert-type' => 'success'
            );
        else
            $notification = array(
                'messege' => 'Dikkat ! Bir Hata Oluştu',
                'alert-type' => 'error'
            );
        return back()->with($notification);
    }
}
