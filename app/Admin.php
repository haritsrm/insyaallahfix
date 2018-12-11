<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'no_tlp',
        'email',
        'password',
        'super',
        'suspend'
    ];
 
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
