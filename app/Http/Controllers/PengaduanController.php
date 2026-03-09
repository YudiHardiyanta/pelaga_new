<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengaduanController extends Controller
{
    //
    public function page(Request $request)
    {
        return view('admin.pengaduan.index');
    }

    public function getDataTable(Request $request)
    {
        $query = Pengaduan::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function tanggapi($id)
    {
        $mode = 'Tanggapi';
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.item', [
            'mode' => $mode,
            'pengaduan' => $pengaduan,
        ]);
    }

    public function patch(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => ['required', 'string', 'min:10'],
        ]);
        // jika ada foto baru
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'tindak_lanjut' => $request->tanggapan,
            'is_tindak_lanjut' => true,
        ]);
        return redirect('admin.pengaduan.index')->with('success', 'Pengaduan berhasil ditanggapi');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:13', 'min:9'],
            'alamat' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'uraian' => ['required', 'string', 'max:255'],
        ]);



        // ✅ SIMPAN KE DATABASE
        Pengaduan::create([
            'pengaduan_nama' => $request->nama,
            'pengaduan_email' => $request->email,
            'pengaduan_telepon' => $request->telepon,
            'pengaduan_alamat' => $request->alamat, // diperbaiki
            'pengaduan_subjek' => $request->subject,
            'pengaduan_uraian' => $request->uraian,

        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('pengaduan')->with('success', 'Pengaduan berhasil ditambahkan');
    }
}
