<div class="col-lg order-lg-first">
  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
      <a href="{{ Route('home') }}" class="nav-link {{ Request::is('main-page') ? 'active' : '' }}{{ Request::is('home') ? 'active' : '' }}"><i class="fe fe-home"></i> Inicio</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link {{ Request::is('movies*') ? 'active' : '' }}" data-toggle="dropdown"><i class="fa fa-film"></i>Peliculas</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        <a href="{{ route('movies.create') }}" class="dropdown-item">Agregar Pelicula</a>
        <a href="{{ route('movies.index') }}" class="dropdown-item">Mostrar Peliculas</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link {{ Request::is('screenings*') ? 'active' : '' }}" data-toggle="dropdown"><i class="fa fa-video-camera"></i>Proyecciones</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        <a href="{{ route('screenings.create') }}" class="dropdown-item">Agregar Proyecciones</a>
        <a href="{{ route('screenings.index') }}" class="dropdown-item">Mostrar Proyecciones</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link {{ Request::is('auditoriums*') ? 'active' : '' }}" data-toggle="dropdown"><i class="fa fa-video-camera"></i>Salas</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        <a href="{{ route('auditoriums.create') }}" class="dropdown-item">Agregar Sala</a>
        <a href="{{ route('auditoriums.index') }}" class="dropdown-item">Mostrar Salas</a>
      </div>
    </li>
  </ul>
</div>