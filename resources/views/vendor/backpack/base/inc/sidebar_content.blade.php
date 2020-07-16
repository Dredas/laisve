<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

@role('superadmin')
<li class="nav-title">Valdymas</li>

<!-- Users, Roles Permissions -->
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-group"></i> Nariai</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-user"></i> <span>Visi</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i> <span>Rolės</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon fa fa-key"></i> <span>Leidimai</span></a></li>
  </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-globe"></i> Žemėlapis</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('map') }}"><i class="nav-icon fa fa-map"></i> <span>Bendras</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-map-marker"></i> <span>Mano apygarda</span></a></li>
    </ul>
</li>
@endrole
