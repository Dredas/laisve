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

<h2>Viso</h2>

<table>
    <tr>
        <th>Kandidatas</th>
        <th>Partija</th>
        <th>Viso</th>
    </tr>
    @foreach ($totals as $total)
        <tr>
            <td>{{ $total['full_name'] }}</td>
            <td>{{ $total['party'] }}</td>
            <td>{{ $total['total'] }}</td>
        </tr>
    @endforeach
</table>

@foreach ($votes as $district => $values)
    <h2>@if($values[0]->districtRelation){{ $values[0]->districtRelation->name }}@else Klaida (apylinks pavadinimas nerastas) @endif</h2>

    <table>
        <tr>
            <th>Kandidatas</th>
            <th>Partija</th>
            <th>Balsai</th>
            <th>Balsai paštu (išankstiniai)</th>
            <th>Viso</th>
        </tr>
        @foreach ($values as $candidate => $value)

            <tr>
                <td>{{ $value->candidateRelation->full_name }}</td>
                <td>@if($value->partyRelation) {{ $value->partyRelation->name }} @endif</td>
                <td>{{ $value->votes }}</td>
                <td>{{ $value->post_votes }}</td>
                <td>{{ $value->total_votes }}</td>
            </tr>

        @endforeach
    </table>
@endforeach

</body>
</html>
