<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        $datas = DB::select('select * from admin');
        $datas2 = DB::select('select * from histori_stok_obat');
        $datas3 = DB::select('select * from obat');

        return view('home')
            ->with('datas3', $datas3)
            ->with('datas2', $datas2)
            ->with('datas', $datas);
    }
}
