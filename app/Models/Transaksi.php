<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_bar','harga_bar','total_bar','total_har','total_bay','kembalian','tanggal_bel'
    ];
}
