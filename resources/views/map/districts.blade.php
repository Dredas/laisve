@extends(backpack_view('blank_no_padding'))

<style>
    .districts {
        height: 100%;
        width: 100%;
    }
</style>
<script>
    var districtsKML = '/districts/{{ $county->no }}.kml';
</script>
<script src="{{ '../../js/app.js' }}"></script>

@section('content')
    <div id="districts" class="districts"></div>
    <div class="zoom">
        <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>
        <ul class="zoom-menu">
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out"><i class="fa fa-user"></i></a></li>
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out"><i class="fa fa-book"></i></a></li>
        </ul>
    </div>
@endsection
