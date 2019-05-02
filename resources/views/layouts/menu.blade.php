<div class="col-lg order-lg-first">
  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}"><i class="fe fe-home"></i> Inicio</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('movies.index') }}" class="nav-link {{ Request::is('movies*') ? 'active' : '' }}"><i class="fa fa-film"></i> Peliculas</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('auditoriums.index') }}" class="nav-link {{ Request::is('auditoriums*') ? 'active' : '' }}"><i class="fa fa-television"></i> Auditorios</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('screenings.index') }}" class="nav-link {{ Request::is('screenings*') ? 'active' : '' }}"><i class="fa fa-video-camera"></i> Proyecciones</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('reservations.index') }}" class="nav-link {{ Request::is('reservations*') ? 'active' : '' }}"><i class="fa fa-credit-card"></i> Reservaciones</a>
    </li>
  </ul>
</div>