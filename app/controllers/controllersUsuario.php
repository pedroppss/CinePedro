<?php
include "../models/usuario.php";
class controllersUsuario{
    public function login()
    {
        $encontrado=false;
        $error="";
        isset($_SESSION)?:session_start();
       
        if(empty($_REQUEST['gmail']) && empty($_REQUEST['password']))
        {
            
            include "../views/login_register_header.php";
            include "../views/login.php";
            $error= "Debes introducir el email y la contraseña que son obligatorios";
            return;
            
        }else if(isset($_REQUEST['password'])<3  && isset($_REQUEST['gmail']))
        {
            $error="La contraseña debe tener mas de 3 caracteres";
        }else if(!preg_match('/[A-Z]/',isset($_REQUEST['password'])))
        {
            $error="la contraseña deber tener al menos una letra mayuscula";
        }else if(!preg_match('/[a-z]/',isset($_REQUEST['password'])))
        {
            $error="la contraseña deber tener al menos una letra minúscula";
        }
        $usuario=new Usuario();
        $_SESSION['usuarios']=$usuario->login($_REQUEST['gmail'],$_REQUEST['password']);

        if($_SESSION['usuarios']==false)
            {
                //var_dump('no conectado');
                
                include "../views/login_register_header.php";
                include "../views/login.php";
            }else
            {
                $encontrado=true;
                if($_SESSION["usuarios"]["rol"]=="cliente"){

                    include "../views/pagcliente.php";
                }else{
                    include "../views/pagadmin.php";
                    //var_dump($_SESSION["usuarios"]);
                    //var_dump($_SESSION["usuarios"]['avatar']);
                }
            
            }   
        return $error;
    }
    public function registarUsuario()
    {
        include "../views/login_register_header.php";
        include "../views/register.php";
        $usuario=new Usuario();
        if(!isset($_REQUEST['nombre']) || !isset($_REQUEST['apellidos']) || !isset($_REQUEST['password']) || !isset($_REQUEST['nif']) || !isset($_REQUEST['gmail']))
        {
            echo "Todos los campos debe ser obligatorios";

        }else{
            
        $_SESSION['usuarios']=$usuario->registar($_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['password'],$_REQUEST['nif'],$_REQUEST['gmail']);
        //ControllerCorreo::enviarCorreo("pedroentornocliente@gmail.com",$_REQUEST['gmail']);
        }
    }
    public function logout(){
    
        include "../views/login_register_header.php";
        include "../views/login.php";
        //session_destroy();
    }
    public function recuperarPassword(){
        include "../views/recuperarPassword.php";
    }
    public function añadirPelicula()
    {
            include "../../admin/html/CrearPelicula.php";
            $usuario=new Usuario();
            if(!empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['argumento']) && !empty($_REQUEST['clasificacion']) && !empty($_REQUEST['ano']) && !empty($_REQUEST['duracion']) && !empty($_REQUEST['edad'])
            && !empty($_REQUEST['genero_id']) && !empty($_FILES['imagen']) && !empty($_REQUEST['actor/actriz']) && !empty($_REQUEST['director']))
            {
                $imagenP=$_FILES['imagen']['name'];

                if(in_array($_FILES['imagen']['type'],['image/jpeg','image/png','image/jpg']))
                {
                    $rutaDestinoPelicula = "../../app/images/carteles/$imagenP";
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$rutaDestinoPelicula);
                    $usuario->añadir($_REQUEST['nombrePelicula'],$_REQUEST['argumento'],$_REQUEST['clasificacion'],$_REQUEST['ano'],$_REQUEST['duracion'],$_REQUEST['edad'],
                    $_REQUEST['genero_id'],$imagenP);
                    $usuario->meteractrizactor($_REQUEST['actor/actriz'],$_REQUEST['nombrePelicula']);
                    $usuario->meterdirector($_REQUEST['director'],$_REQUEST['nombrePelicula']);
                    echo "Se ha creado correctamente";
                }else
                {
                    echo "Formato de imagen no valido";
                }
               
            }else{
                echo "debes introducir todos los campos que son obligatorios";
            }
    }
    public function eliminarPelicula()
    {
        include "../../admin/html/borrarPelicula.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombrePelicula']))
        {
            $_SESSION['pelicula']=$usuario->eliminar($_REQUEST['nombrePelicula']);     
            echo "Se ha borrado la pelicula correctamente";

        }else{
            echo "No se ha borrado la pelicula";
        }
               
    }
    public function eliminarUsuario()
    {
        include "../../admin/html/eliminarCuentasUsuarios.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['correoUsuario'])&&!empty($_REQUEST['nombreUsuario']))
        {
            $usuario->eliminarusuario($_REQUEST['correoUsuario'],$_REQUEST['nombreUsuario']);     
            echo "Se ha borrado el usuario correctamente";

        }else{
            echo "No se ha borrado el usuario";
        }
    }
    public function eliminarActorActrizDirector()
    {
        include "../../admin/html/borrarActores.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombreActorActrizDirector']))
        {
            $usuario->eliminaractoractrizdirector($_REQUEST['nombreActorActrizDirector']);
            echo "Se ha borrado correctamente";
        }else{
            echo "No se ha borrado";
        }
    }
    public function editarPelicula()
    {
        include "../../admin/html/editarPelicula.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['argumento']) && !empty($_REQUEST['clasificacion']) && !empty($_REQUEST['ano']) && !empty($_REQUEST['duracion']) && !empty($_REQUEST['edad'])
            && !empty($_REQUEST['genero_id']))
            {
                $_SESSION['pelicula']=$usuario->editar($_REQUEST['nombrePelicula'],$_REQUEST['argumento'],$_REQUEST['clasificacion'],$_REQUEST['ano'],$_REQUEST['duracion'],$_REQUEST['edad'],
                $_REQUEST['genero_id']);
                echo "Se ha editado la pelicula exitosamente";
            }
            else{
                echo "No se ha editado la pelicula";
            }
            
        //$_SESSION['usuarios']=$usuario->editar($_REQUEST['nombrePelicula'],$_REQUEST['argumento']);
    }
    public function editarActorAztrizDirector()
    {
        include "../../admin/html/editarActores.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombreActorActrizDirector']) && !empty($_REQUEST['tipo']))
        {
            $usuario->editaractoractrizdirector($_REQUEST['nombreActorActrizDirector'],$_REQUEST['tipo']);
            echo "Se ha editado exitosamente";
        }else{
            echo "no se ha editado";
        }

    }
    public function crearActorAztrizDirector()
    {
        include "../../admin/html/crearActores.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombreActorActrizDirector']) && !empty($_REQUEST['tipo']) && !empty($_FILES['imagen']))
        {
            $nombreAD=$_REQUEST['nombreActorActrizDirector'];
            $tipoAD=$_REQUEST['tipo'];
            $imagenAD=$_FILES['imagen']['name'];
            //verificamos si el tipo de archivo  es una imagen permitida
            if(in_array($_FILES['imagen']['type'],['image/jpeg','image/png','image/jpg']))
            {
                if($_REQUEST['tipo']=='Director')
                {
                    //la imagen va a la carpeta de imagenes "directores si el tipo es director.
                    $rutaDestino="../../app/images/directores/$imagenAD";
                    move_uploaded_file($_FILES['imagen']["tmp_name"],$rutaDestino);
                    $usuario->anadiractoractrizdirector($nombreAD,$tipoAD,$imagenAD); 
                }else
                {  
                    //la imagen va a la carpeta de imagenes "actores" si el tipo es actor o actriz.
                    $rutaDestino="../../app/images/actores/$imagenAD";
                    move_uploaded_file($_FILES['imagen']["tmp_name"],$rutaDestino);
                    $usuario->anadiractoractrizdirector($nombreAD,$tipoAD,$imagenAD);
                }
                
                echo "Se ha creado correctamente";

            }else
            {
                echo "Formato de imagen no valido";
            }
        }else{
            echo "Por favor,completa todos los campos";
        }

    }
    public function activadesactivarUsuarios()
    {
        isset($_SESSION)?:session_start();
        include "../../admin/html/activar_desactivarUsuarios.php";
       
        if(!empty($_REQUEST['nombreUsuario']))
            {
                $usuario=new Usuario();
                $_SESSION['usuario']=$usuario->usuario($_REQUEST['nombreUsuario']);

            }
    }
    public function asignarRolesUsuarios()
    {
        include "../../admin/html/asignarRolesUsuarios.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombreUsuario']) && !empty($_REQUEST['roles']))
        {
            $usuario->asignar($_REQUEST['nombreUsuario'],$_REQUEST['roles']);
            echo "Se asignado el rol correctamente";
        }else{
            echo "no se ha asignado el rol";
        }
    }
    public function gestionarSalasSesiones()
    {
        isset($_SESSION)?:session_start();
        include "../../admin/html/gestionarSalasSesiones.php";
        $usuario=new Usuario();
        if(!empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['nombreSala']) && !empty($_REQUEST['fecha'])
            && !empty($_REQUEST['horaSesion']) && !empty($_REQUEST['precio']))
        {
            $usuario->asignarsalassesiones($_REQUEST['nombrePelicula'],$_REQUEST['nombreSala'],$_REQUEST['fecha'],
            $_REQUEST['horaSesion'],$_REQUEST['precio']);
            echo "se ha asignado una sala-sesion nueva correctamente";
        }else
        {
            echo "no se ha asignado la sala-sesión";
        }
        
    }
    public function listarPeliculas()
    {
        isset($_SESSION)?:session_start();
        include "../../admin/html/listado.php";
        $usuario=new Usuario();
        $_SESSION['peliculas']=$usuario->listarPeliculas();
        //var_dump($_SESSION['peliculas']);
    }
    public function listarUsuarios()
    {
        isset($_SESSION)?:session_start();
        include "../../admin/html/listadoUsuario.php";
        $usuario=new Usuario();
        $_SESSION['usuarios']=$usuario->listarUsuarios();
        //var_dump($_SESSION['usuarios']);
    }
    public function listarActoresActricesDirector()
    {
        isset($_SESSION)?:session_start();
        include "../../admin/html/listadoActoresActricesDirectores.php";
        $usuario=new Usuario();
        $_SESSION['actores']=$usuario->listarActores();
        $_SESSION['actrices']=$usuario->listarActrices();
        $_SESSION['directores']=$usuario->listarDirector();
        //var_dump($_SESSION['actores']);
        //var_dump($_SESSION['actrices']);
        //var_dump($_SESSION['directores']);
    }
    public function listarSalas(){
        isset($_SESSION)?:session_start();
        include "../../admin/html/listadoSalas.php";
        $usuario=new Usuario();
        $_SESSION['salas']=$usuario->listasalas();
    }
}
?>