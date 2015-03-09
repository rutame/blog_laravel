<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="img/png" href="{{asset('favicon.png')}}">
    <title>Blog Laravel @yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    {{ HTML::style('css/bootstrap.min.css', array('media' => 'screen')) }}
    <!-- Optional theme -->
    {{ HTML::style('css/bootstrap-theme.min.css', array('media' => 'screen')) }}
    <!-- jQueryUI CSS -->
    {{ HTML::style('css/jquery-ui.css', array('media' => 'screen')) }}

    <!-- Personalizado -->
    {{ HTML::style('css/modificaciones.css', array('media' => 'screen')) }}
    {{ HTML::style('font-awesome-4.3.0/css/font-awesome.min.css', array('media' => 'screen')) }}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="pagina">
    @include('layout.menu')

    <div class="container-fluid">
        @include('layout.mensajes')

        <div class="row">

            <div class="col-sm-9 col-md-9">
                @yield('content')
             </div>

            <div class="col-sm-3 col-md-3">
                <br/>
                @include('layout.sidebar')
            </div>

        </div>
    </div>


<div class="relleno"></div>
</div>
{{--Pie de pagina--}}

<div class="navbar navbar-inverse navbar-fixed-bottom hidden-xs">
    <div class="row">
        <div class="col-lg-12 text-center">
        <footer class="footer">
        <p class="centra"><i class="fa fa-angellist"></i> Pedro Gabriel Manrique Gutiérrez <i class="fa fa-copyright"></i> 2015</p>
        </footer>
        </div>
    </div>
</div>
    <!-- El jQuery y el javascript de bootstrap 3 -->
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

@yield('javascript')

</body>
</html>