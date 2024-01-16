<!-- un controllers para el login, registrar usuario , admin => editar Peliculas, listarPeliculas , listarUsuarios-->
<?php
    include "../controllers/controllersUsuario.php";
    $accion=$_REQUEST['ctl'] ?? 'login';
    switch ($accion) {
        case 'login':
            (new controllersUsuario())->login();
            break;
        case 'register':
            (new controllersUsuario())->registarUsuario();
            break;
        case 'logout':
            (new controllersUsuario())->logout();
            break;
        case 'añadir':
            (new controllersUsuario())->añadirPelicula();
            break;
        case 'borrar':
            (new controllersUsuario())->eliminarPelicula();
            break;
        case 'editar':
            (new controllersUsuario())->editarPelicula();
            break;
        case 'editarActores':
            (new controllersUsuario())->editarActorAztrizDirector();
            break;
        case 'borrarActores':
            (new controllersUsuario())->eliminarActorActrizDirector();
            break;
        case 'añadirActores':
            (new controllersUsuario())->crearActorAztrizDirector();
            break;
            (new controllersUsuario())->eliminarUsuario();
            break;
        case 'recuperarPassword':
            (new controllersUsuario())->recuperarPassword();
            break;
        case 'adminPrincipal':
            include "../../admin/html/index.php";
            break;
        case 'peliculas':
            (new controllersUsuario())->listarPeliculas();
            break;
        case 'usuarios':
            (new controllersUsuario())->listarUsuarios();
            break;
        case 'actoresactricesdirectores':
            (new controllersUsuario())->listarActoresActricesDirector();
            break;
        default:
            break;
    }
?>