@extends('layout.basicos.admin_layout')

@section('content')
    <div class="page-header">
        <h1>Categorías</h1>
    </div>

<div role="tabpanel">

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active categoria">
            <a href="#home" aria-controls="home" data-toggle="tab">
                <i class="glyphicon glyphicon-inbox"></i>
                Categoria
            </a>
        </li>
        <li role="presentation" class="edit">
            <a href="#edit" aria-controls="edit" data-toggle="tab" onClick="secondTab()">
                <i class="glyphicon glyphicon-edit"></i>
                 Editar
            </a>
        </li>
        <li role="presentation" class="new">
            <a href="#new" aria-controls="new" data-toggle="tab" onClick="thirdTab()">
                <i class="glyphicon glyphicon-new-window"></i>
                 Nuevo
            </a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="header">Categoría: {{$categoria->nombre}}
                    <span class="badge pull-right">{{$categoria->id}}</span>
                </h3>

                </div>
                <div class="panel-body">
                    <p class="lead">{{$categoria->descripcion}}</p>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="edit">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3>Editar categoría</h3>
                </div>
                <div class="panel-body">
                    {{Form::model($categoria, array('url'=> 'admin/categorias/'.$categoria->id, 'method' => 'put') )}}
                    <div class="input-group form-group">
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-flag"></span>
                        </span>
                    {{Form::text('nombre', $categoria->nombre, array('class'=>'form-control'))}}
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-comment"></span>
                        </span>
                    {{Form::textarea('descripcion',$categoria->descripcion ,
                    array('class'=>'form-group form-control', 'size' => '50x8'))}}
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                         Enviar
                    </button>
                    {{Form::close()}}
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="new">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3>Añadir nueva categoría</h3>
                </div>
                <div class="panel-body">
                    {{Form::open( array('url'=> 'admin/categorias/'.$categoria->id, 'method' =>'post') )}}
                    <div class="input-group form-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-flag"></span>
                        </span>
                    {{Form::text('nombre', null, array('class'=>'form-control'))}}
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-comment"></span>
                        </span>
                    {{Form::textarea('descripcion',null ,
                    array('class'=>'form-group form-control', 'size' => '50x8'))}}
                    </div>
               </div>
                <div class="panel-footer">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        Enviar
                    </button>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>{{-- cierra tab-content--}}

</div>

@stop