@extends('layout.basicos.admin_layout')

@section('content')
    <div class="page-header" xmlns="http://www.w3.org/1999/html">
        <h1>Categorías</h1>
        {{--{{$array = explode('/',URL::current())}}--}}
        {{--{{$actu = array_pop($array)}}--}}
{{--<h2>{{$actu}}</h2>--}}
    </div>
<a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
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