<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    //
    public function page(Request $request)
    {
        return view('admin.permohonan.index');
    }

    public function webpage(Request $request){
        $jenis_surat = JenisSurat::get();
        return view('web.permohonan',[
            'jenis_surat' => $jenis_surat
        ]);
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
        Permohonan::create([
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
