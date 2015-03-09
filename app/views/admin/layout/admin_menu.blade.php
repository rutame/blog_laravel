<nav class="nav nav-tabs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#expande">
                <span class="sr-only">Cambia navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">Blog Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="expande">
            <ul class="nav navbar-nav">
                <li><a href="#">Accion</a></li>
                <li><a href="{{url('categoria')}}">Categorías</a></li>
                <li><a href="{{URL::to('acercade/')}}">Acerca de</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-nav navbar-right">
                <li><a href="{{url('login')}}">Login</a></li>
            </ul>
        </div>

    </div>
</nav>