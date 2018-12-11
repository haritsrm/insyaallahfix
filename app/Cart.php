<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'id_barang', 'id_user', 'quantity',
    ];

    function FKCart(){
    	return $this->belongsTo(User::class);
    }
}
