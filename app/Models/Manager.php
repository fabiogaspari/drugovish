<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
    use HasFactory, Notifiable;
    
    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'level',
        'password'
    ];

}
