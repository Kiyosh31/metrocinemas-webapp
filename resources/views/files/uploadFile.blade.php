{!! Form::open(['route' => 'files.store', 'files' => true, 'id' => 'form-file-upload']) !!}
<div class="form-group">
    <label for="files" class="col-foms-label">Seleccione los archivos a cargar</label>
    {!! Form::file('files[]', ['multiple' => true], ['class' => 'form-control']) !!}
</div>

{!! Form::submit('upload', ['class' => 'btn btn-success']) !!}

@if(isset($model_id) && isset($model_type))
    {!! Form::hidden('model_id', $model_id) !!}
    {!! Form::hidden('model_type', $model_type) !!}
@endif

{!! Form::close() !!}