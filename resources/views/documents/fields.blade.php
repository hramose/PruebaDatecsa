<!-- Nombre Archivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_archivo', 'Nombre Archivo:') !!}
    {!! Form::text('nombre_archivo', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruta Archivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruta_archivo', 'Archivo:') !!}
    {!! Form::file('ruta_archivo') !!}
</div>

<div class="clearfix"></div>

<!-- Tipo Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    {!! Form::select('tipo_documento',$typesDocuments, null, ['class' => 'form-control']) !!}
</div>

<!-- Indice1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indice1', 'Indice1:') !!}
    {!! Form::text('indice1', null, ['class' => 'form-control']) !!}
</div>

<!-- Indice2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indice2', 'Indice2:') !!}
    {!! Form::text('indice2', null, ['class' => 'form-control']) !!}
</div>

<!-- Indice3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indice3', 'Indice3:') !!}
    {!! Form::text('indice3', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancelar</a>
</div>
