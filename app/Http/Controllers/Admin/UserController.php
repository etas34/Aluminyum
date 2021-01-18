<?php

namespace App\Http\Controllers\Admin;

use App\AltKategori;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Keywords;
use App\Urun;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.user.index', compact('users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onaylanmamis()
    {
        $users = User::where('durum','=',0)
        ->get();
        return view('Admin.user.index', compact('users'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onayla(User $user)
    {

        $user->durum = 1;
        $saved = $user->save();

        if ($saved)
            $notification = array(
                'messege' => 'Düzenleme Başarılı',
                'alert-type' => 'success'
            );
        else
            $notification = array(
                'messege' => 'Dikkat ! Bir Hata Oluştu',
                'alert-type' => 'error'
            );

        return back()->with($notification);
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->email != $request->email)
            $validateData = $request->validate([
                'email'=> 'required|unique:users|max:255'
            ]);

        $ustkategoris ="";

        $user->altkategori_id = implode(',',$request->altkategori);

        foreach ( $request->altkategori as $value ){
            $altkategori = AltKategori::find($value)['ust_kategori_id'];
            $ustkategoris .= Kategori::find($altkategori)['id'] . ",";

        }


        $ust_kategori = implode(',', array_unique(explode(',', $ustkategoris)));
        $user->ustkategori_id = rtrim($ust_kategori,",");
//       dd($user->ustkategori_id);

        $user->name =$request->firma_unvan;
        $user->email = $request->email;
        $user->youtube_link =$request->video_url;
        $user->yetkili =$request->firma_yetkili;
        $user->phone =$request->telefon;
        $user->tax_id =$request->tax_id;


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
        if (json_decode($request->anahtar_kelime)) {
            $a_kelimes = json_decode($request->anahtar_kelime);

            Keywords::where('user_id', $user->id)->delete();

            foreach ($a_kelimes as $a_kelime) {
                $keyword = new Keywords;
                $keyword->user_id = $user->id;
                $keyword->name = $a_kelime->value;
                $keyword->save();
            }
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


    public function getFirma(Request $request)

    {

        $firma=User::query();
        $firma=$firma->where('durum',1);
        $firma=$firma->whereRaw('FIND_IN_SET('.$request->ustkategori_id.',ustkategori_id)');
        if($request->altkategori_id!='0') {
            $firma=$firma->whereRaw('FIND_IN_SET('.$request->altkategori_id.',altkategori_id)');
        }
        $firma=$firma->paginate(9);


        $altkategori =AltKategori::where('ust_kategori_id',$request->ustkategori_id)->get();



//        return view('firmalar',compact('firma'))->render();
        return response()->json([
            'view_firma' => view('firmalar', compact( 'firma'))->render(),
            'altkategoriler' =>$altkategori
        ]);

    }

    public function getUserbyId3(Request $request)

    {

        $altkategori=AltKategori::where('alt_kategori', '=', $request->text)->first();
        $urun=Urun::where('ad', '=', $request->text)->select('user_id')->distinct('user_id')->pluck('user_id');

        $firma =User::where('durum',1)
            ->join('keywords','users.id','keywords.user_id')
            ->whereRaw('FIND_IN_SET('.$request->ustkategori_id.',ustkategori_id)')
            ->where(function($query) use ($altkategori,$request,$urun){
                if (isset($altkategori->id)) {
                    $query->orwhereRaw('FIND_IN_SET('.$altkategori->id.',altkategori_id)');
                }
                if ($urun->count()>0) {
                    $query->orwhereIn('id', $urun);
                }
                $query->orwhere('keywords.name',  $request->text);
            })
            ->select('users.*')
            ->paginate(300);


        return view('firmalar',compact('firma'))->render();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

//        if ($user->foto){
//            $path_parts = pathinfo($user->foto);
//            $filename = $path_parts['filename'].".".$path_parts['extension'];
//            if(\File::exists(public_path("app\logolar\\$filename"))){
//
//                \File::delete(public_path("app\logolar\\$filename"));
//
//            }else{
//            //başarısız
//            }
//        }
        if ($user->logo){
            $path_parts = pathinfo($user->logo);
            if(storage_path('app/logolar/'.$path_parts['basename']))
                 $deleted = unlink(storage_path('app/logolar/'.$path_parts['basename']));
        }
        if ($user->header){
            $path_parts = pathinfo($user->header);
            if(storage_path('app/headerlar/'.$path_parts['basename']))
                $deleted = unlink(storage_path('app/headerlar/'.$path_parts['basename']));
        }


        $saved = $user->delete();
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

        return back()->with($notification);
    }
}
