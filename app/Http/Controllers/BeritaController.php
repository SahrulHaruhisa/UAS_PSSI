<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = berita::where('title','LIKE','%' .$request->search. '%')->paginate(4);
        }
        else{
            $data = berita::paginate(4);
        }
        return view('admin.berita',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahberita');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = [
            'title' => $request->title,
            'type_umur' => $request->type_umur,
            'par1' => $request->par1,
            'par2' => $request->par2,
            'par3' => $request->par3,
            'par4' => $request->par4,
            'par5' => $request->par5,
            'foto_1' => $request->foto_1,
            'foto_2' => $request->foto_2,
            'foto_3' => $request->foto_3,
            'img_bg' => $request->img_bg,
        ];

        if ($request->hasFile('foto_1')) {
            $file = $request->file('foto_1');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/foto_1/';
            $file->move($path, $filename);
            $data['foto_1'] = $path . $filename;
        }
         // Handle second image upload
        if ($request->hasFile('foto_2')) {
            $file = $request->file('foto_2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/foto_2/';
            $file->move($path2, $filename2);
            $data['foto_2'] = $path2 . $filename2;
        }
         // Handle third image upload
        if ($request->hasFile('foto_3')) {
            $file = $request->file('foto_3');
            $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
            $path3 = 'uploads/foto_3/';
            $file->move($path3, $filename3);
            $data['foto_3'] = $path3 . $filename3;
        }
        // Handle fourth image upload
        if ($request->hasFile('img_bg')) {
            $file = $request->file('img_bg');
            $filename4 = time() . '_4.' . $file->getClientOriginalExtension();
            $path4 = 'uploads/img_bg/';
            $file->move($path4, $filename4);
            $data['img_bg'] = $path4 . $filename4;
        }
        berita::create($data);

    return redirect()->route('admin.berita')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(berita $berita,$id)
    {
        $data = berita::find($id);
        return view('admin.editberita',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, berita $berita,$id)
    {
        $data = berita::find($id);
        $data ->update([
            'title' => $request->title,
            'type_umur' => $request->type_umur,
            'par1' => $request->par1,
            'par2' => $request->par2,
            'par3' => $request->par3,
            'par4' => $request->par4,
            'par5' => $request->par5,
            'foto_1' => $request->foto_1,
            'foto_2' => $request->foto_2,
            'foto_3' => $request->foto_3,
            'img_bg' => $request->img_bg,
        ]);
        if ($request->hasFile('foto_1')) {
            // Delete old img_1 if exists
            if (!empty($data->foto_1) && File::exists(public_path($data->foto_1))) {
                File::delete(public_path($data->foto_1));
            }
        
            // Upload new foto_1
            $file = $request->file('foto_1');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/foto_1/';
            $file->move(public_path($path), $filename);
            $data->foto_1 = $path . $filename;
        }
        // Handle image2 update
if ($request->hasFile('foto_2')) {
    // Delete old img_2 if exists
    if (!empty($data->foto2) && File::exists(public_path($data->foto2))) {
        File::delete(public_path($data->foto2));
    }

    // Upload new foto2
    $file = $request->file('foto_2');
    $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
    $path2 = 'uploads/foto_2/';
    $file->move(public_path($path2), $filename2);
    $data->foto_2 = $path2 . $filename2;
}

// Handle image3 update
if ($request->hasFile('foto_3')) {
    // Delete old img_3 if exists
    if (!empty($data->foto3) && File::exists(public_path($data->foto3))) {
        File::delete(public_path($data->foto3));
    }

    // Upload new foto3
    $file = $request->file('foto_3');
    $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
    $path3 = 'uploads/foto_3/';
    $file->move(public_path($path3), $filename3);
    $data->foto_3 = $path3 . $filename3;
}

// Handle image4 update
if ($request->hasFile('foto_4')) {
    // Delete old img_4 if exists
    if (!empty($data->foto4) && File::exists(public_path($data->foto4))) {
        File::delete(public_path($data->foto4));
    }

    // Upload new foto4
    $file = $request->file('foto_4');
    $filename4 = time() . '_4.' . $file->getClientOriginalExtension();
    $path4 = 'uploads/foto_4/';
    $file->move(public_path($path4), $filename4);
    $data->foto_4 = $path4 . $filename4;
}

// Handle fotoprofile update
if ($request->hasFile('img_bg')) {
    // Delete old fotoprofile if exists
    if (!empty($data->fotoprofile) && File::exists(public_path($data->fotoprofile))) {
        File::delete(public_path($data->fotoprofile));
    }

    // Upload new fotoprofile
    $file = $request->file('img_bg');
    $filenamepp = time() . '_pp.' . $file->getClientOriginalExtension();
    $pathpp = 'uploads/img_bg/';
    $file->move(public_path($pathpp), $filenamepp);
    $data->img_bg = $pathpp . $filenamepp;
}

    $data->save();
    return redirect()->route('admin.berita')->with('success','data berhasil di hapus');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(berita $berita,$id)
    {
        $data = berita::find($id);
        if(File::exists($data->foto_1)){
            File::delete($data->foto_1);
        }
        if(File::exists($data->foto_2)){
            File::delete($data->foto_2);
        }
        if(File::exists($data->foto_3)){
            File::delete($data->foto_3);
        }
        if(File::exists($data->img_bg)){
            File::delete($data->img_bg);
        }
        $data->delete();
        return redirect()->route('admin.berita')->with('success','data berhasil di hapus');
    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        berita::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"data berhasil di hapus"]);
    }
}
