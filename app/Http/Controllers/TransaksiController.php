<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Slot;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $request, $id;

    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $jenis = JenisKendaraan::get_jenis_kendaraan();
        $data = Transaksi::get_parkir_masuk();
        $slot = Transaksi::get_slot_kosong();

        return view('parkir-masuk', compact('data','slot','jenis'));
    }

    public function parkir_keluar()
    {
        $data = Transaksi::get_parkir_keluar();
        // dd($data);
        return view('parkir-keluar', compact('data'));
    }

    public function tambah(Request $request){
        self::$request = $request;
        Transaksi::tambah();
        
        // toast('Berhasil menambah Slot','success');
        return back();
    }

    public function selesai_parkir(Request $request, $id){
        self::$id = $id;
        self::$request = $request;
        Transaksi::parkir_keluar();
        // toast('Berhasil Update Slot','success');
        return redirect('/parkir-keluar');
    }

}
