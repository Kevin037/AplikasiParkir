<?php

namespace App\Models;

use App\Http\Controllers\JenisKendaraanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kendaraans';

    public static function get_jenis_kendaraan(){
        $testi_all = JenisKendaraan::select('jenis_kendaraans.*')
        ->get();
        return $testi_all;
    }

    public static function get_jenis_kendaraan_id(){
        $testi_all = JenisKendaraan::where('id',JenisKendaraanController::$id)
        ->select('jenis_kendaraans.*')
        ->get();
        return $testi_all;
    }

    public static function tambah(){
        $produk = new JenisKendaraan();
        $produk->jenis = JenisKendaraanController::$request->nama;
        $produk->tarif = JenisKendaraanController::$request->tarif;
        $produk->save(); 

        return $produk;
    }

    public static function update_jenis_kendaraan(){
        $stok_baru=
        JenisKendaraan::where('id',JenisKendaraanController::$id)
        ->update([
            'jenis' => JenisKendaraanController::$request->nama,
            'tarif' => JenisKendaraanController::$request->tarif
        ]);

        return $stok_baru;
    }

    public static function hapus(){
        $hapus = JenisKendaraan::where('id',JenisKendaraanController::$id)
        ->delete();

        return $hapus;
    }
}
