<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    protected $fillable = [
        'kode', 'activate', 'acc_by', 'receive_by',
    ];
}
