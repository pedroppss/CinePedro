<?php
include_once "conexion.php";
include "../controllers/controllersCorreo.php";

class Usuario extends conexion{
   public function __construct()
   {
        parent::__construct();
   }
   public function login($gmail,$password)
   {
    try{
        $instancia=new Usuario();
        $conexion=$instancia->conexion;
        $consultasql="select correo,nombre,hash_pass,avatar,rol from usuariosc where correo=:correo";
        $enlaceDatos=$conexion->prepare($consultasql);
        $enlaceDatos->bindParam(":correo",$gmail,PDO::PARAM_STR);
        $enlaceDatos->execute();
        $usuario=$enlaceDatos->fetch(PDO::FETCH_ASSOC);
        //var_dump($usuario);
        if(password_verify($password,$usuario['hash_pass']))
        {
            $usuariocorrecto[]=$usuario;
            $usuariocorrecto['rol']=$usuario['rol'];
            $usuariocorrecto['avatar']=$usuario['avatar'];
            $usuariocorrecto['nombre']=$usuario['nombre'];
            //echo  $_SESSION["usuarios"]['nombre'];
        }else{
            $usuariocorrecto=false;
        }
        $conexion=null;
        return $usuariocorrecto;
       // return $_SESSION["usuarios"];
    }catch(PDOException $e){
        exit("Error: ".$e->getMessage());
    }
   }
   //registrar un usuario
   public function registar($nombre,$apellidos,$password,$nif,$gmail)
   {
        try
        {
            $instancia=new Usuario();
            $conexion=$instancia->conexion;
            $consultasql="insert into usuariosc (correo,nombre,apellidos,NIF,hash_pass,rol) values (:correo,:nombre,:apellidos,:nif,:pash,'cliente')";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":apellidos",$apellidos,PDO::PARAM_STR);
            $hash=password_hash($password,PASSWORD_BCRYPT);
            $enlaceDatos->bindParam(":pash",$hash,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":nif",$nif,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":correo",$gmail,PDO::PARAM_STR);
            $enlaceDatos->execute();
            $enlaceDatos->fetch(PDO::PARAM_STR);
            ControllerCorreo::enviarCorreo($gmail,"pedroentornocliente@gmail.com");


        }catch(PDOException $e)
        {
            exit("Error:".$e->getMessage());
        }
   }
   //Añadir una pelicula
   public function añadir($nombrePelicula,$argumento,$clasificacion,$ano,$duracion,$edad,$genero_id,$imagen)
   {
        try
        {
            $instancia=new Usuario();
            $conexion=$instancia->conexion;
            $consultasql="insert into peliculasc (nombre,clasificacion,año,duracion,argumento,cartel,clasificacion_edad,genero_id) values (:nombre,:clasif,:ano,:duracion,:argumento,:cartel,:edad,:genero)";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":nombre",$nombrePelicula,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":clasif",$clasificacion,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":ano",$ano,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":duracion",$duracion,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":argumento",$argumento,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":cartel",$imagen,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":edad",$edad,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":genero",$genero_id,PDO::PARAM_STR);
            $enlaceDatos->execute();
            //$enlaceDatos->fetch(PDO::PARAM_STR);
        }catch(PDOException $e)
        {
            exit("Error:" .$e->getMessage());
        }
   }
   //Añadir un actor, un actriz o un Director
   public function anadiractoractrizdirector($nombre,$tipo,$imagen)
   {
    try
    {
        $instancia=new Usuario();
        $conexion=$instancia->conexion;
        $consultasql="insert into personalc (nombre,tipo,imagen) values (:nombreA,:tipoA,:imagenA)";
        $enlaceDatos=$conexion->prepare($consultasql);
        $enlaceDatos->bindParam(":nombreA",$nombre,PDO::PARAM_STR);
        $enlaceDatos->bindParam(":tipoA",$tipo,PDO::PARAM_STR);
        $enlaceDatos->bindParam(":imagenA",$imagen,PDO::PARAM_STR);
        $enlaceDatos->execute();
        //$enlaceDatos->fetch(PDO::PARAM_STR);

    }catch(PDOException $e)
    {
        exit("Error:" .$e->getMessage());
    }
   }
   //eliminar una pelicula
   public function eliminar($nombrePelicula)
   {
    try
    {
        $instancia=new Usuario();
        $conexion=$instancia->conexion;
        $consultasql="delete from peliculasc where nombre=:nombre";
        $enlaceDatos=$conexion->prepare($consultasql);
        $enlaceDatos->bindParam(":nombre",$nombrePelicula,PDO::PARAM_STR);
        $enlaceDatos->execute();
        $enlaceDatos->fetch(PDO::PARAM_STR);

    }catch(PDOException $e)
    {
        exit("Error:" .$e->getMessage());
    }
   }
   //eliminar un usuario
   public function eliminarusuario($nombreUsuario)
   {
    try
    {
        $instancia=new Usuario();
        $conexion=$instancia->conexion;
        $consultasql="delete from usuariosc where nombre=:nombre";
        $enlaceDatos=$conexion->prepare($consultasql);
        $enlaceDatos->bindParam(":nombre",$nombreUsuario,PDO::PARAM_STR);
        $enlaceDatos->execute();
        $enlaceDatos->fetch(PDO::PARAM_STR);

    }catch(PDOException $e)
    {
        exit("Error:" .$e->getMessage());
    }
   
   }
    //eliminar un actor, actriz o director
    public function eliminaractoractrizdirector($nombreActores)
    {
        try
    {
        $instancia=new Usuario();
        $conexion=$instancia->conexion;
        $consultasql="delete from personalc where nombre=:nombre";
        $enlaceDatos=$conexion->prepare($consultasql);
        $enlaceDatos->bindParam(":nombre",$nombreActores,PDO::PARAM_STR);
        $enlaceDatos->execute();
        $enlaceDatos->fetch(PDO::PARAM_STR);

    }catch(PDOException $e)
    {
        exit("Error:" .$e->getMessage());
    }
    }

   //Editar una pelicula
   public function editar($nombrePelicula,$argumento,$clasificacion,$ano,$duracion,$edad,$genero_id)
   {
        try
        {
            $instancia=new Usuario();
            $conexion=$instancia->conexion;
            $consultasql="update peliculasc set argumento=:argumento, clasificacion=:clasif, año=:ano, duracion=:duracion , clasificacion_edad=:edad , genero_id=:genero where nombre=:nombre ";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":nombre",$nombrePelicula,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":clasif",$clasificacion,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":ano",$ano,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":duracion",$duracion,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":argumento",$argumento,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":edad",$edad,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":genero",$genero_id,PDO::PARAM_STR);
            $enlaceDatos->execute();
            $enlaceDatos->fetch(PDO::PARAM_STR);
        }catch(PDOException $e)
        {
            exit("Error:" .$e->getMessage());
        }
   }
   //Editar a un Actriz o Actor o Director
   public function editaractoractrizdirector($nombreActorActrizDirector,$tipo)
   {
        try
        {
            $instancia=new Usuario();
            $conexion=$instancia->conexion;
            $consultasql="update personalc set tipo=:tipo where nombre=:nombre ";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":nombre",$nombreActorActrizDirector,PDO::PARAM_STR);
            $enlaceDatos->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $enlaceDatos->execute();
            $enlaceDatos->fetch(PDO::PARAM_STR);

        }catch(PDOException $e)
        {
            exit("Error:" .$e->getMessage());
        }
   }
   //listar todas las peliculas que hay en la bases de datos
   public function listarPeliculas()
   {
       try
       {
       $instancia=new Usuario();
       $conexion=$instancia->conexion;
       $consultasql="select peliculasc.clasificacion as clasif,peliculasc.año as año, peliculasc.duracion as duracion,
           peliculasc.argumento as argumento,peliculasc.nombre as nombre ,peliculasc.cartel as cartel ,peliculasc.clasificacion_edad as edad from peliculasc";
       $enlaceDatos=$conexion->prepare($consultasql);
       $enlaceDatos->execute();
       $peliculas = array();
       while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
       $pelicula =array(
           'titulo'=>$row['nombre'],
           'imagen' => $row["cartel"],
           'edad' => $row['edad'],
           'argumento' => $row["argumento"],
           'clasif' => $row["clasif"],
           'año' => $row["año"],               
           'duracion' => $row["duracion"]
          );
       $peliculas[] = $pelicula;
       }
       $_SESSION['peliculas']=$peliculas;

       $conexion=null;
       return $_SESSION['peliculas'];
   }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }

   } 
   //listar a todos los usuarios que hay en la base de datos
   public function listarUsuarios()
   {
       try
       {
       $instancia=new Usuario();
       $conexion=$instancia->conexion;
       $consultasql="select usuariosc.nombre as nombre, usuariosc.apellidos as apellidos, usuariosc.avatar as avatar, usuariosc.NIF as nif,
       usuariosc.hash_pass as contrasena, usuariosc.correo as correo, usuariosc.rol as rol from usuariosc";
       $enlaceDatos=$conexion->prepare($consultasql);
       $enlaceDatos->execute();
       $usuarios = array();
       while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
       $usuario =array(
           'nombre'=>$row['nombre'],
           'avatar' => $row["avatar"],
           'apellidos' => $row["apellidos"],
           'nif' => $row["nif"],
           'contraseña' => $row["contrasena"],
           'rol' => $row["rol"],               
           'correo' => $row["correo"]
          );
       $usuarios[] = $usuario;
       }
       $_SESSION['usuarios']=$usuarios;

       $conexion=null;
       return $_SESSION['usuarios'];
   }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }

   }
   //lista todos los Actores que hay en la base de datos 
   public function listarActores()
   {
       try
       {
           $tipo="actor";
           $instancia=new Usuario();
           $conexion=$instancia->conexion;
           $consultasql="select personalc.nombre as nombre, 
            personalc.imagen as imagen , personalc.tipo as tipo, peliculasc.nombre as titulo from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id 
                INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo='actor'";
           $enlaceDatos=$conexion->prepare($consultasql);
           $enlaceDatos->execute();
    
            $enlaceDatos->bindParam(":tipo",$tipo,PDO::PARAM_STR);
           $actores=array();
           while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
            $actor =array(
                'nombre'=>$row['nombre'],
                'foto' => $row["imagen"],
                'tipo' => $row['tipo'],
                'tituloPelicula' => $row["titulo"],
        
            );
            $actores[]=$actor;
           }
           $_SESSION['actores']=$actores;
           $conexion=null;
           return $_SESSION['actores'];
       }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }
   }
   //listar todos los actrices que hay en la base de datos
   public function listarActrices()
   {
       try
       {
           
           $instancia=new Usuario();
           $conexion=$instancia->conexion;
           $consultasql="select personalc.nombre as nombre, 
            personalc.imagen as imagen , personalc.tipo as tipo, peliculasc.nombre as titulo from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id 
                INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo='actriz'";
           $enlaceDatos=$conexion->prepare($consultasql);
           $enlaceDatos->execute();
           $actrices=array();
           while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
            $actriz =array(
                'nombre'=>$row['nombre'],
                'foto' => $row["imagen"],
                'tipo' => $row['tipo'],
                'tituloPelicula' => $row["titulo"],
        
            );
            $actrices[]=$actriz;
           }
           $_SESSION['actrices']=$actrices;
           $conexion=null;
           return $_SESSION['actrices'];
       }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }
   }
   //listar a todos los directores de las peliculas que hay en la base de datos
   public function listarDirector()
   {
       try
       {
           
           $instancia=new Usuario();
           $conexion=$instancia->conexion;
           $consultasql="select personalc.nombre as nombre, 
            personalc.imagen as imagen , personalc.tipo as tipo, peliculasc.nombre as titulo from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id 
                INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo='director'";
           $enlaceDatos=$conexion->prepare($consultasql);
           $enlaceDatos->execute();
           $directores=array();
           while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
            $director =array(
                'nombre'=>$row['nombre'],
                'foto' => $row["imagen"],
                'tipo' => $row['tipo'],
                'tituloPelicula' => $row["titulo"],
        
            );
            $directores[]=$director;
           }
           $_SESSION['directores']=$directores;
           $conexion=null;
           return $_SESSION['directores'];
       }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }
   }
}
?>
