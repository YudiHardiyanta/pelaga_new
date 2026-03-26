<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanController extends Controller
{
    //
    public function page(Request $request)
    {
        return view('admin.permohonan.index');
    }

    public function webpage(Request $request)
    {
        $jenis_surat = JenisSurat::get();
        $anggota_keluarga = null;

        if (Auth::check()) {
            $anggota_keluarga = User::where('kk', '=', Auth::user()->kk)->select('nik', 'name')->get();
        }
        return view('web.permohonan', [
            'jenis_surat' => $jenis_surat,
            'anggota_keluarga' => $anggota_keluarga
        ]);
    }
    public function store(Request $request)
    {

        //cari variable input untuk kebutuhan surat
        $input = collect($request->all())
            ->filter(fn($value, $key) => str_starts_with($key, 'input_'))
            ->mapWithKeys(function ($value, $key) {
                return [
                    substr($key, 6) => $value // hapus "input_"
                ];
            })
            ->toArray();

        $request->validate([
            'nama_pemohon' => ['required', 'string', 'max:255'],
            'nik_pemohon' => ['required', 'string', 'max:16'],
            'telepon_pemohon' => ['required', 'string', 'max:13', 'min:9'],
            'alamat_pemohon' => ['required', 'string', 'max:255'],
            'jenis_surat' => ['required'],
            'uraian_pemohon' => ['required', 'string', 'max:255'],
        ]);



        // ✅ SIMPAN KE DATABASE
        Permohonan::create([
            'nama_pemohon' => $request->nama_pemohon,
            'nik_pemohon' => $request->nik_pemohon,
            'telepon_pemohon' => $request->telepon_pemohon,
            'alamat_pemohon' => $request->alamat_pemohon,
            'surat_id' => $request->jenis_surat,
            'uraian_pemohon' => $request->uraian_pemohon,
            'data_pemohon' => $input,

        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('/permohonan')->with('success', 'Permohonan berhasil ditambahkan');
    }

    public function getDataTable(Request $request)
    {
        $query = Permohonan::with('jenis_surats:id,nama_surat');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function proses(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id)
            ->with('jenis_surats:id,nama_surat,kode_surat,template_surat')->first();
        $template = $permohonan->jenis_surats->template_surat;
        
        foreach ($permohonan->data_pemohon as $key => $value) {
            $template = str_replace('{{' . $key . '}}', $value, $template);
        }
        
        return view('admin.permohonan.proses', [
            'user_detail' => null,
            'keluarga' => [],
            'permohonan' => $permohonan,
            'surat' => $template
        ]);
    }
}
