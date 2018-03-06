@extends('layouts.app')

@section('content')
    <style>
        #divResult{
            -webkit-box-shadow: 3px 14px 58px -17px rgba(0,0,0,0.75);
            -moz-box-shadow: 3px 14px 58px -17px rgba(0,0,0,0.75);
            box-shadow: 3px 14px 58px -17px rgba(0,0,0,0.75);
        }
    </style>
    <section class="content-header">
        <h1 class="pull-left">Consultar Documentos</h1>
    </section>
    <div class="container-fluid">
    <div class="clearfix"></div>
    <br>
        <div id="divError" class="alert alert-danger" role="alert" style="display:none;"></div>
        {!! Form::open(array('method' => 'post')) !!}

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
                {!! Form::submit('Consultar', ['class' => 'btn btn-primary','id' => 'btnConsultarDoc']) !!}
            </div>
        {!! Form::close() !!}
        </div>
        <div id="divResult" class="container-fluid" style="display:none;">
            <table id="tblResultDocuments" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td><b>Nombre Archivo</b></td>
                        <td><b>Tipo Documento</td>
                        <td><b>Indice1</b></td>
                        <td><b>Indice2</b></td>
                        <td><b>Indice3</b></td>
                        <td><b>Usuario</b></td>
                        <td><b>Fecha Registro</b></td>
                        <td><b>Acción</b></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        /*Se crear el evento js para la consultar via ajax los documentos */
        $("#btnConsultarDoc").click(function(e){
            e.preventDefault();

            /*Se captura el valor de los campos */
            var tipoDocumento = $("#tipo_documento").val();
            var indice1 = $("input[name=indice1]").val();
            var indice2 = $("input[name=indice2]").val();
            var indice3 = $("input[name=indice3]").val();
            var _token = "{{ csrf_token() }}";
            var tabla = "";


            /*Se realiza la consulta de los documentos via ajax */
            $.ajax({
                url: 'search',
                datatType : 'json',
                type: 'POST',
                data:{'tipo_documento':tipoDocumento, 'indice1':indice1, 'indice2':indice2, 'indice3':indice3, '_token':_token},
                success:function(data){
                    $("#tblResultDocuments tbody").html("");
                    $("#divError").html("").hide();
                    if(data.status == 'success'){
                        $.each( data.result, function( key, value ) {
                            tabla += "<tr>";
                            tabla += "<td>"+value.nombre_archivo+"</td>";
                            tabla += "<td>"+value.type_documents.nombre+"</td>";
                            tabla += "<td>"+value.indice1+"</td>";
                            tabla += "<td>"+value.indice2+"</td>";
                            tabla += "<td>"+value.indice3+"</td>";
                            tabla += "<td>"+value.users.name+"</td>";
                            tabla += "<td>"+value.created_at+"</td>";
                            tabla += "<td> <a href='/uploads/"+value.id+".pdf' target='_blank'>Ver archivo</a></td>";
                            tabla += "</tr>";
                        });

                        $("#tblResultDocuments tbody").append(tabla);
                        $("#divResult").css('display','block');
                        console.log(data);
                    }else if(data.status == "error"){
                        $("#divResult").css('display','none');
                        $("#divError").html(data.msg).show();
                    }
                }
            });
        })
    </script>
@endsection


