<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //
    public function add(Request $request)
    {
        $mode = 'Tambah';
        return view('admin.role.item', [
            'mode' => $mode
        ]);
    }

    
    public function store(Request $request)
    {
        // ✅ VALIDASI
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);
        Role::create([
            'name' => $request->nama,
            'admin' => $request->admin=="on",
            'berita' => $request->berita=="on",
            'galery' => $request->galery=="on",
            'ettd' => $request->ettd=="on",
            'jenis_surat' => $request->jenis_surat=="on",
            'users' => $request->users=="on",
            'banjar' => $request->banjar=="on",
            'role' => $request->role=="on",
            'penduduk' => $request->penduduk=="on",
            'penduduk_all' => $request->penduduk_all=="on"
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('/admin/role')->with('success', 'Role berhasil ditambahkan');
    }

    public function getByCreated(Request $request){
        $query = Role::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit(Request $request, $id){
        $mode = 'Edit';
        $role = Role::findOrFail($id);
        return view('admin.role.item', [
            'mode' => $mode,
            'role' => $role,
        ]);
    }

    public function patch(Request $request, $id)
    {
        // ✅ VALIDASI
        $request->validate([
            'nama' => ['required', 'string', 'max:255']
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->nama,
            'admin' => $request->admin=="on",
            'berita' => $request->berita=="on",
            'galery' => $request->galery=="on",
            'ettd' => $request->ettd=="on",
            'jenis_surat' => $request->jenis_surat=="on",
            'users' => $request->users=="on",
            'banjar' => $request->banjar=="on",
            'role' => $request->role=="on",
            'penduduk' => $request->penduduk=="on",
            'penduduk_all' => $request->penduduk_all=="on"

        ]);

        return redirect('/admin/role')->with('success', 'Role berhasil diedit');
    }
}
