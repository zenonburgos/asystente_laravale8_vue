<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
    <meta name="author" content="Incanatoit.com">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Sistema Ventas - IncanatoIT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Escritorio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Configuraciones</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <notification :notifications="notifications"></notification>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        
        @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('plantilla.sidebarvendedor')
            @elseif (Auth::user()->idrol == 3)
                @include('plantilla.sidebarcontrolinterno')
            @else

            @endif

        @endif

        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>

    </div> <!-- /Fin de App -->

    <footer class="app-footer">
        <span><a href="http://www.incanatoit.com/">IncanatoIT</a> &copy; 2017</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.incanatoit.com/">IncanatoIT</a></span>
    </footer>

    <script src="js/app.js"></script>
    <!-- Bootstrap and necessary plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="js/Chart.min.js"></script>
    <!-- GenesisUI main scripts -->
    <script src="js/template.js"></script>
    <script src="js/sweetalert2.all.js"></script>
</body>

</html>