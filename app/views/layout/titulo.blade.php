<header class="header">
    <h1 class="page-header text-success">{{$post->titulo}}</h1>
    <h3><a href="">{{$post->resumen}}</a></h3>
    <p>
        <i class="fa fa-clock-o fa-fw"></i>Publicado el {{$post->fecha}}
        Categoría: <a href="{{ url('index/categoria/'.$post->categoria->id )}}">
            {{$post->categoria->nombre }}
        </a>
        @if(Auth::check())
            <i  class="fa fa-edit"></i>
            <a href="{{url('posts/'.$post->id.'/edit')}}"> Editar</a>
        @endif
    </p>
</header>