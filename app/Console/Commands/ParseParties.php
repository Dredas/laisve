<?php

namespace App\Console\Commands;

use App\Party;
use Illuminate\Console\Command;
use ParseCsv\Csv;
use Illuminate\Support\Facades\File;

class ParseParties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:parties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from parties csv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = public_path('vrk/pirmumas');
        $files = File::allFiles($path);

        foreach($files as $file) {
            $csv = new Csv();

            $csv->delimiter = ";";
            $csv->encoding('WINDOWS-1257', 'UTF-8');
            $csv->parse($file->getRealPath());

            $row = $csv->data[0];

            $party = new Party();
            $party->name = $row['PARTIJOS_PAVADINIMAS'];
            $party->number = $row['PARTIJOS_SARASO_NUMERIS'];
            $party->election = 1;

            $party->save();
        }


        echo 'OK';
    }
}
