<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pembeli',
        'no_hp',
        'id_layanan',
    ];

    public function barang(){
        return $this->belongsTo(Barang::class,'id_layanan','id');
    }
}
