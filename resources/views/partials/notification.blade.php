@if(Session::has('notification'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
        {{ Session::get('notification') }}
    </div>
@endif