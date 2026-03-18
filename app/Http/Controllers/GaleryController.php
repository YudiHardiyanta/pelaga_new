<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleryController extends Controller
{
    //
    public function page(Request $request)
    {
        $galleries = Gallery::where('status',1)->latest()->paginate(10);
        return view('admin.galery.index',compact('galleries'));
    }
    public function store(Request $request)
    {
        $kegiatan = $request->kegiatan;
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $name = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('galery', $name, 'public');

            Gallery::create([
                'title' => $file->getClientOriginalName(),
                'image' => $name,
                'kegiatan' => $kegiatan,
            ]);

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => true], 400);
    }

    public function delete(Request $request, $id){
        $galery = Gallery::findOrFail($id);
        $galery->update([
            'status' => false
        ]);
        return redirect('admin/galery');
    }

    public function galery(Request $request, $kegiatan){
        $galleries = Gallery::where('status',1)->where('kegiatan','=',$kegiatan)->latest()->paginate(10);
        return view('web.galery',[
            'kegiatan' => ucfirst($kegiatan),
            'galleries' => $galleries
        ]);
    }

    
}
