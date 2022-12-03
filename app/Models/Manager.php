<?php

namespace App\Models;

use Carbon\Carbon;
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


    public static function resetOldApiToken()
    {
        foreach( Manager::all() as $manager ) {
            $tokenPlusHour = Carbon::parse($manager->api_token_modified)->addHour();
            if ( $tokenPlusHour->lessThan(now()) ) { 
                $manager->api_token = null;
                $manager->save();
            }
        }
        
    }
}
