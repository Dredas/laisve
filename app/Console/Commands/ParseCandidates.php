<?php

namespace App\Console\Commands;

use App\County;
use App\Party;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ParseCsv\Csv;

class ParseCandidates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:candidates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from candidates csv';

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

        $notExists = [];

        foreach($files as $file) {
            $csv = new Csv();

            $csv->delimiter = ";";
            $csv->encoding('WINDOWS-1257', 'UTF-8');
            $csv->parse($file->getRealPath());


            foreach($csv->data as $data) {
                $county = County::where('name', $data['APYGARDOS_PAVADINIMAS'])->first();

                if(!$county && !isset($notExists[$data['APYGARDOS_NR']])) {

                    $notExists[$data['APYGARDOS_NR']] = $data['APYGARDOS_PAVADINIMAS'];

                    print_r(' ' . $data['APYGARDOS_PAVADINIMAS']);
                }
            }

//            $party = new Party();
//            $party->name = $row['PARTIJOS_PAVADINIMAS'];
//            $party->number = $row['PARTIJOS_SARASO_NUMERIS'];
//            $party->election = 1;

//            $party->save();
        }

        dd();
        echo 'OK';
    }
}
