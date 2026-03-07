<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class BeritaController extends Controller
{
    //
    public function add(Request $request)
    {
        $mode = 'Tambah';
        return view('admin.berita.item', [
            'mode' => $mode
        ]);
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI
        $request->validate([
            'jenis' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255', 'min:3'],
            'berita' => ['required', 'string', 'min:10'],
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        //dd(Purifier::clean("<script>alert('Hacked')</script>"));

        // ✅ SIMPAN FOTO
        $namaFile = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $namaFile = time() . '_' . Str::slug($request->title) . '.' . $file->extension();

            $file->storeAs('berita', $namaFile, 'public');
        }

        // ✅ SIMPAN KE DATABASE
        $clean_html = Purifier::clean($request->berita, 'default');
        Berita::create([
            'user_id' => Auth::user()->id,
            'berita_title' => $request->judul,
            'berita_content' => $clean_html,
            'berita_foto' => $namaFile,
            'status' => 1,
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }
}
