<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;
    
    // GROUPS CODE
    public const GROUP1 = '1';
    public const GROUP2 = '2';

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Get customers associated with the group. 
     *
     * @return HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    } 

}
