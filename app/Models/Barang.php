<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable= [
        'id','nama_bar', 'merek','nama_dis','harga_bar','harga_bel','stok','nama_pet','waktu'
    ];
}
