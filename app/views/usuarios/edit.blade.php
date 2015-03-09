@extends('layout.layout')

@section('content')
    <p></p>
    <div class="btn-group">
        <a href="{{URL::previous()}}" class="btn btn-default">
            <i class=" fa fa-backward"></i> Volver</a>
        <a href="{{url('usuarios/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir</a>
    </div>

    <div class="well">
    <div class="container-fluid">

        @include('layout.mensajes')


        {{ Form::model($usuario, ['method'=>'PATCH', 'route'=> ['usuarios.update', $usuario->id], 'files'=>true ]) }}
<div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {{Form::text('nombre',null, array('class'=>'form-control', 'placeholder'=>'Nombre y apellidos'))}}
        </div>
        </div>

        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            {{Form::input('phone','telefono', null, array('class'=>'form-control', 'placeholder'=>'Telefono'))}}
            </div>
        </div>

        <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
            {{Form::input('email','email', null, array('class'=>'form-control', 'placeholder'=>'Email'))}}
        </div>
        </div>

<div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user-plus fa-fw"></i></span>
            {{Form::input('text','username', null, array('class'=>'form-control', 'placeholder'=>'Username'))}}
        </div>
        </div>

<div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            {{Form::input('password','password', null, array('class'=>'form-control', 'placeholder'=>'Password'))}}
        </div>
        </div>

<div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Repite Contraseña" name="confirm_password">
        </div>
        </div>


        <div class="form-group form-inline">
        <div class="input-group">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-user-plus fa-fw"></i>
                Actualizar
            </button>
        </div>
        <div class="input-group btn btn-danger btn-file">
            <i class="fa fa-picture-o"></i>
            Buscar imagen
            {{Form::file('foto')}}
        </div>
    </div>
        {{Form::close()}}

    </div>
    </div>
@stop