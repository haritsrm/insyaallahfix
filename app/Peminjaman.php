<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = [
        'kode', 'user_id', 'tgl_pinjam', 'tgl_kembali', 'barang_id', 'jumlah',
    ];

    function FKPeminjaman(){
    	return $this->belongsTo(User::class);
    }

    function FKPeminjaman1(){
    	return $this->belongsTo(Barang::class);
    }
}
