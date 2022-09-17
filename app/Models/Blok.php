<?php

namespace App\Models;

use App\Http\Controllers\BlokController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blok extends Model
{
    use HasFactory;

    protected $table = 'bloks';

    public static function get_blok(){
        $testi_all = Blok::select('bloks.*')
        ->get();
        return $testi_all;
    }

    public static function get_blok_id(){
        $testi_all = Blok::where('id',BlokController::$id)
        ->select('bloks.*')
        ->get();
        return $testi_all;
    }

    public static function tambah(){
        $produk = new Blok;
        $produk->nama = BlokController::$request->nama_blok;
        $produk->save(); 

        return $produk;
    }

    public static function update_blok(){
        $stok_baru=
        Blok::where('id',BlokController::$id)
        ->update(['nama' => BlokController::$request->nama_blok]);

        return $stok_baru;
    }

    public static function blok_ready(){
        $blok = count(Slot::where('blok_id',BlokController::$id)->where('status',1)->get());
        return $blok;
    }
}