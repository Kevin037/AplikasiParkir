<?php

namespace App\Http\Controllers;

use App\Models\Blok;
use App\Models\Slot;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function json_parkir_masuk(){
        $produk = Transaksi::get_parkir_masuk();
        
        return response()->json($produk);
    }

    public function json_parkir_keluar(){
        $produk = Transaksi::get_parkir_keluar();
        
        return response()->json($produk);
    }

    public function json_data_slot_kosong(){
        $produk = Transaksi::get_slot_kosong();
        return response()->json($produk);
    }

    public function json_blok_slot(){
        $data = Blok::get_blok();
        $encode = json_encode($data, true);
        $decode = json_decode($encode, true);
      
        $panjang_data = count($data);
        $arr=array();

        foreach ($decode as $datas) {
            $blok_ready = count(Slot::where('blok_id',$datas['id'])->where('status',1)->get());
            array_push($arr,$blok_ready);
        }
        
        for ($i=0; $i < $panjang_data ; $i++) { 
            array_push($decode[$i],$arr[$i]);
        }
        return response()->json($decode);
    }
}
