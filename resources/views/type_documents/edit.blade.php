@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo de Documentos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeDocuments, ['route' => ['typeDocuments.update', $typeDocuments->id], 'method' => 'patch']) !!}

                        @include('type_documents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
