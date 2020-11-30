<?php

namespace App\Http\Controllers;

use App\Gorusme;
use Illuminate\Http\Request;

class GorusmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gorusme = Gorusme::where('user_id',\Auth::id())
            ->get();
        return view('gorusme.index',compact('gorusme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bekleme(Gorusme $gorusme)
    {
        if (\Auth::id() == $gorusme->user_id) {
            $gorusme->durum = 1;
            $saved = $gorusme->save();
            if ($saved)
                $notification = array(
                    'messege' => 'Görüşme Başarıyla Beklemeye Alındı.',
                    'alert-type' => 'success'
                );
            else
                $notification = array(
                    'messege' => 'Bir Şeyler Ters Gitti',
                    'alert-type' => 'error'
                );
            return redirect(route('gorusme.index'))->with($notification);
        }
        else
            return abort(404);
    }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kabul(Gorusme $gorusme)
    {
        if (\Auth::id() == $gorusme->user_id){
            $gorusme->durum = 2;
            $saved = $gorusme->save();
            if ($saved)
                $notification=array(
                    'messege'=>'Görüşme Başarıyla Kabul Edildi.',
                    'alert-type'=>'success'
                );
            else
                $notification=array(
                    'messege'=>'Bir Şeyler Ters Gitti',
                    'alert-type'=>'error'
                );
            return redirect(route('gorusme.index'))->with($notification);
        }
        else
            return abort(404);


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
     * @param  \App\Gorusme  $gorusme
     * @return \Illuminate\Http\Response
     */
    public function show(Gorusme $gorusme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gorusme  $gorusme
     * @return \Illuminate\Http\Response
     */
    public function edit(Gorusme $gorusme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gorusme  $gorusme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gorusme $gorusme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gorusme  $gorusme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gorusme $gorusme)
    {
        //
    }
}
