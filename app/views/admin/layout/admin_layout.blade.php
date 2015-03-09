<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Laravel</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/personalizado.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">

@include('admin.layout.admin_sidebar')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @yield('content')
            </div>
        </div>
    </div>
</div>

</div> <!-- /#page-content-wrapper -->
{{--<footer>
    <div class="navbar navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="row">
            <div class="col-lg-12 text-center">
                <i class="fa fa-angellist"></i>
                <p class="centra">Pedro Gabriel Manrique Gutiérrez 2015</p>
            </div>
        </div>
    </div>
</footer>--}}




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>


</body>
</html>