<?php

namespace App\Console\Commands;

use App\Imports\GamesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dkb:import-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Excel::import(new GamesImport, public_path('files/games.csv'), null, \Maatwebsite\Excel\Excel::CSV);
    }
}
