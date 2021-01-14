<?php

namespace App\Http\Controllers;

use App\About;
use App\Bulten;
use App\AltKategori;
use App\Faq;
use App\Gorusme;
use App\Howitworks;
use App\Kategori;
use App\Keywords;
use App\Privacy;
use App\Urun;
use App\User;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deneme()
    {
//       $firma = User::find(48);
//
//          $firma =User::where('durum',1)
//              ->join('keywords','users.id','keywords.user_id')
//               ->whereRaw('FIND_IN_SET(1,ustkategori_id)')
//               ->where(function($query){
//
//                   $query->orwhere('keywords.name', 'Alüminyum');
//               })
//              ->select('users.*')
//               ->get();
//        dd($firma);
        $user = User::whereNotNull('anahtar_kelime')
            ->get();

        foreach ($user as $item) {
            $a_kelimes = json_decode( $item->anahtar_kelime);

            foreach ($a_kelimes as $a_kelime) {
                $keyword = new Keywords;
                $keyword->user_id = $item->id;
                $keyword->name = $a_kelime->value;
                $keyword->save();
            }
        }

    }

    public function index()
    {

        $firma = User::where('durum', 199)->paginate(3);
        $ustkategori = Kategori::all();
        $ustkategori_ilk = Kategori::first();
        $altkategori = AltKategori::where('ust_kategori_id', $ustkategori_ilk->id)->get();
        return view('index', compact('firma', 'ustkategori', 'altkategori'));
    }


    public function home()
    {
        return view('home');
    }

    public function news()
    {
        $bulten = Bulten::all();
        return view('news', compact('bulten'));
    }

    public function newsdetay(Bulten $bulten)
    {

        return view('newsdetay', compact('bulten'));
    }

    public function contact()
    {
//        $user=User::whereJsonContains('anahtar_kelime',  ['value' => 'Aluminium' ]);
//        dd($user->count());
        $faq = Faq::all();
        return view('contact', compact('faq'));
    }


    public function howitworks()
    {
        $howitworks = Howitworks::first();
        return view('howitworks', compact('howitworks'));
    }

    public function privacy()
    {
        $privacy = Privacy::first();
        return view('privacy', compact('privacy'));
    }

    public function about()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function details(User $user)
    {
        $urun = Urun::where('user_id', '=', $user->id)
            ->get();
        return view('details', compact('user', 'urun'));
    }

    public function contactform(Request $request)
    {
        $to_name = 'info@turkishaluminium365.com';
        $to_email = 'info@turkishaluminium365.com';
        $data = array('name' => "$to_name",
            "body" => "$request->konu",
            "eposta" => $request->eposta,
            "tel" => $request->telefon,
            'adres' => $request->adres);

        Mail::send('mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Turkish Aluminium Site Mesajı');
            $message->from('info@turkishaluminium365.com', 'Turkish Aluminyum');
        });

        if (!Mail::failures())
            $notification = array(
                'messege' => 'Your Message Arrived',
                'alert-type' => 'success'
            );
        else
            $notification = array(
                'messege' => 'Somethings went wrong! \nEMAIL_SERVER_ERROR',
                'alert-type' => 'error'
            );
        return back()->with($notification);


    }

    public function schedule(Request $request)
    {


        $to_name = $request->adSoyad;
        $to_email = $request->email;

        $data = array('name' => "$to_name",
            "body" => $request->mesaj,
            "tarih" => $request->datetimes);

        Mail::send('scheduleMail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Schedule Meeting');
            $message->from('info@turkishaluminium365.com', 'Turkish Aluminium');
        });
        $gorusme = new Gorusme();
        $gorusme->user_id = $request->user_id;
        $gorusme->ad_soyad = $request->adSoyad;
        $gorusme->mesaj = $request->mesaj;
        $gorusme->tarih = $request->datetimes;
        $gorusme->firma_unvan = $request->firmaUnvan;
        $gorusme->tel = $request->telefon;
        $gorusme->email = $request->email_firma;
        $gorusme->website = $request->website;
        $gorusme->ulke = $request->ulke;
        $saved = $gorusme->save();


        if (!Mail::failures())
            $notification = array(
                'messege' => 'Your Meeting Requested.',
                'alert-type' => 'success'
            );
        else
            $notification = array(
                'messege' => 'Something Went Wrong \nEMAIL_SERVER_ERROR',
                'alert-type' => 'error'
            );


        return back()->with($notification);


    }

}
