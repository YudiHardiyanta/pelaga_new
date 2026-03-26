<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\NomorSurat;
use App\Models\Permohonan;
use App\Models\Role;
use App\Models\Surat;
use App\Models\UserRole;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    //
    public function patchJenisSurat(Request $request, $id)
    {
        $cleanContent = Purifier::clean($request->template_surat, [
            'HTML.Allowed' => 'p,br,strong,em,b,i,u,ul,ol,li,a[href|title|target],table,thead,tbody,tr,td,th,img[src|alt|title|width|height|class],h1,h2,h3,h4,h5,h6,blockquote',
            'HTML.AllowedAttributes' => 'href,title,target,src,alt,width,height,class,style',
            'CSS.AllowedProperties' => 'text-align,font-weight,font-style,text-decoration,border,border-collapse,width,height',
            'URI.AllowedSchemes' => [
                'http' => true,
                'https' => true
            ]
        ]);
        //dd($request->template_surat);
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255', 'min:3'],
            'deskripsi' => ['required', 'string', 'min:10'],
        ]);

        $jenisSurat = JenisSurat::with('user')->findOrFail($id);
        $parameter_penduduk = [];
        foreach ($request->penduduk_keys as $i => $key) {
            $parameter_penduduk[] = [$key => $request->penduduk_values[$i] ?? null];
        }
        $parameter_lain = [];
        foreach ($request->lain_keys as $i => $key) {
            $parameter_lain[] = [$key => $request->lain_values[$i] ?? null];
        }

        $jenisSurat->update([
            'nama_surat' => $request->nama,
            'kode_surat' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'template_surat' => $cleanContent,
            'kelian_ttd' => $request->kelian_ttd != "on",
            'kepala_desa_ttd' => $request->kepala_desa_ttd != "on",
            'parameter_penduduk' => json_encode($parameter_penduduk),
            'parameter_lain' => json_encode($parameter_lain),
        ]);

        //dd($request->penduduk_keys);


        $parameter_lain = [];
        foreach ($request->penduduk_values as $i => $key) {
            $parameter_penduduk[] = [$key => $request->penduduk_values[$i] ?? null];
        }
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

        $cleanContent = Purifier::clean($request->template_surat, [
            'HTML.Allowed' => 'p,br,strong,em,b,i,u,ul,ol,li,a[href|title|target],table,thead,tbody,tr,td,th,img[src|alt|title|width|height|class],h1,h2,h3,h4,h5,h6,blockquote',
            'HTML.AllowedAttributes' => 'href,title,target,src,alt,width,height,class,style',
            'CSS.AllowedProperties' => 'text-align,font-weight,font-style,text-decoration,border,border-collapse,width,height',
            'URI.AllowedSchemes' => [
                'http' => true,
                'https' => true
            ]
        ]);
        //dd($request->template_surat);
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255', 'min:3'],
            'deskripsi' => ['required', 'string', 'min:10'],
        ]);

        $jenisSurat = JenisSurat::with('user')->findOrFail($id);
        $parameter_penduduk = [];
        foreach ($request->penduduk_keys as $i => $key) {
            $parameter_penduduk[] = [$key => $request->penduduk_values[$i] ?? null];
        }
        $parameter_lain = [];
        foreach ($request->lain_keys as $i => $key) {
            $parameter_lain[] = [$key => $request->lain_values[$i] ?? null];
        }

        JenisSurat::create([
            'nama_surat' => $request->nama,
            'kode_surat' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'template_surat' => $cleanContent,
            'kelian_ttd' => $request->kelian_ttd != "on",
            'kepala_desa_ttd' => $request->kepala_desa_ttd != "on",
            'parameter_penduduk' => json_encode($parameter_penduduk),
            'parameter_lain' => json_encode($parameter_lain),
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('admin/jenis-surat')->with('success', 'Jenis surat berhasil ditambahkan');
    }
    public function addJenisSurat(Request $request)
    {
        $mode = 'Tambah';
        return view('admin.surat.jenis.item', [
            'mode' => $mode,
            'jenis_surat' => null,
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

    public function getJenisSuratById(Request $request, $id)
    {
        $query = JenisSurat::findOrFail($id);
        return response([
            'code' => 200,
            'data' => $query
        ]);
    }

    public function prosesSurat(Request $request, $id_permohonan, $id_jenis_surat)
    {

        $user = Auth::user();
        $user_role = UserRole::where('nik', '=', $user->nik)->first();
        $role = Role::findOrFail($user_role->role_id);


        $cleanContent = Purifier::clean($request->template_surat, [
            'HTML.Allowed' => 'p,br,strong,em,b,i,u,ul,ol,li,a[href|title|target],table,thead,tbody,tr,td,th,img[src|alt|title|width|height|class],h1,h2,h3,h4,h5,h6,blockquote',
            'HTML.AllowedAttributes' => 'href,title,target,src,alt,width,height,class,style',
            'CSS.AllowedProperties' => 'text-align,font-weight,font-style,text-decoration,border,border-collapse,width,height',
            'URI.AllowedSchemes' => [
                'http' => true,
                'https' => true
            ]
        ]);


        $nomor_surat = $this->generateNoSurat();
        $template = str_replace('{{nomor_surat}}', $nomor_surat, $cleanContent);

        //dd(extension_loaded('imagick'));
        config(['qr-code.driver' => 'gd']);

        $qrImage = QrCode::format('svg')
            ->size(150)
            ->generate($id_permohonan);

        $qr_lv2 = base64_encode($qrImage);


        $pdf = Pdf::loadView('admin.surat.preview', [
            'content' => $template,
            'tanggal_surat' => now(),
            'jabatan_ttd_lv2' => $role->name,
            'nama_ttd_lv2' => $user->name,
            'qr_lv2' => $qr_lv2,
            'jabatan_ttd_lv1' => null,
            'nama_ttd_lv1' => null,
            'qr_lv1' => null
        ])->setPaper('A4', 'portrait');

        $filename = 'surat_' . $id_permohonan . '.pdf';
        Storage::disk('public')->put('surat/' . $filename, $pdf->output());

        Surat::create([
            'permohonan_id' => $id_permohonan,
            'jenis_surat_id' => $id_jenis_surat,
            'file' => $filename,
            'nik_ttd_lv1' => null,
            'nik_ttd_lv2' => $user->nik,
            'nama_ttd_lv1' => null,
            'nama_ttd_lv2' => $user->name,
            'jabatan_ttd_lv1' => null,
            'jabatan_ttd_lv2' => $role->name,
            'tanggal_ttd' => now(),
            'nomor_surat' => $nomor_surat
        ]);

        $permohonan = Permohonan::findorFail($id_permohonan);
        $permohonan->update([
            'link_dokumen' => $filename,
            'status' => 'selesai'
        ]);

        return redirect('/admin/surat')->with('success', 'Surat Berhasil di Tanda Tangani');
    }

    function generateNoSurat()
    {
        return DB::transaction(function () {

            $tahun = now()->year;

            // ambil atau buat record counter
            $counter = NomorSurat::where('tahun', $tahun)
                ->lockForUpdate()
                ->first();

            if (!$counter) {
                $counter = NomorSurat::create([
                    'tahun' => $tahun,
                    'last_nomor' => 0
                ]);
            }

            // increment nomor
            $counter->increment('last_nomor');

            $noUrut = $counter->last_nomor;

            return $tahun . '/' . $noUrut;
        });
    }

    function page(Request $request)
    {
        return view('admin.surat.index');
    }

    function getDataTable(Request $request)
    {
        $query = Surat::with('jenis_surats:id,nama_surat');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
