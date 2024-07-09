<?php

namespace App\Http\Controllers;

use App\Models\macth_tiket;
use Illuminate\Http\Request;

class MacthTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = macth_tiket::all(); 
        return view('admin.macth_ticket',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahmacth_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'hari' => $request->hari,
            'tanggal_macth' => $request->tanggal_macth,
            'imageT1' => $request->imageT1,
            'imageT2' => $request->imageT2,
            'location' => $request->location,
            'jam' => $request->jam,
            'jenis_macth' => $request->jenis_macth,
        ];
    
        // Handle first image upload
        if ($request->hasFile('imageT1')) {
            $file = $request->file('imageT1');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/Imaget_1/';
            $file->move($path, $filename);
            $data['imageT1'] = $path . $filename;
        }
    
        // Handle second image upload
        if ($request->hasFile('imageT2')) {
            $file = $request->file('imageT2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/Imaget_2/';
            $file->move($path2, $filename2);
            $data['imageT2'] = $path2 . $filename2;
        }
    
    
        // Create Sliderhome record
        macth_tiket::create($data);
    
        return redirect()->route('admin.macth_ticket')->with('success', 'Data berhasil ditambahkan');
        }

    /**
     * Display the specified resource.
     */
    public function show(macth_tiket $macth_tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(macth_tiket $macth_tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, macth_tiket $macth_tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(macth_tiket $macth_tiket)
    {
        //
    }
}
