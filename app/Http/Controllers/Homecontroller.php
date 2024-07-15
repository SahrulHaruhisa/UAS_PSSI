<?php

namespace App\Http\Controllers;
use App\Models\berita;
use App\Models\Sliderhome;
use Illuminate\Http\Request;
use App\Models\Hasil_pertandingan;

class Homecontroller extends Controller
{
    public function index(){
        $data = Sliderhome::all();
        $datas =  Hasil_pertandingan::all();
        $berita = berita::paginate(2);
        $beritas = berita::skip(2)->take(3)->get();
        $beritahome = berita::skip(5)->take(1)->get();
        
        return view('dashboard',compact('data','datas','berita','beritas','beritahome'));
    }
    
}
