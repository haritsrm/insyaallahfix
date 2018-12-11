<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'name', 'type', 'pict', 'description', 'stock',
    ];

    function FKBarang(){
    	return $this->hasMany(Cart::class);
    }

    function FKBarang1(){
    	return $this->hasMany(Peminjaman::class);
    }
}
