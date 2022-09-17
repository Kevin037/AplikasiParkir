<?php

namespace App\Models;

use App\Http\Controllers\SlotController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $table = 'slots';

    public static function get_slot(){
        $testi_all = Slot::select('slots.*','bloks.nama as nama_blok')
        ->join('bloks', 'bloks.id', '=','slots.blok_id')
        ->get();
        return $testi_all;
    }

    public static function get_slot_id(){
        $testi_all = Slot::where('id',SlotController::$id)
        ->select('slots.*')
        ->get();
        return $testi_all;
    }

    public static function tambah(){
        $produk = new Slot;
        $produk->nama = SlotController::$request->nama_slot;
        $produk->blok_id = SlotController::$request->blok_id;
        $produk->status = 1;
        $produk->save(); 

        return $produk;
    }

    public static function update_slot(){
        $stok_baru=
        Slot::where('id',SlotController::$id)
        ->update([
            'nama' => SlotController::$request->nama_slot,
            'blok_id' => SlotController::$request->blok_id
        ]);

        return $stok_baru;
    }

    public static function get_slot_per_blok(){
        $id = SlotController::$id;
        $testi_all = Slot::where('blok_id',$id)
        ->get();
        return $testi_all;
    }

    public static function slot_ready(){
        $slot = count(Slot::where('id',SlotController::$id)->where('status',1)->get());
        return $slot;
    }

    public static function slot_transaksi_keluar(){
        $slot = count(Transaksi::where('slot_id',SlotController::$id)->where('status',0)->get());
        return $slot;
    }

    public function blok()
    {
        return $this->belongsTo(Blok::class);
    }

}
