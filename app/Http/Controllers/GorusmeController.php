<?php

namespace App\Http\Controllers;

use App\Gorusme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GorusmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gorusme = Gorusme::where('user_id', \Auth::id())
            ->get();
        return view('gorusme.index', compact('gorusme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bekleme(Request $request)
    {

        $gorusme = Gorusme::find($request->gorusme_id2);
        if (\Auth::id() == $gorusme->user_id) {
            $gorusme->durum = 1;
            $gorusme->reddetme_sebep = $request->neden;
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
        } else
            return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kabul(Gorusme $gorusme)
    {
        if (\Auth::id() == $gorusme->user_id) {
            $gorusme->durum = 2;
            $saved = $gorusme->save();
            if ($saved)
                $notification = array(
                    'messege' => 'Görüşme Başarıyla Kabul Edildi.',
                    'alert-type' => 'success'
                );
            else
                $notification = array(
                    'messege' => 'Bir Şeyler Ters Gitti',
                    'alert-type' => 'error'
                );
            return redirect(route('gorusme.index'))->with($notification);
        } else
            return abort(404);


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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function revize(Request $request)
    {
//        dd($request->saat);
        $gorusme = Gorusme::find($request->gorusme_id);

        $to_name = $gorusme->ad_soyad;
        $to_email = $gorusme->email;
        $firma = \Auth::user()->name;
        $mesaj = "Merhaba, $to_name. $gorusme->tarih tarihinde olan toplantımızın saatini, $request->saat olarak revize etmek istiyorum.";
        $data = array(
            'name' => "$to_name",
            "body" => $mesaj,
            "firma" => $firma,
            'firma_mail' =>\Auth::user()->email
        );

        Mail::send('revizemail', $data, function ($message) use ($firma, $to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Toplantı Revize');
            $message->from('info@turkishaluminium365.com', $firma);
        });
        if (!Mail::failures())
            $notification=array(
                'messege'=>'Saat revizesi Yapıldı!.',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Bir Şeyler Ters Gitti \nEMAIL_SERVER_ERROR',
                'alert-type'=>'error'
            );

        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Gorusme $gorusme
     * @return \Illuminate\Http\Response
     */
    public function show(Gorusme $gorusme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Gorusme $gorusme
     * @return \Illuminate\Http\Response
     */
    public function edit(Gorusme $gorusme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Gorusme $gorusme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gorusme $gorusme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Gorusme $gorusme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gorusme $gorusme)
    {
        //
    }
}
