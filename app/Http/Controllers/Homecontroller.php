<?php

namespace App\Http\Controllers;
use App\Models\berita;
use App\Models\player;
use App\Models\Sliderhome;
use App\Models\macth_tiket;
use Illuminate\Http\Request;
use App\Models\Hasil_pertandingan;

class Homecontroller extends Controller
{
    
        public function index()
        {
            $data = Sliderhome::all(); // Collection of Sliderhome models
            $datas = Hasil_pertandingan::all(); // Collection of Hasil_pertandingan models
            $berita = berita::paginate(2); // Paginated collection of berita models
            $beritas = berita::skip(2)->take(3)->get(); // Collection of berita models
            $beritahome = berita::skip(4)->take(1)->get(); // Collection with 1 berita model
            $ticket = macth_tiket::all(); // Collection of macth_tiket models
        
            return view('dashboard', compact('data', 'datas', 'berita', 'beritas', 'beritahome', 'ticket'));
        }
        
    
    public function berita(){
        
        $berita = berita::all();
      
        
        return view('semuaberita',compact('berita'));
    }
    public function pertandingan(){
        
        $tickets =   macth_tiket::paginate(1);
        $pertandingan =   Hasil_pertandingan::all();
        $ticket =   macth_tiket::skip(1)->take(10)->get();
        
        return view('semuapertandingan',compact('pertandingan','ticket','tickets'));
    }

    public function player(){
        
        $player=   player::all();
        
        return view('playerblog',compact('player'));
    }

    public function show($id){
        
        $player =   player::find($id);
        
        return view('playershow',compact('player'));
    }
}
