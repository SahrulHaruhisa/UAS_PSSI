<?php

namespace App\Http\Controllers;
use App\Models\berita;
use App\Models\Sliderhome;
use Illuminate\Http\Request;
use App\Models\Hasil_pertandingan;
use App\Models\macth_tiket;

class Homecontroller extends Controller
{
    public function index(){
        $data = Sliderhome::all();
        $datas =  Hasil_pertandingan::all();
        $berita = berita::paginate(2);
        $beritas = berita::skip(2)->take(3)->get();
        $beritahome = berita::skip(5)->take(1)->get();
        $ticket= macth_tiket::all();
        return view('dashboard',compact('data','datas','berita','beritas','beritahome','ticket'));
    }
    
}
