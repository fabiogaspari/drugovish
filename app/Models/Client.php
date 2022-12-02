<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'cnpj',
        'foundation_date',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
