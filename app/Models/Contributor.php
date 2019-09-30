<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $guarded = [];

    public function credits()
    {
        return $this->belongsToMany(Game::class, 'credits')->withPivot('type');
    }
}
