<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titulo')</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="js/navbar.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span><strong> Donde Luchito</strong>
                    </a>
                </li>

                <li>
                    <a href="{{action('DashboardController@mostrarDashboard')}}">Dashboard<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></a>
                </li>

                <li>
                    <a href="{{action('VentasController@mostrarVistaVentas')}}">Ventas<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                </li>

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Inventario<span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="{{action('ProductosController@mostrarFormProducto')}}" style="color: black">Registrar Producto<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
                        <li><a href="{{action('ProductosController@mostrarProductos')}}" style="color: black">Stock Disponible<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="#" style="color: black">Registrar Cliente<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
                        <li><a href="#" style="color: black">Lista de Clientes<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">About</a>
                </li>

                <li>
                    <a href="#">Cuentas<span class="glyphicon glyphicon-usd" aria-hidden="true"></span></a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="row">
                    <div class="col-lg-12">
                        @yield('contenido')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    @include('layouts.widgets')
</body>

</html>
