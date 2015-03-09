@extends('admin.layout.admin_layout')

@section('content')
    <div class="page-header" xmlns="http://www.w3.org/1999/html">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-apple"></span>Categorías</h1>
        </div>
        {{--{{$array = explode('/',URL::current())}}--}}
        {{--{{$actu = array_pop($array)}}--}}
{{--<h2>{{$actu}}</h2>--}}
    </div>
<a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
<a href="{{url('admin/categorias/create')}}" class="btn btn-info">Añadir categoría</a>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Acción</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)

            <tr>
                <td><a href="{{url('admin/categorias/'.$categoria->id)}}">Editar</a></td>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{substr($categoria->descripcion, 0, 50)}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
@stop