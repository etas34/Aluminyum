<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
dd($request->website);
        $user->altkategori_id =$request->subcategory;
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


    public function getUserbyId(Request $request)

    {

        $user =User::where('durum',1)
        ->where('altkategori_id',$request->altkategori_id)->get();


        return response()->json($user);

    }

    public function getUserbyId2(Request $request)

    {

        $user =User::where('durum',1)
        ->join('alt_kategoris','users.altkategori_id','=','alt_kategoris.id')
            ->select('users.*')
            ->where('ust_kategori_id',$request->ustkategori_id)->get();


        return response()->json($user);

    }
    public function getUserbyId3(Request $request)

    {

        $user =User::where('durum',1)
            ->join('alt_kategoris','users.altkategori_id','=','alt_kategoris.id')
            ->select('users.*')
            ->where('ust_kategori_id',$request->ustkategori_id)
            ->where('alt_kategori', 'like', '%' . $request->text . '%')->get();


        return response()->json($user);

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
            $deleted = unlink(storage_path('app/logolar/'.$path_parts['basename']));
        }
        if ($user->header){
            $path_parts = pathinfo($user->header);
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
