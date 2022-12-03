<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HistoriController extends Controller
{
    public function index() {
        $datas = DB::select('select * from histori_stok_obat');

        return view('histori.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('histori.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_histori_stok_obat' => 'required',
            // 'id_obat' => 'required',
            // 'id_unit_kerja' => 'required',
            'jumlah' => 'required',
            'tgl_stok' => 'required',
            'dicatat_oleh' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO histori_stok_obat(id_histori_stok_obat, jumlah, tgl_stok, dicatat_oleh) VALUES (:id_histori_stok_obat, :jumlah, :tgl_stok, :dicatat_oleh)',
        [
            'id_histori_stok_obat' => $request->id_histori_stok_obat,
            // 'id_obat' => $request->id_obat,
            // 'id_unit_kerja' => $request->id_unit_kerja,
            'jumlah' => $request->jumlah,
            'tgl_stok' => $request->tgl_stok,
            'dicatat_oleh' => $request->dicatat_oleh
        ]
        );

        return redirect()->route('histori.index')->with('success', 'Data Histori berhasil disimpan');
    }
}
