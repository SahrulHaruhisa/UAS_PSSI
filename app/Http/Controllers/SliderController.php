<?php

namespace App\Http\Controllers;


use App\Models\Sliderhome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Sliderhome::where('name','LIKE','%' .$request->search. '%')->paginate(4);
        }
        else{
            $data = Sliderhome::paginate(4);
        }
        
        return view('admin.dashboard',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahslide');
    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        Sliderhome::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"data berhasil di hapus"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Prepare data for Sliderhome creation
        $data = [
            'name' => $request->name,
            'desc1' => $request->desc1,
            'desc2' => $request->desc2,
            'desc3' => $request->desc3,
            'desc4' => $request->desc4,
        ];
    
        // Handle first image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/slider1/';
            $file->move($path, $filename);
            $data['image'] = $path . $filename;
        }
    
        // Handle second image upload
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/slider2/';
            $file->move($path2, $filename2);
            $data['image2'] = $path2 . $filename2;
        }
    
        // Handle third image upload
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
            $path3 = 'uploads/slider3/';
            $file->move($path3, $filename3);
            $data['image3'] = $path3 . $filename3;
        }
    
        // Create Sliderhome record
        Sliderhome::create($data);
    
        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Sliderhome::find($id);
        return view('admin.editdata',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Sliderhome::findOrFail($id);
    
        // Handle image1 update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (!empty($slider->image) && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }
    
            // Upload new image
            $file = $request->file('image');
            $filename = time() . '_1.' . $file->getClientOriginalExtension();
            $path = 'uploads/slider1/';
            $file->move(public_path($path), $filename);
            $slider->image = $path . $filename;
        }
    
        // Handle image2 update
        if ($request->hasFile('image2')) {
            // Delete old image if exists
            if (!empty($slider->image2) && File::exists(public_path($slider->image2))) {
                File::delete(public_path($slider->image2));
            }
    
            // Upload new image
            $file = $request->file('image2');
            $filename2 = time() . '_2.' . $file->getClientOriginalExtension();
            $path2 = 'uploads/slider2/';
            $file->move(public_path($path2), $filename2);
            $slider->image2 = $path2 . $filename2;
        }
    
        // Handle image3 update
        if ($request->hasFile('image3')) {
            // Delete old image if exists
            if (!empty($slider->image3) && File::exists(public_path($slider->image3))) {
                File::delete(public_path($slider->image3));
            }
    
            // Upload new image
            $file = $request->file('image3');
            $filename3 = time() . '_3.' . $file->getClientOriginalExtension();
            $path3 = 'uploads/slider3/';
            $file->move(public_path($path3), $filename3);
            $slider->image3 = $path3 . $filename3;
        }
    
        // Update slider data
        $slider->update([
            'name' => $request->name,
            'desc1' => $request->desc1,
            'desc2' => $request->desc2,
            'desc3' => $request->desc3,
            'desc4' => $request->desc4,
            'image' => $slider->image,
            'image2' => $slider->image2,
            'image3' => $slider->image3,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $data = Sliderhome::find($id);
        if(File::exists($data->image)){
            File::delete($data->image);
        }
        if(File::exists($data->image2)){
            File::delete($data->image2);
        }
        if(File::exists($data->image3)){
            File::delete($data->image3);
        }
        $data->delete();
        return redirect()->route('admin.dashboard')->with('success','data berhasil di hapus');
    }
}
