@extends('layout.layout_publico')

@section('content')

    <h1 class="page-header"><a href="{{url('index')}}">Inicio</a>
        <small>/ {{$post->categoria->nombre}}</small></h1>

            <article>

                @include('layout.titulo')
                <img src="{{ asset($post->foto) }}" class="img-thumbnail img-responsive">
                <section id="descripcion">
                    <p>{{ $post->cuerpo }}</p>
                    <div class="difumina"></div>
                </section>
                <footer>
                <a href="{{URL::previous()}}" class="btn">
                    <i class="fa fa-backward fa-fw"></i>
                    Volver atrás
                </a>
                </footer>

            </article>
            <hr />
    @foreach($comentarios as $comentario)
       <div class="alert alert-info">
           <strong><i class="fa fa-user-secret"></i>
               {{$comentario->nombre}} ha dicho:
           </strong>
        {{$comentario->comentario}}
       </div>
    @endforeach
    <h3 class="text-info">Publica tus comentarios</h3>
    <div class="well">
        <div class="container-fluid">

            @include('layout.mensajes')

            {{ Form::open(array('url'=>'index/comentario', 'class'=>'form-group, form-control, form-horizontal')) }}

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    {{Form::text('nombre','',
                                      array(
                                              'class'=>'form-control',
                                              'placeholder'=>'Nombre y apellidos'))}}
                </div>

            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-comment"></span>
                    </div>
                    {{Form::textarea('comentario', '',
                                            array(
                                                    'class' =>'form-control',
                                                    'size'=>'50x6')) }}

                </div>
            </div>

            <div class="form-group">

                <button class="btn btn-success">
                    <i class="fa fa-sign"></i>  Publicar!
                </button>
            </div>

            {{Form::close()}}
        </div>
    </div>
@stop


