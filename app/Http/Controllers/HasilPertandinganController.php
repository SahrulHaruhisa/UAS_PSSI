<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil_pertandingan;
use Illuminate\Support\Facades\File;

class HasilPertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hasil_pertandingan::all(); 
        return view('admin.hasil_macth',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahhasil_macth');
    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        Hasil_pertandingan::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"data berhasil di hapus"]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
        'type_pertandingan' => $request->type_pertandingan,
        'skor' => $request->skor,
        'nm_team1' => $request->nm_team1,
        'nm_team2' => $request->nm_team2,
        'stadium' => $request->stadium,
        'pencetakgol1' => $request->pencetakgol1,
        'pencetakgol2' => $request->pencetakgol2,
        'pencetakgol3' => $request->pencetakgol3,
        'pencetakgol4' => $request->pencetakgol4,
        'pencetakgol5' => $request->pencetakgol5,
    ];

    // Handle first image upload
    if ($request->hasFile('img_1')) {
        $file = $request->file('img_1');
        $filename = time() . '_1.' . $file->getClientOriginalExtension();
        $path = 'uploads/nm_1/';
        $file->move($path, $filename);
        $data['img_1'] = $path . $filename;
    }

    // Handle second image upload
    if ($request->hasFile('img_2')) {
        $file = $request->file('img_2');
        $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
        $path2 = 'uploads/nm_2/';
        $file->move($path2, $filename2);
        $data['img_2'] = $path2 . $filename2;
    }


    // Create Sliderhome record
    Hasil_pertandingan::create($data);

    return redirect()->route('admin.hasil_macth')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hasil_pertandingan $hasil_pertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hasil_pertandingan $hasil_pertandingan,$id)
    {
        $data = Hasil_pertandingan::find($id);
        return view('admin.edithasilmacth',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Hasil_pertandingan::findOrFail($id);

        // Handle image1 update
        if ($request->hasFile('img_1')) {
            // Delete old img_1 if exists
            if (!empty($data->img_1) && File::exists(public_path($data->img_1))) {
                File::delete(public_path($data->img_1));
            }
        
            // Upload new img_1
            $file = $request->file('img_1');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/nm_1/';
            $file->move(public_path($path), $filename);
            $data->img_1 = $path . $filename;
        }
        
        // Handle img_2 update
        if ($request->hasFile('img_2')) {
            // Delete old image if exists
            if (!empty($data->img_2) && File::exists(public_path($data->img_2))) {
                File::delete(public_path($data->img_2));
            }
        
            // Upload new image
            $file = $request->file('img_2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/nm_2/';
            $file->move(public_path($path2), $filename2);
            $data->img_2 = $path2 . $filename2;
        }
        
        // Update slider data
        $data->update([
            'type_pertandingan' => $request->type_pertandingan,
            'skor' => $request->skor,
            'nm_team1' => $request->nm_team1,
            'nm_team2' => $request->nm_team2,
            'stadium' => $request->stadium,
            'pencetakgol1' => $request->pencetakgol1,
            'pencetakgol2' => $request->pencetakgol2,
            'pencetakgol3' => $request->pencetakgol3,
            'pencetakgol4' => $request->pencetakgol4,
            'pencetakgol5' => $request->pencetakgol5,
            'img_1' => $data->img_1,
            'img_2' => $data->img_2,
        ]);
        
        return redirect()->route('admin.hasil_macth')->with('success', 'Data berhasil diubah');
        
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hasil_pertandingan $hasil_pertandingan,$id)
    {
        $data = Hasil_pertandingan::find($id);
        if(File::exists($data->img_1)){
            File::delete($data->img_1);
        }
        if(File::exists($data->img_2)){
            File::delete($data->img_2);
        }
        
        $data->delete();
        return redirect()->route('admin.hasil_macth')->with('success','data berhasil di hapus');
    }
}
