<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $documents->id !!}</p>
</div>

<!-- Nombre Archivo Field -->
<div class="form-group">
    {!! Form::label('nombre_archivo', 'Nombre Archivo:') !!}
    <p>{!! $documents->nombre_archivo !!}</p>
    <a href="{{asset('uploads/'.$documents->id.'.pdf')}}" target="_blank">Ver archivo</a>
</div>

<!-- Tipo Documento Field -->
<div class="form-group">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    <p>{!! $documents->type_documents->nombre !!}</p>
</div>

<!-- Indice1 Field -->
<div class="form-group">
    {!! Form::label('indice1', 'Indice1:') !!}
    <p>{!! $documents->indice1 !!}</p>
</div>

<!-- Indice2 Field -->
<div class="form-group">
    {!! Form::label('indice2', 'Indice2:') !!}
    <p>{!! $documents->indice2 !!}</p>
</div>

<!-- Indice3 Field -->
<div class="form-group">
    {!! Form::label('indice3', 'Indice3:') !!}
    <p>{!! $documents->indice3 !!}</p>
</div>

<!-- User Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Usuario:') !!}
    <p>{!! $documents->users->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $documents->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $documents->updated_at !!}</p>
</div>

