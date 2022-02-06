<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
        protected $fillable=[
            
            'nama_barang',
            'jumlah',
            'tanggal_masuk',
            'harga_satuan'
        ];
        protected $table='inven_tokos';
}
