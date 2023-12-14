<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function hometransaksi(Request $request)
     {

        if($request->has('search')){
            $alldata = transaksi::where('nama_pembeli','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $alldata = transaksi::paginate(2);
        }

        
        // dd($allData);
         return view('index-transaksi',['data'=>$alldata]);
     }
     public function admin_edittransaksi($id)
     {
        $dataEdit = transaksi::with('barang')->find($id);
        $mk = barang::all();
        return view('edit', compact('dataEdit','mk'));
    }
     public function admin_addtransaksi()
     {
        $datas = barang::all();
         return view('add', compact('datas'));
     }
 
     //create
     public function add_admintransaksi(Request $request)
     {
         $newDatas = new transaksi();
 
         $newDatas->nama_pembeli= $request->nama_pembeli;
         $newDatas->no_hp= $request->no_hp;
         $newDatas->id_layanan= $request->id_layanan;
         $newDatas->save();
         
         return redirect('/index-transaksi');
 
     }

 
     //update
     public function edit_admintransaksi(Request $request)
     {
        Transaksi::where('id',$request->id)->update(
            [
                'nama_pembeli'=>$request->nama_pembeli,
                'no_hp'=>$request->no_hp,
                'id_layanan'=>$request->mk,
            ]
        );
        return redirect('/index-transaksi');
    }
 
     //delete
     public function delete_admintransaksi($id)
     {
         $dataDelete= transaksi::find($id);
         $dataDelete->delete();
         return redirect('/index-transaksi');
     }
 
}

