@extends('layouts.tabler') 
@section('content')
<div class="card">
  <div class="card-body">
    <div class="media">
      <span class="avatar avatar-xxl mr-5" style="background-image: url(demo/faces/male/21.jpg)"></span>
      <div class="media-body">
        <h4 class="m-0">David Garcia</h4>
        <p class="text-muted mb-0">Developer</p>
        <ul class="social-links list-inline mb-0 mt-2">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/kiyoshii31" title="Facebook" data-toggle="tooltip" target="_blank"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="https://twitter.com/Kiyoshi_31" title="Twitter" data-toggle="tooltip" target="_blank"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="https://github.com/Kiyosh31" title="Github" data-toggle="tooltip" target="_blank"><i class="fa fa-github"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.linkedin.com/in/david-kiyoshi-garcia-azano-8b365b159/" title="Linkedin" data-toggle="tooltip" target="_blank"><i class="fa fa-linkedin"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Enviame un email</h3>
  </div>
  <div class="card-body">
    <form>
      <div class="row">
        <div class="col-auto">
          <span class="avatar avatar-xl" style="background-image: url(demo/user.png)"></span>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="form-label">Correo del remitente</label>
            <input class="form-control" placeholder="tu-email@domain.com" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Mensaje</label>
        <textarea class="form-control" rows="5" placeholder="Dime algo!"></textarea>
      </div>
      <div class="form-footer">
        <button class="btn btn-primary btn-block">Enviar</button>
      </div>
    </form>
  </div>
</div>
@endsection