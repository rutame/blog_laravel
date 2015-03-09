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
    <table class="table table-striped table-hover table-condensed table-responsive">
        <tr>
            <th colspan="2">Acción</th>
            <th>Titulo</th>
            <th>Resumen</th>
            <th>Creado</th>
            <th>Actualizado</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td><a href="{{url('posts/'.$post->id.'/edit')}}" class="btn fa fa-edit fa-fw"></a></td>
                {{--<td><a href="{{HTML::linkRoute('posts/'.$post->id.'/edit')}}" class="btn fa fa-edit fa-fw"></a></td>--}}
                <td>
                    {{ Form::open(array('url'=>'posts/'.$post->id, 'method'=>'delete')) }}
                    <button class="btn fa fa-trash-o fa-fw"></button>
                    {{ Form::close() }}
                </td>
                <td>{{ $post->titulo }}</td>
                <td>{{ $post->resumen }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        @endforeach
    </table>
    {{$posts->links()}}
    </div>

@stop