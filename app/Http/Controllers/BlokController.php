<?php

namespace App\Http\Controllers;

use App\Models\Blok;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlokController extends Controller
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
        $data = Blok::get_blok();
        return view('blok', compact('data'));
    }

    public function tambah(Request $request){
        self::$request = $request;
        Blok::tambah();
        
        // toast('Berhasil menambah blok','success');
        return back();
    }

    public function form_edit($id){
        self::$id = $id;
        $data = Blok::get_blok_id();
        return view('form-edit-blok', compact('data'));
    }

    public function update(Request $request, $id){
        self::$id = $id;
        self::$request = $request;
        Blok::update_blok();
        // toast('Berhasil Update Blok','success');
        return redirect('/blok');
    }

    public function hapus($id){
        self::$id = $id;
        Blok::hapus();
        return redirect('/blok');
    }

    public function data_blok()
    {
        $data1 = Blok::get_blok();
        $data = json_decode($data1, true);
        $panjang_data = count($data);
        $arr=array();

        foreach ($data as $datas) {
            $blok_ready = count(Slot::where('blok_id',$datas['id'])->where('status',1)->get());
            array_push($arr,$blok_ready);
        }
        
        for ($i=0; $i < $panjang_data ; $i++) { 
            array_push($data[$i],$arr[$i]);
        }

        return view('data-blok', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
