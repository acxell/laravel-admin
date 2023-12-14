<?php

namespace App\Http\Controllers;


use App\Models\transaksi;
use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function homebarang(Request $request)
    {
       if($request->has('search')){
           $allData = Barang::where('nama_barang','LIKE','%'.$request->search. '%')->paginate(3);
       }else{
           $allData = Barang::paginate(2);
       }
        return view('barang',['data'=>$allData]);
    }
    public function admin_editbarang($id)
    {
        $dataEdit = Barang::find($id);
        return view('edit_barang',['data'=>$dataEdit]);
    }
    public function admin_addbarang()
    {
        return view('addbarang');
    }

    //create
    public function add_adminbarang(Request $request)
    {
        $newData = new barang();

        $newData->nama_barang= $request->nama_barang;
        $newData->harga= $request->harga;
        $newData->save();
        
        return redirect('/home-barang');

    }

    //update
    public function edit_adminbarang(Request $request)
    {
        barang::where('id',$request->id)->update(
            [
                'nama_barang'=>$request->nama_barang,
                'harga'=>$request->harga,
            ]
        );
        return redirect('/home-barang');
    }

    //delete
    public function deleteadminbarang($id)
    {
        $dataDelete= Barang::find($id);
        $dataDelete->delete();
        return redirect('/home-barang');
    }

}

