<?php

namespace App\Http\Controllers;

use App\Imports\PendudukImport;
use App\Models\UploadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    //
    public function pageImport(Request $request)
    {
        $mode = 'Import';
        return view('admin.penduduk.import', [
            'mode' => $mode
        ]);
    }
    public function doImport(Request $request)
    {
        $file = $request->file('excel');

        $log = UploadLog::create([
            'file_name' => $file->getClientOriginalName(),
            'user_id' => Auth::user()->id,
            'total_rows' => 0,
            'success_rows' => 0,
            'failed_rows' => 0
        ]);

        Excel::import(new PendudukImport($log->id), $file);
        
        return redirect('admin/penduduk/import')->with('success', 'Penduduk Sudah Berhasil Ditambahkan');

    }

    public function getByCreated(Request $request) {}
}
