@extends('layout.layout')
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur blanditiis eligendi numquam sunt. Aspernatur autem blanditiis doloribus eligendi facere harum iste odit possimus sint, suscipit tempora ut veniam! Ab dolorem exercitationem id non odit perspiciatis saepe suscipit? A ab animi atque blanditiis cumque dicta, excepturi maiores mollitia obcaecati quos sunt!
@section('content')
    <p>
    @include('layout.mensajes')
    </p>
    @if(Auth::check())
    <div class="btn-group">
        <a href="{{URL::previous()}}" class="btn btn-default">
            <i class=" fa fa-backward"></i> Volver</a>
        <a href="{{url('posts/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir</a>
    </div>
    @endif
    <div class="well">
        <h3>Registro de usuarios</h3>
        <div class="container-fluid">
    {{ Form::open(array('url' => 'usuarios', 'class'=>'form-horizontal', 'files' => true, 'role'=>'form', 'id'=>'formulario')) }}
    <div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
    {{Form::text('nombre',null, array('class'=>'form-control', 'placeholder'=>'Nombre y apellidos'))}}
        </div>
   </div>

    <div class="form-group ">
    <div class="input-group ">
        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
        {{Form::input('phone','telefono', null, array('class'=>'form-control', 'placeholder'=>'Telefono'))}}
    </div>
    </div>

    <div class="form-group ">
    <div class="input-group margin-bottom-sm">
        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
        <input class="form-control" type="text" placeholder="Email address" name="email">
    </div>
    </div>

    <div class="form-group ">
    <div class="input-group margin-bottom-sm">
        <span class="input-group-addon"><i class="fa fa-user-plus fa-fw"></i></span>
        <input class="form-control" type="text" placeholder="Nombre de Usuario" name="username">
    </div>
    </div>

    <div class="form-group ">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
        <input class="form-control" type="password" placeholder="Contraseña" name="password" id="password">
    </div>
    </div>

<div class="form-group ">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
        <input class="form-control" type="password" placeholder="Repite Contraseña" name="confirm_password">
    </div>
</div>

<div class="form-group form-inline">
    <div class="input-group margin-bottom-sm">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-user-plus fa-fw"></i>
            Registrarte
        </button>
    </div>

    <div class="input-group btn btn-info btn-file">
        <i class="fa fa-picture-o"></i>
        Buscar imagen
        {{Form::file('foto')}}
    </div>
</div>
    <br />

{{Form::close()}}
        </div>
</div>
@stop