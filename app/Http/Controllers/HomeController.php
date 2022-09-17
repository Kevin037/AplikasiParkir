<?php

namespace App\Http\Controllers;

use App\Models\Blok;
use App\Models\Slot;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_blok=count(Blok::get_blok());
        $jumlah_slot=count(Slot::get_slot());
        $jumlah_transaksi_masuk=count(Transaksi::get_parkir_masuk());
        $jumlah_transaksi_keluar=count(Transaksi::get_parkir_keluar());
        return view('home',compact('jumlah_blok', 'jumlah_slot','jumlah_transaksi_masuk','jumlah_transaksi_keluar'));
    }
}
