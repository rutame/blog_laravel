@extends('layout/layout')

@section('content')
    <div class="container col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
        <p></p>
       {{-- <h3>Login de usuarios</h3>--}}
        <!--
    <form action="usuarios" method="post" enctype="multipart/form-data" class="form-horizontal" id="formulario"> -->

    @if(Session::has('mensaje_error'))
        <div class="alert alert-danger" role="alert">
            <i class="fa fa-exclamation-circle"></i>
        {{ Session::get('mensaje_error') }}
        </div>
    @endif
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            usuario: rutame, password: muy juntos
        </div>
        <div class="well">
{{ Form::open(array('url' => 'login', 'class'=>'form-signin', 'role'=>'form', 'id'=>'formulario')) }}

        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Nombre de Usuario" name="username">
        </div>
        <br />

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Contraseña" name="password" id="password">
        </div>
        <br />

            <div class="btn-group text-info proba" data-toggle="buttons" title="Recordarme en el sistema">
                <label class="btn btn-success " >
                    <input type="checkbox" autocomplete="off" >
                    <span class="glyphicon glyphicon-ok"></span>
                </label>
            </div>


        <div class="input-group margin-bottom-sm pull-right">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i>
                Entrar
            </button>
        </div>
    </div> <!-- cierra well -->
        <br />
{{ Form::close() }}

    </div>
@stop