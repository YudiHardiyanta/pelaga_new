<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BanjarController extends Controller
{
    //
    public function add(Request $request){
        $mode = 'Tambah';
        return view('admin.banjar.item', [
            'mode' => $mode
        ]);
    }
    public function getByCreated(Request $request)
    {
        $query = Banjar::with('user:nik,name');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'min:3'],
            'nik_kelian' => ['required', 'string', 'min:16', 'max:16'],
        ]);

        Banjar::create([
            
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nik_kelian' => $request->nik_kelian,
        ]);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect('/admin/banjar')->with('success', 'Banjar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mode = 'Edit';
        $banjar = Banjar::with('user:nik,name')->findOrFail($id);
        return view('admin.banjar.item', [
            'mode' => $mode,
            'banjar' => $banjar,
        ]);
    }

    public function patch(Request $request,$id){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'min:3'],
            'nik_kelian' => ['required', 'string', 'min:16', 'max:16'],
        ]);
        $banjar = Banjar::with('user:nik,name')->findOrFail($id);
        $banjar->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nik_kelian' => $request->nik_kelian,
        ]);
        return redirect('/admin/banjar')->with('success', 'Banjar berhasil diedit');


    }
}
