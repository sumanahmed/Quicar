<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Owner extends Model
{
    use HasApiTokens,Notifiable;
    protected $fillable = [
        'name', 'email', 'phone',
    ];
}
