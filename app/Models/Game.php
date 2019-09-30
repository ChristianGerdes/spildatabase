<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    protected $dates = [
        'published_at'
    ];

    public function credits()
    {
        return $this->belongsToMany(Contributor::class, 'credits')->withPivot('type');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }
}
