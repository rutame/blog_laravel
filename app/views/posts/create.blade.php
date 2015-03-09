@extends('layout.layout')

@section('content')

        <p>
        @include('layout.mensajes')
        </p>
        <div class="btn-group">
            <a href="{{URL::previous()}}" class="btn btn-default">
                <i class=" fa fa-backward"></i> Volver</a>
            <a href="{{url('posts/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir</a>
        </div>

        <div class="well">

        {{ Form::open(array(
        'url'=>'posts',
        'files'=>true,
        'class'=>'form-group, form-control, form-horizontal')) }}

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="fa fa-star fa-fw"></span>
                </div>
                {{Form::text('titulo','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Titulo de la publicación'))}}
       <!--     </div>

            <div class="input-group"> -->
                <div class="input-group-addon">
                    <span class="fa fa-calendar-o fa-fw"></span>
                </div>
                {{Form::text('fecha','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Fecha publicación',
                                          'id' => 'input_fecha'))}}
            </div>

        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="fa fa-stack-overflow fa-fw"></span>
                </div>
                {{Form::text('resumen','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Resumen'))}}
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tag"></span>
                </div>
                {{Form::text('tag','',
                                  array(
                                          'class'=>'form-control',
                                          'placeholder'=>'Etiquetas'))}}
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="fa fa-inbox fa-fw"></span>
                </div>
                {{Form::select('categoria',$categorias,'', array('class'=>'form-control pull-left ')) }}
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="fa fa-comments-o fa-fw"></span>
                </div>
                {{Form::textarea('cuerpo', '',
                                        array(
                                                'class' =>'form-control',
                                                'size'=>'50x6')) }}
            </div>
        </div>

        <div class="form-group form-inline">

            <button class="btn btn-success form-control">
                <i class="fa fa-sign-in"></i>
                Guardar post
            </button>

            <div class="form-control btn btn-info btn-file">
                <i class="fa fa-picture-o"></i>
                Buscar imagen
                {{Form::file('foto', array('multiple'=>true))}}
            </div>

        </div>

        {{Form::close()}}
    </div>

@stop
{{-- seccion de javascript --}}
@section('javascript')
    @include('layout.tiny')
    @include('layout.calendario')
@stop