@extends('layout.layout_publico')

@section('content')

{{--{{ var_dump($posts[0]->categoria ) }}--}}

<h1 class="page-header"><a href="{{url('index')}}">Inicio</a>

    <small>/ {{$posts[0]->categoria->nombre}}</small></h1>



        @foreach($posts as $post)


            <article>

                @include('layout.titulo')
                <img src="{{ asset( $post->foto ) }}" class="img-thumbnail img-responsive">
                <section>
                    <p>
                       {{ substr($post->cuerpo, 0, 440)}}
                    </p>
                </section>
                <footer>
                <a href="{{url('index/ver/'.$post->id)}}" class="btn">
                    <i class="fa fa-forward fa-fw"></i>
                    Saber más
                </a>
                </footer>

            </article>
            @endforeach

@stop



