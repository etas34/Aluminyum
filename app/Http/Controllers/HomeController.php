<?php

namespace App\Http\Controllers;

use App\Bulten;
use App\AltKategori;
use App\Kategori;
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
    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $firma=User::where('durum',1)->get();
        $ustkategori=Kategori::all();
        $ustkategori_ilk=Kategori::first();
        $altkategori=AltKategori::where('ust_kategori_id',$ustkategori_ilk->id)->get();
        return view('index',compact('firma','ustkategori','altkategori'));
    }


    public function home()
    {
        return view('home');
    }
    public function news()
    {
        $bulten = Bulten::all();
        return view('news',compact('bulten'));
    }
    public function newsdetay(Bulten $bulten)
    {

        return view('newsdetay',compact('bulten'));
    }

    public function contact()
    {

        return view('contact');
    }
    public function details(User $user)
    {
        $urun = Urun::where('user_id','=',$user->id)
            ->get();
        return view('details',compact('user','urun'));
    }

    public function contactform(Request $request)
    {
        $to_name = $request->ad;
        $to_email = 'afyonyazilimevi@gmail.com';
        $data = array('name'=>"$to_name",
            "body" => "$request->konu",
            "eposta"=>$request->eposta,
            "tel"=>$request->telefon,
            'adres'=>$request->adres);

         Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('IND Endustriyel Dayanıklı Tuketim Urunleri San. ve Tic. A.S. DESTEK');
            $message->from('afyonyazilimevi@gmail.com','IND Endustriyel Dayanıklı Tuketim Ürünleri San. ve Tic. A.S.');
        });

        if (!Mail::failures())
            $notification=array(
                'messege'=>'Mesajın Bize Ulaştı!\nSize En Kısa Zamanda Dönüş Yapacağız.',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Bir Şeyler Ters Gitti \nEMAIL_SERVER_ERROR',
                'alert-type'=>'error'
            );
        return back()->with($notification);


    }
 public function schedule(Request $request)
    {


        $to_name = $request->adSoyad;
        $to_email = $request->email;

        $data = array('name'=>"$to_name",
            "body" => $request->mesaj,
            "tarih"=>$request->datetimes);

         Mail::send('scheduleMail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Schedule Meeting');
            $message->from('afyonyazilimevi@gmail.com','Schedule Meeting');
        });

        if (!Mail::failures())
            $notification=array(
                'messege'=>'Mesajın Bize Ulaştı!\nSize En Kısa Zamanda Dönüş Yapacağız.',
                'alert-type'=>'success'
            );
        else
            $notification=array(
                'messege'=>'Bir Şeyler Ters Gitti \nEMAIL_SERVER_ERROR',
                'alert-type'=>'error'
            );
        return back()->with($notification);


    }

}
