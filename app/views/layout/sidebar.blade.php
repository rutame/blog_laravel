{{-- las categorías--}}
<div class="panel panel-success">
    <div class="panel-heading">
        <h5>Categorías</h5>
    </div>

    <div class="panel-body">
        <ul class="list-unestyled">
            @foreach($categorias as $categoria)
            <li class="list-item-success">
            <a href="{{ asset('index/categoria/'.$categoria->id) }}">{{ $categoria->nombre }}</a>
            </li>
            @endforeach
        </ul>
    </div>

</div>
<div class="panel panel-danger">
    <div class="panel-heading">
        Etiquetas
    </div>
    <div class="panel-body">
        @foreach($tags as $tag)
           <a href="{{url('index/tag/'.$tag->id)}}">{{$tag->nombre}}</a>
        @endforeach
    </div>
</div>

