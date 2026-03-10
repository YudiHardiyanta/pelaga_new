<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    //
    public function patchJenisSurat(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255', 'min:3'],
            'deskripsi' => ['required', 'string', 'min:10'],
        ]);

        // jika ada foto baru
        $jenisSurat = JenisSurat::with('user')->findOrFail($id);
        $jenisSurat->update([
            'nama_surat' => $request->nama,
            'kode_surat' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id
        ]);
        return redirect('admin/jenis-surat')->with('success', 'Jenis Surat berhasil diedit');
    }
    public function editJenisSurat(Request $request, $id)
    {
        $mode = 'Edit';
        $jenisSurat = JenisSurat::with('user')->findOrFail($id);
        return view('admin.surat.jenis.item', [
            'mode' => $mode,
            'jenis_surat' => $jenisSurat,
        ]);
    }
    public function storeJenisSurat(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255', 'min:3'],
            'deskripsi' => ['required', 'string', 'min:10'],
        ]);

        JenisSurat::create([
            'nama_surat' => $request->nama,
            'kode_surat' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('admin/jenis-surat')->with('success', 'Jenis surat berhasil ditambahkan');
    }
    public function addJenisSurat(Request $request)
    {
        $mode = 'Tambah';
        return view('admin.surat.jenis.item', [
            'mode' => $mode
        ]);
    }
    public function jenisSuratPage(Request $request)
    {
        return view('admin.surat.jenis.index');
    }

    public function getJenisSurat(Request $request)
    {
        $query = JenisSurat::with('user:id,name');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
