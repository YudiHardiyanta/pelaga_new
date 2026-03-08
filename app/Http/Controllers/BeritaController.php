<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    //
    public function page(Request $request)
    {
        return view('admin.berita.index');
    }

    public function add(Request $request)
    {
        $mode = 'Tambah';
        return view('admin.berita.item', [
            'mode' => $mode
        ]);
    }

    public function getByCreated(Request $request)
    {
        $query = Berita::with('user:id,name');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit($id)
    {
        $mode = 'Edit';
        $berita = Berita::with('user')->findOrFail($id);
        return view('admin.berita.item', [
            'mode' => $mode,
            'berita' => $berita,
        ]);
    }

    public function patch(Request $request, $id)
    {
        $request->validate([
            'jenis' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255', 'min:3'],
            'berita' => ['required', 'string', 'min:10'],
        ]);
        // jika ada foto baru
        $berita = Berita::with('user')->findOrFail($id);
        $namaFile = $berita->berita_foto;
        $status=true;
        if ($request->file('foto')) {
            $file = $request->file('foto');

            $namaFile = time() . '_' . Str::slug($request->title) . '.' . $file->extension();

            $file->storeAs('berita', $namaFile, 'public');
        }
        
        if($request->status!="on"){
            $status=false;
        }

        $clean_html = Purifier::clean($request->berita, 'default');
        $berita->update([
            'user_id' => Auth::user()->id,
            'berita_title' => $request->judul,
            'berita_jenis' => $request->jenis,
            'berita_content' => $clean_html,
            'berita_foto' => $namaFile,
            'status' => $status,
        ]);
        return redirect('admin.berita.index')->with('success', 'Berita berhasil diedit');
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
            'berita_jenis' => $request->jenis,
            'berita_content' => $clean_html,
            'berita_foto' => $namaFile,
            'status' => 1,
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

}
