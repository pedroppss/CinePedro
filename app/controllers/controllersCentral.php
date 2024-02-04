<!--un controllers para la informacion de la Peliculas, las butacas y la factura-->
<?php
    session_start();
    include "controllersPeliculas.php";
    $accion=$_REQUEST['ctl'] ?? 'default';
    // var_dump($_REQUEST);
    // exit();

    switch ($accion) {
        case 'id':
            $idPelicula = isset($_GET['id']) ? $_GET['id'] : '';
            (new controllersPeliculas())->mostrarPelicula($idPelicula);
            break;
        case 'compra':
            (new controllersPeliculas())->comprarEntradas();
            break;
        case 'butacas':
            (new controllersPeliculas())->butacas();
            break;
        case 'factura':
            (new controllersPeliculas())->compra();
            break;
        case 'biblioteca':
            (new controllersPeliculas())->listarpeliculas();
            break;
        case 'QR':
            (new controllersPeliculas())->realizarQR();
            break;
        case 'inicio_2':
            include "app/views/inicio_2.php";
            break;
        default:
            include "app/views/inicio.php";
            break;
    }
?>