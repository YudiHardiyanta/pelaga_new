<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function home(Request $request){
        $berita = Berita::where('status',1)->latest('created_at')->get();
        return view('web.index',[
            'berita' => $berita
        ]);
    }

    public function berita(Request $request, $id){
        $berita = Berita::findOrFail($id);
        return view('web.berita',[
            'berita' => $berita
        ]);
    }
}
