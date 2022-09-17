<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
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
    }

    public function index()
    {
        $data = JenisKendaraan::get_jenis_kendaraan();
        return view('jenis-kendaraan', compact('data'));
    }

    public function tambah(Request $request){
        self::$request = $request;
        JenisKendaraan::tambah();
        
        // toast('Berhasil menambah Slot','success');
        return back();
    }

    public function form_edit($id){
        self::$id = $id;
        $data = JenisKendaraan::get_jenis_kendaraan_id();
        return view('form-edit-jenis-kendaraan', compact('data'));
    }

    public function update(Request $request, $id){
        self::$id = $id;
        self::$request = $request;
        JenisKendaraan::update_jenis_kendaraan();
        // toast('Berhasil Update Slot','success');
        return redirect('/jenis-kendaraan');
    }

    public function hapus($id){
        self::$id = $id;
        JenisKendaraan::hapus();
        return redirect('/Slot');
    }
}
