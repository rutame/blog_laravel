@extends('admin.layout.admin_layout')

@section('content')
    <div class="page-header">
        <h1>Usuarios</h1>
    </div>
    <a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
    <table class="table table-responsive table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Username</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
             @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->telefono}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->password}}</td>
                </tr>
            @endforeach
    </table>
    @stop