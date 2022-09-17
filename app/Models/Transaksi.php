<?php

namespace App\Models;

use App\Http\Controllers\TransaksiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    public static function get_parkir_masuk(){
        $testi_all = Transaksi::select('transaksis.*','slots.nama as nama_slot', 'bloks.nama as nama_blok',
        'kendaraans.no_kendaraan as no_kendaraan','jenis_kendaraans.jenis as nama_jenis_kendaraan')
        ->join('slots', 'slots.id', '=','transaksis.slot_id')
        ->join('bloks', 'bloks.id', '=','slots.blok_id')
        ->join('kendaraans', 'kendaraans.id', '=','transaksis.kendaraan_id')
        ->join('jenis_kendaraans', 'jenis_kendaraans.id', '=','kendaraans.jenis_kendaraan_id')
        ->where('transaksis.status',1)
        ->get();
        return $testi_all;
    }

    public static function get_parkir_keluar(){
        $testi_all = Transaksi::select('transaksis.*','slots.nama as nama_slot', 'bloks.nama as nama_blok',
        'kendaraans.no_kendaraan as no_kendaraan','jenis_kendaraans.jenis as nama_jenis_kendaraan', 'jenis_kendaraans.tarif as tarif')
        ->join('slots', 'slots.id', '=','transaksis.slot_id')
        ->join('bloks', 'bloks.id', '=','slots.blok_id')
        ->join('kendaraans', 'kendaraans.id', '=','transaksis.kendaraan_id')
        ->join('jenis_kendaraans', 'jenis_kendaraans.id', '=','kendaraans.jenis_kendaraan_id')
        ->where('transaksis.status',0)
        ->get();
        return $testi_all;
    }

    public static function get_slot_kosong(){
        $testi_all = Slot::where('status', 1)
        ->select('slots.*')
        ->get();
        return $testi_all;
    }

    public static function tambah(){
        $id_transaksi_baru= Transaksi::max('id');
        $id_baru = $id_transaksi_baru+1;

        $kendaraan = new Kendaraan();
        $kendaraan->merk = TransaksiController::$request->merk;
        $kendaraan->no_kendaraan = TransaksiController::$request->no_kendaraan;
        $kendaraan->jenis_kendaraan_id = TransaksiController::$request->jenis_id;
        $kendaraan->save();

        $produk = new Transaksi();
        $produk->no_parkir = "TR".$id_baru;
        $produk->slot_id = TransaksiController::$request->slot_id;
        $produk->kendaraan_id = Kendaraan::max('id');
        $produk->user_id = auth()->user()->id;
        $produk->jam_masuk = Date('H:i');
        $produk->status = 1;
        $produk->save(); 

        Slot::where('id',TransaksiController::$request->slot_id)
        ->update([
            'status' => 0
        ]);

        return $produk;
    }

    public static function parkir_keluar(){
        Transaksi::where('id',TransaksiController::$id)
        ->update([
            'jam_keluar' => Date('H:i'),
            'status' => 0
        ]);

        $transaksi = Transaksi::where('id',TransaksiController::$id)->get();
        foreach ($transaksi as $transaksis) {
            $slot_id = $transaksis->slot_id;
        }

        Slot::where('id',$slot_id)
        ->update([
            'status' => 1
        ]);
    }
}
