<li class="{{ Request::is('typeDocuments*') ? 'active' : '' }}">
    <a href="{!! route('typeDocuments.index') !!}"><i class="fa fa-edit"></i><span>Tipos de Documentos</span></a>
</li>

<li class="{{ Request::is('documents') ? 'active' : '' }}">
    <a href="{!! route('documents.index') !!}"><i class="fa fa-edit"></i><span>Documentos</span></a>
</li>

<li class="{{ Request::is('documents/search') ? 'active' : '' }}">
    <a href="{!! route('documents.search') !!}"><i class="fa fa-edit"></i><span>Consultar Documentos</span></a>
</li>

