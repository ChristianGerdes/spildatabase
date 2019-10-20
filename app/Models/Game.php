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

    public function scopeInReview($query)
    {
        $query->where('published', false);
    }

    public function scopePublished($query)
    {
        $query->where('published', true);
    }

    public function isPublished()
    {
        return !! $this->published;
    }

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    public function toSearchableArray()
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'notes' => $this->notes,
            'url' => $this->url,
            'published_year' => $this->published_at ? $this->published_at->format('Y') : 'unknown',
            'contributors' => $this->credits->map(function($contributor) {
                return [
                    'id' => $contributor->pivot->contributor_id,
                    'name' => $contributor->name,
                ];
            })->toArray(),
            'publishers' => $this->publishers->map(function($publisher) {
                return [
                    'id' => $publisher->pivot->publisher_id,
                    'name' => $publisher->name
                ];
            })->toArray(),
        ];

        return $this->transform($data);
    }

    public function credits()
    {
        return $this->belongsToMany(Contributor::class, 'credits')->withPivot('type');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'game_publisher');
    }
}
