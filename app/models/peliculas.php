<?php
include_once "conexion_2.php";
class peliculas extends conexion_2{
    public function __construct()
    {
        parent::__construct();
    }
   
    public function mostrarImagenes($id)
    {
        try
        {
            $instancia=new peliculas();
            $conexion=$instancia->conexion;
            $consultasql="select peliculasc.id as id ,peliculasc.clasificacion as clasif,peliculasc.año as año, peliculasc.duracion as duracion,peliculasc.argumento as argumento,peliculasc.nombre as nombre ,peliculasc.cartel as cartel ,peliculasc.clasificacion_edad as edad, generoc.nombre as genero from peliculasc LEFT join generoc on peliculasc.genero_id=generoc.id WHERE peliculasc.id=:id;";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->execute();

            unset($_SESSION['peliculas']);

            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $idpeli=$row["id"];
                $titulo=$row["nombre"];
                $genero=$row["genero"];
                $imagen=$row["cartel"];
                $edad=$row['edad'];
                $argumento=$row["argumento"];
                $clasif=$row["clasif"];
                $año=$row["año"];
                $duracion=$row["duracion"];
                //Agregar informacion a las variables de sesión.
                $_SESSION['peliculas']['id'][]=$idpeli;
                $_SESSION['peliculas']['genero'][]=$genero;
                $_SESSION['peliculas']['imagen'][]=$imagen;
                $_SESSION['peliculas']['edad'][]=$edad;
                $_SESSION['peliculas']['nombre'][]=$titulo;
                $_SESSION['peliculas']['argumento'][]=$argumento;
                $_SESSION['peliculas']['clasificacion'][]=$clasif;
                $_SESSION['peliculas']['año'][]=$año;
                $_SESSION['peliculas']['duracion'][]=$duracion;

            }
            $conexion=null;
            return $_SESSION['peliculas'];
            

        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
    }
    public function mostrarDirector($id){
        try
        {
            $tipo="Director";
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="select personalc.nombre as nombre, personalc.imagen as imagen from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo=:tipo and peliculasc.id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $enlaceDatos->execute();
            unset($_SESSION['directores']);
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $nombre=$row["nombre"];
                $imagen=$row["imagen"];
                //Agregar informacion a las variables de sesión.
                $_SESSION['directores']['imagen'][1]=$imagen;
                $_SESSION['directores']['nombre'][1]=$nombre;
            }
            $conexion=null;
            return $_SESSION['directores'];
        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
    }
    public function mostrarActores($id)
    {
        try
        {
            $tipo="actor";
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="select personalc.nombre as nombre, personalc.imagen as imagen from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo=:tipo and peliculasc.id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $enlaceDatos->execute();
            unset($_SESSION['actores']);
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $nombre=$row["nombre"];
                $imagen=$row["imagen"];
                //Agregar informacion a las variables de sesión.
                $_SESSION['actores']['imagen'][]=$imagen;
                $_SESSION['actores']['nombre'][]=$nombre;

            }
            $conexion=null;
            return $_SESSION['actores'];
        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
    }
    public function mostrarActriz($id)
    {
        try
        {
            $tipo="actriz";
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="select personalc.nombre as nombre, personalc.imagen as imagen from peliculasc INNER JOIN peliculas_personalc on peliculasc.id=peliculas_personalc.pelicula_id INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id where personalc.tipo=:tipo and peliculasc.id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $enlaceDatos->execute();
            unset($_SESSION['actrices']);
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $nombre=$row["nombre"];
                $imagen=$row["imagen"];
                //Agregar informacion a las variables de sesión.
                $_SESSION['actrices']['imagen'][]=$imagen;
                $_SESSION['actrices']['nombre'][]=$nombre;
            }
            $conexion=null;
            return $_SESSION['actrices'];
        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
    }
    public function salabutacas($id){
        try
        {
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="SELECT sesionesc.pelicula_id as idPeli ,sesionesc.hora as idHora, salasc.id as id, salasc.nombre as nombre, horasc.hora as hora from horasc INNER JOIN sesionesc on horasc.id=sesionesc.hora 
                INNER join salasc on salasc.id=sesionesc.sala_id where sesionesc.pelicula_id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);           
            $enlaceDatos->execute();
            $sesiones=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $sesion =array(
                    'idHora'=>$row['idHora'],
                    'idPelis'=>$row['idPeli'],
                    'id'=>$row['id'],
                    'nombreSala'=>$row['nombre'],
                    'hora'=>$row['hora'],
                   );
                $sesiones[] = $sesion;
                }
                $_SESSION['sesiones']=$sesiones;
         
                $conexion=null;
                return $_SESSION['sesiones'];
        }catch(PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }
    }
    public function comprasalabutacas($id,$idPelicula,$hora){
        try
        {
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="SELECT salasc.id as id, salasc.nombre as nombre, horasc.hora as hora from horasc INNER JOIN sesionesc on horasc.id=sesionesc.hora 
                INNER join salasc on salasc.id=sesionesc.sala_id where sesionesc.pelicula_id=:idPeli AND sesionesc.sala_id=:id AND sesionesc.hora=:hora";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":idPeli",$idPelicula,PDO::PARAM_INT); 
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);        
            $enlaceDatos->bindParam(":hora",$hora,PDO::PARAM_INT);    
            $enlaceDatos->execute();
            $sesiones=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $sesion =array(
                    'id'=>$row['id'],
                    'nombreSala'=>$row['nombre'],
                    'hora'=>$row['hora'],
                   );
                $sesiones[] = $sesion;
                }
                $_SESSION['sesiones']=$sesiones;
         
                $conexion=null;
                return $_SESSION['sesiones'];
        }catch(PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }
    }

    public function listarPeliculas()
   {
       try
       {
        
       $instancia=new conexion_2();
       $conexion=$instancia->conexion;
       $consultasql="select peliculasc.id as id , peliculasc.clasificacion as clasif,peliculasc.año as año, peliculasc.duracion as duracion,
           peliculasc.argumento as argumento,peliculasc.nombre as nombre ,peliculasc.cartel as cartel ,peliculasc.clasificacion_edad as edad from peliculasc";
       $enlaceDatos=$conexion->prepare($consultasql);
       $enlaceDatos->execute();
       $peliculas = array();
       while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
       $pelicula =array(
           'id'=>$row['id'],
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
}
?>