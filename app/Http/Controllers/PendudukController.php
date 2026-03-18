<?php

namespace App\Http\Controllers;

use App\Imports\PendudukImport;
use App\Models\Banjar;
use App\Models\Penduduk;
use App\Models\Role;
use App\Models\UploadLog;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PendudukController extends Controller
{
    //
    public function pageImport(Request $request)
    {
        $mode = 'Import';
        //Cek Role
        $user_role = UserRole::where('nik', '=', Auth::user()->nik)->first();
        $penduduk = Penduduk::where('nik', '=', Auth::user()->nik)->first();
        $role = Role::where('id', '=', $user_role->role_id)->first();
        if ($role->penduduk_all) {
            $banjar = Banjar::get();
        } else {
            if ($penduduk) {
                $banjar = Banjar::where('id', '=', $penduduk->banjar_id)->get();
            } else {
                $banjar = Banjar::get();
            }
        }
        return view('admin.penduduk.import', [
            'mode' => $mode,
            'banjar' => $banjar
        ]);
    }
    public function doImport(Request $request)
    {
        $request->validate([
            'excel' => ['required'],
            'banjar' => ['required'],
        ]);

        $file = $request->file('excel');

        $log = UploadLog::create([
            'file_name' => $file->getClientOriginalName(),
            'user_id' => Auth::user()->id,
            'total_rows' => 0,
            'success_rows' => 0,
            'failed_rows' => 0
        ]);

        Excel::import(new PendudukImport($log->id, $request->banjar), $file);
        $log_after_import = UploadLog::findOrFail($log->id);
        return redirect('admin/penduduk')->with('success', 'Sebanyak ' . $log_after_import->total_rows . ' penduduk Sudah Berhasil Ditambahkan, Sukses : ' . $log_after_import->success_rows . ' gagal : ' . $log_after_import->failed_rows);
    }

    public function getByCreated(Request $request)
    {
        $query = Penduduk::join('banjars', 'banjars.id', '=', 'penduduks.banjar_id')
            ->join('users', 'penduduks.nik', '=', 'users.nik')
            ->select(
                'users.name',
                'users.nik',
                'users.kk',
                'penduduks.alamat',
                'penduduks.tempat_lahir',
                'penduduks.tanggal_lahir',
                'penduduks.agama',
                'penduduks.pendidikan',
                'penduduks.pekerjaan',
                'penduduks.gol_darah',
                'penduduks.status_perkawinan',
                'penduduks.tanggal_perkawinan',
                'penduduks.status_dalam_hubungan_keluarga',
                'penduduks.kewarganegaraan',
                'banjars.nama as banjar'
            );
        
        $user_role = UserRole::where('nik', '=', Auth::user()->nik)->first();
        $penduduk = Penduduk::where('nik', '=', Auth::user()->nik)->first();
        $role = Role::where('id', '=', $user_role->role_id)->first();
        if (!$role->penduduk_all) {
            if ($penduduk) {
                $query = $query->where('penduduks.banjar_id','=',$penduduk->banjar_id);
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
