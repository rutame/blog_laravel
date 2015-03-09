@extends('layout.layout')

@section('content')
    <p>
    @include('layout.mensajes')
    </p>
    <div class="btn-group">
        <a href="{{URL::previous()}}" class="btn btn-default">
            <i class=" fa fa-backward"></i> Volver</a>
        <a href="{{url('categorias/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir</a>
    </div>


<div class="well">
    <table class="table table-striped table-hover table-condensed table-responsive">

        <tr>
            <th colspan="2">Acción</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>

        @foreach($categorias as $categoria)

            <tr>
                <td>
                    <a href="{{url('categorias/'.$categoria->id)}}" class="btn fa fa-edit fa-fw">
                    </a>
                </td>
                <td>
                    {{ Form::open(array('url'=>'categorias/'.$categoria->id, 'method'=>'delete')) }}
                    <button class="btn fa fa-trash-o fa-fw"></button>
                    {{ Form::close() }}
                </td>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>
                    @if(strlen($categoria->descripcion)>50)
                        {{substr($categoria->descripcion, 0, 50).'...';}}
                    @endif
                </td>
            </tr>

        @endforeach

    </table>
</div>
@stop