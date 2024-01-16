<!--un controllers para la informacion de la Peliculas, las butacas y la factura-->
<?php
    include "controllersPeliculas.php";
    $accion=$_REQUEST['ctl'] ?? 'default';
    switch ($accion) {
        case 'id=1':
            include "app/views/informacionPelicula.php";
           (new controllersPeliculas())->mostrar_65();
            break;
        case 'id=2':
            include "app/views/informacionPelicula.php";
           (new controllersPeliculas())->mostrar_fast_furious();
           
            break;
        case 'id=3':
            include "app/views/informacionPelicula.php";
           (new controllersPeliculas())->mostrar_air();
            break;
        case 'id=4':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_guardianes_galaxia();
            break;
        case 'id=5':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_transformers();
            break;
        case 'id=6':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_godzilla_kong();
            break;
        case 'id=7':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_sawx();
            break;
        case 'id=8':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_spiderman();
            break;
        case 'id=9':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_aquaman();
            break;
        case 'id=10':
            include "app/views/informacionPelicula.php";
            (new controllersPeliculas())->mostrar_sirena();
            break;
        case 'butacas':
            include "app/views/salaButacas.php";
            break;
        case 'butacas_2':
            include "app/views/salaButacas2.php";
            break;
        case 'factura':
            include "app/views/facturaEntrada.php";
            break;
        case 'biblioteca':
            include "app/views/bibliotecaPelicula.php";
            break;
        case 'register':
            break;
        case 'inicio_2':
            include "app/views/inicio_2.php";
            break;
        default:
            include "app/views/inicio.php";
            //(new controllersPeliculas())->listar();
            //unset($_SESSION['peliculas']);
            break;
    }
?>