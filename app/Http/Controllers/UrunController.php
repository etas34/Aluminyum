<?php

namespace App\Http\Controllers;

use App\AltKategori;
use App\Kategori;
use App\Urun;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urun = Urun::where('user_id', '=', \Auth::id())->get();
        return view('urun.index', compact('urun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urun.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $urun = new Urun();
        $ustkategoris ="";

        $user = \App\User::find(\Illuminate\Support\Facades\Auth::id());
        $user->durum = 0;
        $user->save();


        if ($request->file('foto')) {

            $image = $request->file('foto');
            $ext = $image->extension();
            $image_name = 'logo' . time() . "." . $ext;
            $upload_path = 'urun/';
            $image_url = "storage/app/" . $upload_path . $image_name;

            $image->storeAs($upload_path, $image_name);

            $urun->foto = url($image_url);

        }
        $urun->user_id = \Auth::id();
        $urun->ad = $request->ad;
        $urun->aciklama = $request->aciklama;
        if ($urun->email != $request->email)
            $validateData = $request->validate([
                'email'=> 'required|unique:users|max:255'
            ]);
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
        return redirect()->route('urun.index')->with($notification);


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Urun $urun
     * @return \Illuminate\Http\Response
     */
    public function show(Urun $urun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Urun $urun
     * @return \Illuminate\Http\Response
     */
    public function edit(Urun $urun)
    {
        if (Auth::id() == $urun->user_id)
            return view('urun.edit', compact('urun'));
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Urun $urun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urun $urun)
    {

        $user = \App\User::find(\Illuminate\Support\Facades\Auth::id());
        $user->durum = 0;
        $user->save();

        $ustkategoris ="";

        if (Auth::id() == $urun->user_id) {

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
            return redirect()->route('urun.index')->with($notification);

        }
        else
            return abort(404);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Urun $urun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urun $urun)
    {
        if (Auth::id() == $urun->user_id) {
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
        return abort(404);
    }


}
