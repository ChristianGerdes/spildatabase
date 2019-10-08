<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $dates = [
        'published_at'
    ];

    public function toSearchableArray()
    {
        $this->credits;

        $array = $this->toArray();
        $array = $this->transform($array);

        $array['published_year'] = $this->published_at ? $this->published_at->format('Y') : 'unknown';

        return $array;
    }

    public function credits()
    {
        return $this->belongsToMany(Contributor::class, 'credits')->withPivot('type');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }
}
