<!doctype html>
<html lang="en">
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>

@foreach ($ratings as $district => $values)
    @if ($loop->first)
        <h1>{{ $values[0]->countyRelation->name  }}</h1>
    @endif
@endforeach


<h2>Viso pagal partiją</h2>

<table>
    <tr>
        <th>Partija</th>
        <th>Viso</th>
    </tr>
    @foreach ($totals as $total)
        @if($total['priority_score'] > 4)
            <tr>
                <td>{{ $total['party'] }}</td>
                <td>{{ $total['priority_score'] }}</td>
            </tr>
        @endif
    @endforeach
</table>


<h2>Viso pagal kandidatą</h2>

<table>
    <tr>
        <th>Kandidatas</th>
        <th>Partija</th>
        <th>Viso</th>
    </tr>
    @foreach ($candidate_totals as $candidate_total)
        @if($candidate_total['priority_score'] > 4)
            <tr>
                <td>{{ $candidate_total['full_name'] }}</td>
                <td>{{ $candidate_total['party'] }}</td>
                <td>{{ $candidate_total['priority_score'] }}</td>
            </tr>
            @endif
    @endforeach
</table>

<h2>Apylinkės</h2>

@foreach ($ratings as $district => $values)
    <h2>@if($values[0]->districtRelation){{ $values[0]->districtRelation->name }}@else Klaida (apylinks pavadinimas nerastas) @endif</h2>

    <table>
        <tr>
            <th>Kandidatas</th>
            <th>Partija</th>
            <th>Pirmumo balai</th>
        </tr>
        @foreach ($values as $candidate => $value)

            @if($value->priority_score > 4)
                <tr>
                    <td>{{ $value->candidateRelation->full_name }}</td>
                    <td>@if($value->partyRelation) {{ $value->partyRelation->name }} @endif</td>
                    <td>{{ $value->priority_score }}</td>
                </tr>
            @endif

        @endforeach
    </table>
@endforeach

</body>
</html>
