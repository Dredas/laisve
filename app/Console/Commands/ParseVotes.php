<?php

namespace App\Console\Commands;

use App\Candidate;
use App\County;
use App\District;
use App\Party;
use App\Votes;
use Illuminate\Console\Command;
use ParseCsv\Csv;

class ParseVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:votes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from votes csv';

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
        $file = public_path('vrk/VN_I_turas.csv');
        $election = 1;
        $tour = 1;

        $csv = new Csv();

        $csv->delimiter = ";";
        $csv->encoding('WINDOWS-1257', 'UTF-8');
        $csv->parse($file);

        $parties = [];
        $counties = [];
        $districts = [];
        $candidates = [];

        foreach($csv->data as $key => $data) {
            $skipped = false;

            $p = null;
            $c = null;
            $d = null;

            $vote = new Votes();

            //Party
            if(isset($parties[$data['PARTIJA']])) {
                $p = $parties[$data['PARTIJA']];
            } else {
                $party = Party::where('name', $data['PARTIJA'])->first();
                if($party) {
                    $parties[$data['PARTIJA']] = $party->id;
                    $p = $party->id;
                } else {
                    $skipped = true;
                }
            }

            //County
            if(isset($counties[$data['APYGARDOS_PAVADINIMAS']])) {
                $c = $counties[$data['APYGARDOS_PAVADINIMAS']];
            } else {
                print_r($data['APYGARDOS_PAVADINIMAS']);
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

            $vote->party = $p;
            $vote->county = $c;
            $vote->district = $d;

            $vote->candidate = $can;

            if($data['BALSU_BALSADEZEJE']) {
                $vote->votes = $data['BALSU_BALSADEZEJE'];
                $vote->post_votes = $data['BALSU_PASTU'];
                $vote->total_votes = $data['BALSU_VISO'];
            } else {
                $skipped = true;
            }

            $vote->skipped = $skipped;
            $vote->election = $election;
            $vote->tour = $tour;

            if($skipped) {
                $vote->skipped_key = $key;
            }

            $vote->save();
        }

        echo 'OK';
    }
}
