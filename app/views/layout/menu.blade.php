<nav class="navbar navbar-inverse">

    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Las rallitas -->
            <button type="button" class="navbar-toggle collapsed" data-target="#menu_collapse" data-toggle="collapse">
                <span class="sr-only">Cambia Nav</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- El Logotipo -->
            <a class="navbar-brand" href="{{url('index')}}">
                <i class="fa fa-angellist fa-fw"></i>
                Blog Laravel
                <!-- <img alt="Logotipo" src=""> -->
            </a>
        </div>
        <!-- Todos los enlaces de navegación -->
        <div class="navbar-collapse collapse" id="menu_collapse">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li @if(Request::is('categorias') || Request::is('categorias/*'))class='active' @endif>
                        <a href="{{ URL::to('categorias') }}">Categorías</a>
                    </li>

                    <li @if(Request::is('posts') || Request::is('posts/*'))class='active' @endif>
                        <a href="{{ URL::to('posts') }}">posts</a>
                    </li>

                    <li @if(Request::is('usuarios') || Request::is('usuarios/*'))class='active' @endif>
                        <a href="{{ URL::to('usuarios') }}">Usuarios</a>
                    </li>

               {{--  No está validado --}}
                @else
                    <li @if(Request::is('/'))class='active' @endif>
                        <a href="{{ URL::to('index') }}">Inicio</a>
                    </li>

                    <li @if(Request::is('contacto'))class='active' @endif>
                        <a href="{{ URL::to('contacto') }}">Contacto</a>
                    </li>

                    <li @if(Request::is('acercade'))class='active' @endif>
                        <a href="{{ URL::to('acercade') }}">Acerca de</a>
                    </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right dropdown">
                @if( Auth::user() )
                    <li>

                        <img src="{{asset('images/perfiles/'.Auth::user()->username.'/'.Auth::user()->username.'.jpg')}}" class="img-thumbnail perfil">
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="nav navbar-nav dropdown-menu"
                            role="menu" aria-labelledby="dLabel">
                            <li class="fa fa-op">
                                <a href="{{asset('logout')}}">
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{asset('login')}}">Acceso</a></li>
                    <li><a href="{{asset('usuarios/create')}}">Registro</a></li>
                @endif

            </ul>

        </div>
    </div>
</nav>




