@extends('layout.layout')

@section('content')
    <p></p>
    <div class="btn-group">
        <a href="{{URL::previous()}}" class="btn btn-default">
            <i class=" fa fa-backward"></i> Volver</a>
    </div>

    <div class="well">
        <div class="container-fluid">

        @include('layout.mensajes')

        {{ Form::open(array('url'=>'categorias', 'files'=>true, 'class'=>'form-group, form-control, form-horizontal')) }}

        <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
                </div>
                {{Form::text('nombre','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Categoría'))}}
            </div>

        </div>

        <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </div>
        {{Form::textarea('descripcion', '',
                                array(
                                        'class' =>'form-control',
                                        'size'=>'50x6')) }}

        </div>
        </div>

        <div class="form-group">

              <button class="btn btn-success">
                  <i class="fa fa-sign-in"></i>  Guardar categoría
              </button>
        </div>

        {{Form::close()}}
    </div>
    </div>

@stop