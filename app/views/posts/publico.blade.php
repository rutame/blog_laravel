@extends('layout.layout_publico')

@section('content')
    <h1 class="page-header"><a href="{{url('index')}}">Blog Laravel</a>
        <small>/ Tu Blog!</small></h1>
        @foreach($posts as $post)


            <article>

                <header class="header">
                    <h1 class="page-header text-success">{{$post->titulo}}</h1>
                    <h2><a href="{{url('index/ver/'.$post->id)}}">{{$post->resumen}}</a></h2>
                        <p>
                            <i class="fa fa-clock-o fa-fw"></i>Publicado el {{$post->fecha}}
                            Categoría: {{ $post->categoria->nombre }}
                            @if(Auth::check())
                                <i  class="fa fa-edit"></i>
                                <a href="{{url('posts/'.$post->id.'/edit')}}"> Editar</a>
                            @endif
                        </p>
                    <div class="thumbnail">
                    <img src="{{ asset( $post->foto ) }}" class=" img-responsive"></div>
                </header>
                <section id="descripcion">
                    <p>{{ substr($post->cuerpo, 0, 440) }}</p>
                    <div class="difumina"></div>
                </section>
                <footer>
                <a href="{{url('index/ver/'.$post->id)}}" class="btn">
                    <i class="fa fa-forward fa-fw"></i>
                    Saber más
                </a>
                </footer>

            </article>
            <hr />
            @endforeach

@stop


