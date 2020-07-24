<?php

namespace App\Http\Controllers;

use App\County;
use App\Rating;
use App\Votes;

class MapController extends Controller
{
    public function show()
    {
        $counties = County::limit(1)->get();

        return view('map.counties',
            [
                'key' => 'AIzaSyB7GYhX46baN2z1m93jdLaesNHshn-uG3w',
                'counties' => $counties,
            ]
        );
    }
    public function rating()
    {
        $county = 5; //Baltijos
        $county = 26; //Marių
        $county = 30; //SRV-MOL

        $rating = Rating::where(['election' => 1, 'county' => $county])->orderBy('priority_score', 'desc')->get()->groupBy('district');

        $candidate_totals = [];
        $totals = [];

        //Candidate total
        foreach($rating as $district) {
            foreach($district as $candidate) {
                if(isset($candidate_totals[$candidate->candidate])) {
                    $candidate_totals[$candidate->candidate]['priority_score'] = $candidate_totals[$candidate->candidate]['priority_score'] + $candidate->priority_score;
                } else {
                    $candidate_totals[$candidate->candidate]['priority_score'] = $candidate->priority_score;
                    $candidate_totals[$candidate->candidate]['full_name'] = $candidate->candidateRelation->full_name;
                    $candidate_totals[$candidate->candidate]['party'] = $candidate->partyRelation ? $candidate->partyRelation->name : '';
                }
            }
        }

        $candidate_totals = collect($candidate_totals)->sortBy('priority_score')->reverse()->toArray();

        //Party total
        foreach($rating as $district) {
            foreach($district as $candidate) {
                if(isset($totals[$candidate->party])) {
                    $totals[$candidate->party]['priority_score'] = $totals[$candidate->party]['priority_score'] + $candidate->priority_score;
                } else {
                    $totals[$candidate->party]['priority_score'] = $candidate->priority_score;
                    $totals[$candidate->party]['party'] = $candidate->partyRelation ? $candidate->partyRelation->name : '';
                }
            }
        }

        $totals = collect($totals)->sortBy('priority_score')->reverse()->toArray();

        return view('data.rating',
            [
                'ratings' => $rating,
                'candidate_totals' => $candidate_totals,
                'totals' => $totals,
            ]
        );
    }

    public function votes()
    {
        $county = 5; //Baltijos
        $county = 26; //Marių
        $county = 30; //SRV-MOL

        $votes = Votes::where(['election' => 1, 'county' => $county])->orderBy('total_votes', 'desc')->get()->groupBy('district');

        $totals = [];

        foreach($votes as $district) {
            foreach($district as $candidate) {
                if(isset($totals[$candidate->candidate])) {
                    $totals[$candidate->candidate]['total'] = $totals[$candidate->candidate]['total'] + $candidate->total_votes;
                } else {
                    $totals[$candidate->candidate]['total'] = $candidate->total_votes;
                    $totals[$candidate->candidate]['full_name'] = $candidate->candidateRelation->full_name;
                    $totals[$candidate->candidate]['party'] = $candidate->partyRelation ? $candidate->partyRelation->name : '';
                }
            }
        }

        $totals = collect($totals)->sortBy('total')->reverse()->toArray();


        return view('data.votes',
            [
                'votes' => $votes,
                'totals' => $totals,
            ]
        );

    }
}
