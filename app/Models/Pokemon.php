<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'pokeapi_id',
        'name',
        'sprite_url',
        'is_starter',
    ];

    protected function casts(): array
    {
        return [
            'is_starter' => 'boolean',
        ];
    }
}
