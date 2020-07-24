<?php

namespace App\Console\Commands;

use App\Candidate;
use App\County;
use App\District;
use App\Party;
use App\Rating;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ParseCsv\Csv;

class ParseRatings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:ratings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from ratings csv';

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

        $election = 1;

        $parties = [];
        $counties = [];
        $districts = [];
        $candidates = [];

        foreach($files as $file) {
            $csv = new Csv();

            $csv->delimiter = ";";
            $csv->encoding('WINDOWS-1257', 'UTF-8');
            $csv->parse($file->getRealPath());

            foreach($csv->data as  $key => $data) {

                if ( $data['PIRMUMO_BALAI'] < 1 ) { continue; }

                $skipped = false;

                $rating = new Rating();

                $p = null;
                $c = null;
                $d = null;

                //Party
                if(isset($parties[$data['PARTIJOS_PAVADINIMAS']])) {
                    $p = $parties[$data['PARTIJOS_PAVADINIMAS']];
                } else {
                    $party = Party::where('name', $data['PARTIJOS_PAVADINIMAS'])->first();
                    if($party) {
                        $parties[$data['PARTIJOS_PAVADINIMAS']] = $party->id;
                        $p = $party->id;
                    } else {
                        $skipped = true;
                        print_r('Nera: ' . $data['PARTIJOS_PAVADINIMAS'] . ' ');
                    }
                }

                //County
                if(isset($counties[$data['APYGARDOS_PAVADINIMAS']])) {
                    $c = $counties[$data['APYGARDOS_PAVADINIMAS']];
                } else {
                    $county = County::where('name', $data['APYGARDOS_PAVADINIMAS'])->first();

                    if($county) {
                        $counties[$data['APYGARDOS_PAVADINIMAS']] = $county->id;
                        $c = $county->id;
                    } else {
                        $skipped = true;
                    }
                }


                //District
                if(isset($districts[$data['APYLINKES_PAVADINIMAS']])) {
                    $d = $districts[$data['APYLINKES_PAVADINIMAS']];
                } else {
                    $district = District::where('name', $data['APYLINKES_PAVADINIMAS'])->first();
                    if($district) {
                        $districts[$data['APYLINKES_PAVADINIMAS']] = $district->id;
                        $d = $district->id;
                    } else {
                        $skipped = true;
                    }
                }


                //Candidate
                $candidate = $data['VARDAS'] . ' ' . $data['PAVARDE'];

                if(isset($candidates[$candidate])) {
                    $can = $candidates[$candidate];
                } else {
                    $findCandidate = Candidate::where('full_name', $candidate)->first();
                    if($findCandidate) {
                        $candidates[$candidate] = $findCandidate->id;
                        $can = $findCandidate->id;
                    } else {

                        print_r('Nera: ' . $candidate . ' ');
                        $newCandidate = new Candidate();
                        $newCandidate->first_name = $data['VARDAS'];
                        $newCandidate->last_name = $data['PAVARDE'];
                        $newCandidate->full_name = $candidate;

                        $newCandidate->party = $p;
                        $newCandidate->election = $election;

                        $newCandidate->save();

                        $can = $newCandidate->id;
                    }
                }

                $rating->party = $p;
                $rating->county = $c;
                $rating->district = $d;

                $rating->candidate = $can;

                $rating->priority_score = $data['PIRMUMO_BALAI'];

                $rating->skipped = $skipped;
                $rating->election = $election;

                if($skipped) {
                    $rating->skipped_key = $key;
                    $rating->skipped_file = $file->getFilename();
                }

                $rating->save();
            }
        }

        dd();
        echo 'OK';
    }
}
