<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Publisher;
use App\Models\Contributor;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class GamesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        $attributes = [
            'title' => $row['navn'],
            'notes' => $row['noter'],
            'url' => $row['spilllets_url'],
            'published' => true
        ];

        if (Str::contains($row['sorteringsar'], '/')) {
            $attributes['published_at'] = Carbon::parse($row['sorteringsar'])->timestamp;
        }

        $game = Game::create($attributes);

        if ($row['udvikler'] && strlen($row['udvikler']) > 1) {
            $developers = explode(',', $row['udvikler']);
            $developers = array_map('trim', $developers);

            foreach ($developers as $developer) {
                $contributor = Contributor::firstOrCreate([
                    'name' => $developer,
                    'url' => $row['udviklers_url']
                ]);

                $game->credits()->attach([$contributor->id => ['type' => 'developer']]);
            }
        }

        if ($row['udgiver'] && strlen($row['udgiver']) > 1) {
            $publishers = explode(',', $row['udgiver']);
            $publishers = array_map('trim', $publishers);

            foreach ($publishers as $publisher) {
                $game->publishers()->attach([
                    Publisher::firstOrCreate([
                        'name' => $publisher
                    ])->id
                ]);
            }
        }

        if ($row['platform'] && strlen($row['platform']) > 1) {
            $platforms = explode(', ', $row['platform']);

            $platforms = array_filter($platforms, function($platform) {
                return $platform != 'mm.';
            });

            $ids = [];

            foreach ($platforms as $platform) {
                $ids[] = Platform::firstOrCreate(['title' => $platform])->id;
            }

            $game->platforms()->attach($ids);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
