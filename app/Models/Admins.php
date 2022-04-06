<?php

namespace App\Models;
use Illuminate\Auth\Middleware\Authenticate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
class Admins extends Authenticable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'admins';
    protected $guard = 'admins';
    protected $fillable = [
        'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
