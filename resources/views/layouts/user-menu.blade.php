<div class="dropdown">
  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
      <span class="avatar" style="background-image: url({{ asset('demo/faces/female/25.jpg') }})"></span>
      <span class="ml-2 d-none d-lg-block">
        <span class="text-default">{{ Auth::user()->username }}</span>
        <small class="text-muted d-block mt-1">{{ Auth::user()->role == 'admin' ? 'Administrador' : 'Empleado' }}</small>
      </span>
    </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="{{ route('profile') }}">
        <i class="dropdown-icon fe fe-user"></i> Perfil
      </a>
    <a class="dropdown-item" href="">
          <span class="float-right"><span class="badge badge-primary">6</span></span>
          <i class="dropdown-icon fa fa-money"></i> Historial
        </a>
    <a class="dropdown-item" href="">
        <i class="dropdown-icon fa fa-cog"></i> Configuraciones
      </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="dropdown-icon fe fe-log-out"></i> {{ __('Logout') }}
      </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>