<?php

namespace App\Http\Controllers;

use App\Models\player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = player::where('nama_depan','LIKE','%' .$request->search. '%')->paginate(2);
        }
        else{
            $data = player::paginate(2);
        }
    
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
            'no_punggung' => $request->no_punggung,
            'Desck1' => $request->Desck1,
            'Desck2' => $request->Desck2,
            'Desck3' => $request->Desck3,
            'Desck4' => $request->Desck4,
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
    public function edit(player $player,$id)
    {
        $data =player::find($id);
        return view('admin.editplayer',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, player $player,$id)
    {
        $data = player::findOrFail($id);

$data->update([
    'nama_depan' => $request->nama_depan,
    'nama_belakang' => $request->nama_belakang,
    'tanggal_lahir' => $request->tanggal_lahir,
    'no_punggung' => $request->no_punggung,
    'Desck1' => $request->Desck1,
    'Desck2' => $request->Desck2,
    'Desck3' => $request->Desck3,
    'Desck4' => $request->Desck4,
    'foto1' => $request->foto1,
    'foto2' => $request->foto2,
    'foto3' => $request->foto3,
    'foto4' => $request->foto4,
    'fotoprofile' => $request->fotoprofile,
]); 

// Handle image1 update
if ($request->hasFile('foto1')) {
    // Delete old img_1 if exists
    if (!empty($data->foto1) && File::exists(public_path($data->foto1))) {
        File::delete(public_path($data->foto1));
    }

    // Upload new foto1
    $file = $request->file('foto1');
    $filename = time() . '_1.' . $file->getClientOriginalExtension();
    $path = 'uploads/foto1/';
    $file->move(public_path($path), $filename);
    $data->foto1 = $path . $filename;
}

// Handle image2 update
if ($request->hasFile('foto2')) {
    // Delete old img_2 if exists
    if (!empty($data->foto2) && File::exists(public_path($data->foto2))) {
        File::delete(public_path($data->foto2));
    }

    // Upload new foto2
    $file = $request->file('foto2');
    $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
    $path2 = 'uploads/foto2/';
    $file->move(public_path($path2), $filename2);
    $data->foto2 = $path2 . $filename2;
}

// Handle image3 update
if ($request->hasFile('foto3')) {
    // Delete old img_3 if exists
    if (!empty($data->foto3) && File::exists(public_path($data->foto3))) {
        File::delete(public_path($data->foto3));
    }

    // Upload new foto3
    $file = $request->file('foto3');
    $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
    $path3 = 'uploads/foto3/';
    $file->move(public_path($path3), $filename3);
    $data->foto3 = $path3 . $filename3;
}

// Handle image4 update
if ($request->hasFile('foto4')) {
    // Delete old img_4 if exists
    if (!empty($data->foto4) && File::exists(public_path($data->foto4))) {
        File::delete(public_path($data->foto4));
    }

    // Upload new foto4
    $file = $request->file('foto4');
    $filename4 = time() . '_4.' . $file->getClientOriginalExtension();
    $path4 = 'uploads/foto4/';
    $file->move(public_path($path4), $filename4);
    $data->foto4 = $path4 . $filename4;
}

// Handle fotoprofile update
if ($request->hasFile('fotoprofile')) {
    // Delete old fotoprofile if exists
    if (!empty($data->fotoprofile) && File::exists(public_path($data->fotoprofile))) {
        File::delete(public_path($data->fotoprofile));
    }

    // Upload new fotoprofile
    $file = $request->file('fotoprofile');
    $filenamepp = time() . '_pp.' . $file->getClientOriginalExtension();
    $pathpp = 'uploads/fotoprofile/';
    $file->move(public_path($pathpp), $filenamepp);
    $data->fotoprofile = $pathpp . $filenamepp;
}

    $data->save();

    return redirect()->route('admin.player')->with('success', 'Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(player $player ,$id)
    {
        $data = player::find($id);
        if(File::exists($data->foto1)){
            File::delete($data->foto1);
        }
        if(File::exists($data->foto2)){
            File::delete($data->foto2);
        }
        if(File::exists($data->foto3)){
            File::delete($data->foto3);
        }
        if(File::exists($data->foto4)){
            File::delete($data->foto4);
        }
        if(File::exists($data->fotoprofile)){
            File::delete($data->fotoprofile);
        }
        
        $data->delete();
        return redirect()->route('admin.macth_ticket')->with('success','data berhasil di hapus');
    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        player::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"data berhasil di hapus"]);
    }
}
