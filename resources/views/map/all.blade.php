@extends(backpack_view('blank_no_padding'))

<style>
    .map {
        height: 100%;
        width: 100%;
    }
</style>

<script src="{{ '../js/app.js' }}"></script>

@section('content')
    <div id="map" class="map"></div>
@endsection
