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

        $request1 = Request::create('/api/data_parkir_masuk', 'GET');
        $response1 = Route::dispatch($request1)->getContent();
        $data = json_decode($response1, true);

        // dd($data);

        $request2 = Request::create('/api/data_slot_kosong', 'GET');
        $response2 = Route::dispatch($request2)->getContent();
        $slot = json_decode($response2, true);

        return view('parkir-masuk', compact('data','slot','jenis'));
    }

    public function parkir_keluar()
    {
        $request1 = Request::create('/api/data_parkir_keluar', 'GET');
        $response1 = Route::dispatch($request1)->getContent();
        $data = json_decode($response1, true);

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
