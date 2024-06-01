<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User_login extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = ['user'];
    protected $guarded = ['id'];
}
