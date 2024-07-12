<?php

namespace App\Http\Controllers;

use App\Models\macth_tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MacthTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = macth_tiket::where('jenis_macth','LIKE','%' .$request->search. '%')->paginate(4);
        }
        else{
            $data = macth_tiket::paginate(4);
        }
      
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
    public function edit(macth_tiket $macth_tiket,$id)
    {
        $data = macth_tiket::find($id);
        return view('admin.editmacth_ticket',compact('data'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, macth_tiket $macth_tiket,$id)
    {
        $data = macth_tiket::findOrFail($id);
         // Handle image1 update
         if ($request->hasFile('imageT1')) {
            // Delete old img_1 if exists
            if (!empty($data->imageT1) && File::exists(public_path($data->imageT1))) {
                File::delete(public_path($data->imageT1));
            }
        
            // Upload new imageT1
            $file = $request->file('imageT1');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/Imaget_1/';
            $file->move(public_path($path), $filename);
            $data->imageT1 = $path . $filename;
        }
         // Handle img_2 update
         if ($request->hasFile('imageT2')) {
            // Delete old image if exists
            if (!empty($data->imageT2) && File::exists(public_path($data->imageT2))) {
                File::delete(public_path($data->imageT2));
            }
        
            // Upload new image
            $file = $request->file('imageT2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/Imaget_2/';
            $file->move(public_path($path2), $filename2);
            $data->imageT2 = $path2 . $filename2;
        }
        $data->update([
            'hari' => $request->hari,
            'tanggal_macth' => $request->tanggal_macth,
            'imageT1' => $request->imageT1,
            'imageT2' => $request->imageT2,
            'location' => $request->location,
            'jam' => $request->jam,
            'jenis_macth' => $request->jenis_macth,
            'imageT1' => $data->imageT1,
            'imageT2' => $data->imageT2,
        ]);
        return redirect()->route('admin.macth_ticket')->with('success', 'Data berhasil diubah');
    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        macth_tiket::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"data berhasil di hapus"]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(macth_tiket $macth_tiket,$id)
    {
        $data = macth_tiket::find($id);
        if(File::exists($data->imageT1)){
            File::delete($data->imageT1);
        }
        if(File::exists($data->imageT2)){
            File::delete($data->imageT2);
        }
        
        $data->delete();
        return redirect()->route('admin.macth_ticket')->with('success','data berhasil di hapus');
    }
}
