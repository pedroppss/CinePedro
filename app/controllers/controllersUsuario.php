<?php
include "../models/usuario.php";
class controllersUsuario
{
    //funcion para iniciar sesion
    public function login()
    {
        $encontrado = false;
        $error = "";
        

        if (empty($_REQUEST['gmail']) && empty($_REQUEST['password'])) {
            $error = "Debes introducir el email y la contraseña, que son obligatorios";
            
        
        } else if (strlen($_REQUEST['password']) < 3) {
            $error = "La contraseña debe tener mas de 3 caracteres";
        /*
        } else if (!preg_match('/[A-Z]/', isset($_REQUEST['password']))) {
            $error = "la contraseña deber tener al menos una letra mayuscula";
        } else if (!preg_match('/[a-z]/', isset($_REQUEST['password']))) {
            $error = "la contraseña deber tener al menos una letra minúscula";
        */
        }
        if (!empty($error)) {
            include "../views/login_register_header.php";
            include "../views/login.php";
            return $error;
        }

        $usuario = new Usuario();
        $_SESSION['usuarios'] = $usuario->login($_REQUEST['gmail'], $_REQUEST['password']);

        if ($_SESSION['usuarios'] == false) {
            //var_dump('no conectado');
            $error = "Credenciales inválidas. Por favor, verifica tu email y contraseña.";
            include "../views/login_register_header.php";
            include "../views/login.php"; 
            return;
        } else {
            $encontrado = true;
            if ($_SESSION["usuarios"]["rol"] == "cliente") {

                include "../views/pagcliente.php";
            } else {
                include "../views/pagadmin.php";
                //var_dump($_SESSION["usuarios"]);
                //var_dump($_SESSION["usuarios"]['avatar']);
            }
        }
        return $error;
    }
    //funcion para registrar un usuario nuevo
    public function registarUsuario()
    {
        
        $error="";
        $usuario = new Usuario();
      
        if (empty($_REQUEST['nombre']) || empty($_REQUEST['apellidos']) || empty($_REQUEST['password']) || empty($_REQUEST['nif']) || empty($_REQUEST['gmail'])) 
        {
            $error="Todos los campos debe ser obligatorios";

        }else
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['password']) && isset($_REQUEST['nif']) && isset($_REQUEST['gmail'])){

            $usuario->registar($_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['password'], $_REQUEST['nif'], $_REQUEST['gmail']);
            $error= "Registro con exito";
            //ControllerCorreo::enviarCorreo("pedroentornocliente@gmail.com",$_REQUEST['gmail']);
        }
        if (!empty($error)) {
            include "../views/login_register_header.php";
            include "../views/register.php";
        }
        return $error;
        
    }
    //funcion para cerrar sesion
    public function logout()
    {

        include "../views/login_register_header.php";
        include "../views/login.php";
        //session_destroy();
    }
    public function recuperarPassword()
    {
        include "../views/recuperarPassword.php";
    }
    //funcion para añadir una pelicula nueva, solo puede hacer el administrador
    public function añadirPelicula()
    {
        
        $usuario = new Usuario();
        $error="";
        if (
            !empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['argumento']) && !empty($_REQUEST['clasificacion']) && !empty($_REQUEST['ano']) && !empty($_REQUEST['duracion']) && !empty($_REQUEST['edad'])
            && !empty($_REQUEST['genero_id']) && !empty($_FILES['imagen']) && !empty($_REQUEST['actor/actriz']) && !empty($_REQUEST['director'])
        ) {
            $imagenP = $_FILES['imagen']['name'];

            if (in_array($_FILES['imagen']['type'], ['image/jpeg', 'image/png', 'image/jpg'])) {
                $rutaDestinoPelicula = "../../app/images/carteles/$imagenP";
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestinoPelicula);
                $usuario->añadir(
                    $_REQUEST['nombrePelicula'],
                    $_REQUEST['argumento'],
                    $_REQUEST['clasificacion'],
                    $_REQUEST['ano'],
                    $_REQUEST['duracion'],
                    $_REQUEST['edad'],
                    $_REQUEST['genero_id'],
                    $imagenP
                );
                $usuario->meteractrizactor($_REQUEST['actor/actriz'], $_REQUEST['nombrePelicula']);
                $usuario->meterdirector($_REQUEST['director'], $_REQUEST['nombrePelicula']);
                $error= "Se ha creado correctamente";
            } else {
                $error= "Formato de imagen no valido";
            }
        } else {
            $error= "debes introducir todos los campos que son obligatorios";
        }
        if (!empty($error)) {
            include "../../admin/html/CrearPelicula.php";
        }
        return $error;
    }
     //funcion para eliminar una pelicula, solo puede hacer el administrador
    public function eliminarPelicula()
    {
        $error="";
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombrePelicula'])) 
        {
            if($usuario->existePelicula($_REQUEST['nombrePelicula'])){
                $usuario->eliminar($_REQUEST['nombrePelicula']);
                $error="Se ha borrado la pelicula correctamente";
            }else{
                $error="No se ha borrado la pelicula porque no existe ninguna pelicula con ese nombre";
            }
        } else {
            $error="Introduce ese campo que es obligatorio";
        }
        if(!empty($error))
        {
            include "../../admin/html/borrarPelicula.php";
        }
        return $error;
    }
     //funcion para añadir una usuario, solo puede hacer el administrador
    public function eliminarUsuario()
    {
        $error="";
        
        $usuario = new Usuario();
        if (!empty($_REQUEST['correoUsuario']) || !empty($_REQUEST['nombreUsuario'])) {
            if($usuario->existeUsuario($_REQUEST['correoUsuario'], $_REQUEST['nombreUsuario'])){
                $usuario->eliminarusuario($_REQUEST['correoUsuario'], $_REQUEST['nombreUsuario']);
                $error= "Se ha borrado el usuario correctamente";
            }else{
                $error= "No se ha borrado el usuario porque no existe en la base de datos";
            }  
        } else {
            $error="Debes introducir estos campos porque son obligatorios";
        }
        if(!empty($error))
        {
            include "../../admin/html/eliminarCuentasUsuarios.php";
        }
        return $error;
    }
     //funcion para añadir un actor o actriz o Director, solo puede hacer el administrador
    public function eliminarActorActrizDirector()
    {
        $error="";
        
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombreActorActrizDirector'])) {
            if($usuario->existeActorActrizDirector($_REQUEST['nombreActorActrizDirector'])){
                $usuario->eliminaractoractrizdirector($_REQUEST['nombreActorActrizDirector']);
                $error= "Se ha borrado correctamente";
            }else{
                $error="No se ha borrado porque no existe en la base de datos";
            }
            
        } else {
            $error= "Introduce ese campo porque es obligatorio";
        }
        if(!empty($error))
        {
            include "../../admin/html/borrarActores.php";
        }
        return $error;
    }
     //funcion para editar una pelicula, solo puede hacer el administrador
    public function editarPelicula()
    {
        $error="";
        
        $usuario = new Usuario();
        if (
            !empty($_REQUEST['nombrePelicula']) || !empty($_REQUEST['argumento']) || !empty($_REQUEST['clasificacion']) || !empty($_REQUEST['ano']) || !empty($_REQUEST['duracion']) || !empty($_REQUEST['edad'])
            || !empty($_REQUEST['genero_id'])
        ) {
             $usuario->editar(
                $_REQUEST['nombrePelicula'],
                $_REQUEST['argumento'],
                $_REQUEST['clasificacion'],
                $_REQUEST['ano'],
                $_REQUEST['duracion'],
                $_REQUEST['edad'],
                $_REQUEST['genero_id']
            );
            $error= "Se ha editado la pelicula exitosamente";
        } else {
            $error="No se ha editado la pelicula,tienes que introducir los campos que son obligatorios";
        }
        if (!empty($error)) {
            include "../../admin/html/editarPelicula.php";
        }
        return $error;

        //$_SESSION['usuarios']=$usuario->editar($_REQUEST['nombrePelicula'],$_REQUEST['argumento']);
    }
     //funcion para editar un actor  o actriz o Director, solo puede hacer el administrador
    public function editarActorAztrizDirector()
    {
        $error="";
        
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombreActorActrizDirector']) && !empty($_REQUEST['tipo'])) {
            $usuario->editaractoractrizdirector($_REQUEST['nombreActorActrizDirector'], $_REQUEST['tipo']);
            $error= "Se ha editado exitosamente";
        } else {
            $error= "no se ha editado";
        }
        if (!empty($error)) {
            include "../../admin/html/editarActores.php";
        }
        return $error;
    }
     //funcion para añadir un actor  o actriz o Director nuevo, solo puede hacer el administrador
    public function crearActorAztrizDirector()
    {
        $error="";
        
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombreActorActrizDirector']) && !empty($_REQUEST['tipo']) && !empty($_FILES['imagen'])) {
            $nombreAD = $_REQUEST['nombreActorActrizDirector'];
            $tipoAD = $_REQUEST['tipo'];
            $imagenAD = $_FILES['imagen']['name'];
            //verificamos si el tipo de archivo  es una imagen permitida
            if (in_array($_FILES['imagen']['type'], ['image/jpeg', 'image/png', 'image/jpg'])) {
                if ($_REQUEST['tipo'] == 'Director') {
                    //la imagen va a la carpeta de imagenes "directores si el tipo es director.
                    $rutaDestino = "../../app/images/directores/$imagenAD";
                    move_uploaded_file($_FILES['imagen']["tmp_name"], $rutaDestino);
                    $usuario->anadiractoractrizdirector($nombreAD, $tipoAD, $imagenAD);
                } else {
                    //la imagen va a la carpeta de imagenes "actores" si el tipo es actor o actriz.
                    $rutaDestino = "../../app/images/actores/$imagenAD";
                    move_uploaded_file($_FILES['imagen']["tmp_name"], $rutaDestino);
                    $usuario->anadiractoractrizdirector($nombreAD, $tipoAD, $imagenAD);
                }

                $error= "Se ha creado correctamente";
            } else {
                $error= "Formato de imagen no valido";
            }
        } else {
            $error= "Por favor,completa todos los campos";
        }
        if (!empty($error)) {
            include "../../admin/html/crearActores.php";
        }
        return $error;
    }
    //funcion para activar o desactivar usuario, solo puede hacer el administrador
    public function activadesactivarUsuarios()
    {
        $error="";
        //include "../../admin/html/activar_desactivarUsuarios.php";
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombreUsuario'])) {
            
            $usuario->usuario($_REQUEST['nombreUsuario']);
            $error="Se ha activado o desactivado correctamente";
        }else{
            $error="Introduce ese campo que es obligatorio";
        }
        if (!empty($error)) {
            include "../../admin/html/activar_desactivarUsuarios.php";
        }
        return $error;
    }
    //funcion para asiganr roles a los usuarios, solo puede hacer el administrador
    public function asignarRolesUsuarios()
    {
        $error="";
        $usuario = new Usuario();
        if (!empty($_REQUEST['nombreUsuario']) && !empty($_REQUEST['roles'])) {
            $usuario->asignar($_REQUEST['nombreUsuario'], $_REQUEST['roles']);
            $error= "Se asignado el rol correctamente";
        } else {
            $error= "no se ha asignado el rol";
        }
        if (!empty($error)) {
            include "../../admin/html/asignarRolesUsuarios.php";
        }
        return $error;
    }
    //funcion para gerstionar Salas-Sesiones, solo puede hacer el adminitrador
    public function gestionarSalasSesiones()
    {
        $error="";
        
        $usuario = new Usuario();

        if (
            !empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['nombreSala']) && !empty($_REQUEST['fecha'])
            && !empty($_REQUEST['horaSesion']) && !empty($_REQUEST['precio'])
        ) {
            $nombrePelicula = $_REQUEST['nombrePelicula'];
            $nombreSala = $_REQUEST['nombreSala'];
            $fecha = $_REQUEST['fecha'];
            $horaSesion = $_REQUEST['horaSesion'];
            $precio = $_REQUEST['precio'];

            if (!$usuario->existeSesion($nombrePelicula, $nombreSala, $fecha, $horaSesion)) {
                $usuario->asignarsalassesiones($nombrePelicula, $nombreSala, $fecha, $horaSesion, $precio);
                $error= "Se ha asignado una sala-sesión nueva correctamente";
            } else {
                $error= "Ya existe una sala-sesión con los mismos detalles";
            }
        } else {
            $error= "No se han proporcionado todos los datos necesarios";
        }
        if (!empty($error)) {
            include "../../admin/html/gestionarSalasSesiones.php";
        }
        return $error;
    }
    //funcion para listar todas las peliculas que hay en la base de datos,solo puede ver el administrador
    public function listarPeliculas()
    {


        $usuario = new Usuario();
        $_SESSION['peliculas'] = $usuario->listarPeliculas();
        include "../../admin/html/listado.php";
        //var_dump($_SESSION['peliculas']);
    }
    //funcion para listar todos los usuarios que hay en la base de datos,solo puede ver el administrador
    public function listarUsuarios()
    {


        $usuario = new Usuario();
        $_SESSION['usuarios'] = $usuario->listarUsuarios();
        include "../../admin/html/listadoUsuario.php";
        //var_dump($_SESSION['usuarios']);
    }
    //funcion para listar todas los actores,actrices y directores que hay en la base de datos,solo puede ver el administrador
    public function listarActoresActricesDirector()
    {


        $usuario = new Usuario();
        $_SESSION['actores'] = $usuario->listarActores();
        $_SESSION['actrices'] = $usuario->listarActrices();
        $_SESSION['directores'] = $usuario->listarDirector();
        include "../../admin/html/listadoActoresActricesDirectores.php";
        //var_dump($_SESSION['actores']);
        //var_dump($_SESSION['actrices']);
        //var_dump($_SESSION['directores']);
    }
    //funcion para listar todas las Salas-sesiones que hay en la base de datos,solo puede ver el administrador
    public function listarSalas()
    {
        $usuario = new Usuario();
        $_SESSION['salas'] = $usuario->listasalas();
        include "../../admin/html/listadoSalas.php";
    }
}
