<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class WebController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }
    //
    public function home(Request $request)
    {
        $berita = Berita::where('status', 1)->latest('created_at')->paginate(9);
        $galery = Gallery::from('galleries as g1')
            ->select('g1.kegiatan')
            ->selectRaw('COUNT(*) as total')
            ->selectSub(function ($query) {
                $query->from('galleries as g2')
                    ->select('g2.image')
                    ->whereColumn('g2.kegiatan', 'g1.kegiatan')
                    ->orderByDesc('g2.created_at')
                    ->limit(1);
            }, 'last_image')
            ->groupBy('g1.kegiatan')
            ->get();
        return view('web.index', [
            'berita' => $berita,
            'galery' => $galery
        ]);
    }

    public function berita(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        return view('web.berita', [
            'berita' => $berita
        ]);
    }
}
