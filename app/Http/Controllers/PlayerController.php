<?php

namespace App\Http\Controllers;

use App\Models\player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = player::paginate(4); 
        return view('admin.player',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.tambahplayer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'desck1' => $request->desck1,
            'desck2' => $request->desck2,
            'desck3' => $request->desck3,
            'desck4' => $request->desck4,
            'foto1' => $request->foto1,
            'foto2' => $request->foto2,
            'foto3' => $request->foto3,
            'foto4' => $request->foto4,
            'fotoprofile' => $request->fotoprofile,
        ];
        // Handle first image upload
    if ($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $filename = time() . '_1.' . $file->getClientOriginalExtension();
        $path = 'uploads/foto1/';
        $file->move($path, $filename);
        $data['foto1'] = $path . $filename;
    }
     // Handle second image upload
    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
        $path2 = 'uploads/foto2/';
        $file->move($path2, $filename2);
        $data['foto2'] = $path2 . $filename2;
    }
     // Handle third image upload
    if ($request->hasFile('foto3')) {
        $file = $request->file('foto3');
        $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
        $path3 = 'uploads/foto3/';
        $file->move($path3, $filename3);
        $data['foto3'] = $path3 . $filename3;
    }
    // Handle fourth image upload
    if ($request->hasFile('foto4')) {
        $file = $request->file('foto4');
        $filename4 = time() . '_4.' . $file->getClientOriginalExtension();
        $path4 = 'uploads/foto4/';
        $file->move($path4, $filename4);
        $data['foto4'] = $path4 . $filename4;
    }
    // Handle fotoprofile image upload
    if ($request->hasFile('fotoprofile')) {
        $file = $request->file('fotoprofile');
        $filenamepp = time() . '_4.' . $file->getClientOriginalExtension();
        $pathpp = 'uploads/fotoprofile/';
        $file->move($pathpp, $filenamepp);
        $data['fotoprofile'] = $pathpp . $filenamepp;

    }
    player::create($data);

    return redirect()->route('admin.player')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(player $player)
    {
        //
    }
}
