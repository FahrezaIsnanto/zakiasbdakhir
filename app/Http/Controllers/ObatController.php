<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ObatController extends Controller
{
    public function index() {
        $datas = DB::select('select * from obat');

        return view('obat.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('obat.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_obat' => 'required',
            'id_tipe_obat' => 'required',
            'nama_obat' => 'required',
            'tipe_obat' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO obat(id_obat, id_tipe_obat, nama_obat, tipe_obat, tgl_kadaluarsa) VALUES (:id_obat, :id_tipe_obat, :nama_obat, :tipe_obat, :tgl_kadaluarsa)',
        [
            'id_obat' => $request->id_obat,
            'id_tipe_obat' => $request->id_tipe_obat,
            'nama_obat' => $request->nama_obat,
            'tipe_obat' => $request->tipe_obat,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa
        ]
        );

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('obat')->where('id_obat', $id)->first();

        return view('obat.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'tipe_obat' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE obat SET id_obat = :id_obat, nama_obat = :nama_obat, tipe_obat = :tipe_obat, tgl_kadaluarsa = :tgl_kadaluarsa WHERE id_obat = :id',
        [
            'id' => $id,
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'tipe_obat' => $request->tipe_obat,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        ]
        );

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM obat WHERE id_obat = :id_obat', ['id_obat' => $id]);

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil dihapus');
    }
}
