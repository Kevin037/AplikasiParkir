<?php

namespace App\Http\Controllers;

use App\Models\Blok;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
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
        $data = Slot::get_slot();
        $blok = Blok::get_blok();
        return view('Slot', compact('data','blok'));
    }

    public function tambah(Request $request){
        self::$request = $request;
        Slot::tambah();
        
        // toast('Berhasil menambah Slot','success');
        return back();
    }

    public function form_edit($id){
        self::$id = $id;
        $data = Slot::get_Slot_id();
        $blok = Blok::get_blok();
        return view('form-edit-slot', compact('data','blok'));
    }

    public function update(Request $request, $id){
        self::$id = $id;
        self::$request = $request;
        Slot::update_Slot();
        // toast('Berhasil Update Slot','success');
        return redirect('/slot');
    }

    public function hapus($id){
        self::$id = $id;
        Slot::hapus();
        return redirect('/Slot');
    }

    public function detail_slot($id_blok)
    {
        self::$id = $id_blok;
        $data = Slot::get_slot_per_blok();
        return response()->json($data);
    }
    
}
