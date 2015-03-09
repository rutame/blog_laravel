@extends('layout.layout')

@section('content')


@include('layout.mensajes')
    <p></p>
    <div class="btn-group">
        <a href="{{URL::previous()}}" class="btn btn-success">
            <i class=" fa fa-backward"></i> Volver</a>
        <a href="{{url('usuarios/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir</a>
    </div>

        <div class="well">
            <table class="table table-striped table-hover table-condensed table-responsive">
            <tr>
                <th colspan="2">Acción</th>
                <th>nombre</th>
                <th>email</th>
                <th>username</th>
                <th>creado el</th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>
                        <a href="{{url('usuarios/'.$usuario->id.'/edit')}}" class="btn fa fa-edit fa-fw">
                        </a>
                    </td>
                    <td>
                        {{ Form::open(array('url'=>'usuarios/'.$usuario->id, 'method'=>'delete')) }}
                        <button class="btn fa fa-trash-o fa-fw"></button>
                        {{ Form::close() }}
                    </td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->username}}</td>
                    <td>{{$usuario->created_at}}</td>
                </tr>
            @endforeach
            </table>
        </div>


@endsection


