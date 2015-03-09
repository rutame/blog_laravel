@extends('admin.layout.admin_layout')

@section('content')
    <div class="container">
        <h1>Crear nueva categoría</h1>
        @if($errors->all())
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
                <li class="list-unstyled">{{ $error }}</li>
        @endforeach
         </div>
        @endif

        {{ Form::open(array('url'=>'admin/categorias', 'enctype'=>'multipart/form-data', 'class'=>'form-group, form-control, form-horizontal')) }}

        <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
                </div>
                {{Form::text('titulo','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Titulo de la publicación'))}}
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
                  <span class="glyphicon glyphicon-plus-sign"></span>  Guardar categoría
              </button>
        </div>

        {{Form::close()}}
    </div>
@stop