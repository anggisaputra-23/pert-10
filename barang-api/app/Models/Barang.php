<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'data_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
    ];
}
