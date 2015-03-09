@extends('layout.layout')

@section('content')

<div class="container"> {{-- comienza el contenedor principal --}}


        @if(Session::has('mensaje'))

            <div class="alert alert-danger alert-dismissable" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{$mensaje}}</strong>
            </div>

        @endif

    <div class="row"> {{--comienza la fila superior--}}

        <div class="container col-sm-9">
            <div class="well">
                <h1>Esto es acerca de nosotros</h1>

                <p class="lead">
                    <img class="img-responsive img-thumbnail img-square pull-left"
                         src="http://lorempixel.com/120/120/people" alt="" />
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus ex ipsa itaque nostrum obcaecati reiciendis? Accusantium ad assumenda commodi, enim excepturi odio quia, reiciendis rerum sint totam voluptatem voluptatibus!
                </p>
            </div>
        </div>

        <div class="container col-sm-3">
            <div class="well">
                <address>
                    <strong>Twitter, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>

                <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                </address>
            </div>
        </div>

    </div> {{--acaba fila primera--}}


    <div class="row">{{-- comienza la segunda fila--}}
        <div class="container col-sm-6">
            {{Form::open(array('url'=>'contacto', 'method'=>'post', 'files'=> true))}}


            {{Form::text('nombre',null, array('placeholder'=>'nombre', 'class'=>'form-group form-control')) }}

            @if($errors->has())
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->get('nombre') as $mensaje )
                        <strong>{{$mensaje}}</strong>
                    @endforeach
                </div>
            @endif

            {{Form::text('email',null, array('placeholder'=>'email', 'class'=>'form-group form-control')) }}

            @if($errors->has())
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->get('email') as $mensaje )
                        <strong>{{$mensaje}}</strong>
                    @endforeach
                </div>
            @endif

            {{Form::textarea('comentarios',null, array('class'=>'form-control', 'size'=>'5x3'))}}

            @if($errors->has())
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->get('comentarios') as $mensaje )
                        <strong>{{$mensaje}}</strong>
                    @endforeach
                </div>
            @endif
    <br />
            {{Form::submit('button', array('class'=>'btn btn-success form-control'))}}
            {{Form::close()}}
        </div>
        <br />

</div>{{-- acaba la segunda fila--}}

</div>{{-- acaba el contenedor global--}}
@stop