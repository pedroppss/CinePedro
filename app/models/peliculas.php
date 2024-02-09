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
            $consultasql="select peliculasc.id as id ,peliculasc.clasificacion as clasif,
                peliculasc.año as año, peliculasc.duracion as duracion,peliculasc.argumento as argumento,peliculasc.nombre as nombre ,
                    peliculasc.cartel as cartel ,peliculasc.clasificacion_edad as edad, generoc.nombre as genero 
                        from peliculasc LEFT join generoc on peliculasc.genero_id=generoc.id WHERE peliculasc.id=:id;";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->execute();

            $peliculas = array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC))
            {
            $pelicula =array(
                'id'=>$row['id'],
                'titulo'=>$row['nombre'],
                'imagen' => $row["cartel"],
                'edad' => $row['edad'],
                'argumento' => $row["argumento"],
                'clasif' => $row["clasif"],
                'año' => $row["año"],               
                'duracion' => $row["duracion"],
                'genero'=>$row["genero"]
          );
       $peliculas[] = $pelicula;
            }
       $_SESSION['peliculas']=$peliculas;

       $conexion=null;
       return $_SESSION['peliculas'];
       session_unset();

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
            $directores=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $director=array(
                    'nombre'=>$row['nombre'],
                    'imagen'=>$row['imagen'],
                );
                $directores[]=$director;
            }
                //Agregar informacion a las variables de sesión.
            $_SESSION['directores']=$directores;
            
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
            $actores=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $actor=array(
                    'nombre'=>$row['nombre'],
                    'imagen'=>$row['imagen'],
                );
                $actores[]=$actor;
            }
                //Agregar informacion a las variables de sesión.
            $_SESSION['actores']=$actores;
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
            $actrices=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $actriz=array(
                    'nombre'=>$row['nombre'],
                    'imagen'=>$row['imagen'],
                );
                $actrices[]=$actriz;
            }
                //Agregar informacion a las variables de sesión.
               $_SESSION['actrices']=$actrices;
            
            $conexion=null;
            return $_SESSION['actrices'];
        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
    }
    public function mostarSesionesFecha($id)
    {
        try
        {
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="SELECT sesionesc.fecha as fecha from sesionesc INNER JOIN peliculasc on sesionesc.pelicula_id=peliculasc.id where peliculasc.id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT);
            $enlaceDatos->execute();
            $sesionesFecha=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $sesionFecha=array(
                    'fecha'=>$row['fecha']
                );
                $sesionesFecha[]=$sesionFecha;
            }
                //Agregar informacion a las variables de sesión.
               $_SESSION['sesionesFecha']=$sesionesFecha;
            
            $conexion=null;
            return $_SESSION['sesionesFecha'];
        }catch(PDOException $e)
        {
            echo "Error: ". $e->getMessage();
        }
    }
    /*
    public function Compraentrada($id,$idSala,$idHora,$fecha){
        try
        {
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="SELECT sesionesc.pelicula_id as idPeli ,sesionesc.hora as idHora, salasc.id as id, salasc.nombre as nombre,
                horasc.hora as hora FROM horasc 
                INNER JOIN sesionesc on horasc.id=sesionesc.hora 
                INNER join salasc on salasc.id=sesionesc.sala_id where sesionesc.pelicula_id=:id 
                    and sesionesc.fecha =:fecha and salasc.id=:idSala and horasc.id:idHora";
            $enlaceDatos=$conexion->prepare($consultasql);
            $enlaceDatos->bindParam(":id",$id,PDO::PARAM_INT); 
            $enlaceDatos->bindParam(":idSala",$idSala,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":idHora",$idHora,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":fecha",$fecha,PDO::PARAM_STR);            
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
    */
    public function salabutacas($fecha,$idPelicula){

        try{
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="SELECT salasc.id as id, salasc.nombre as nombre, horasc.hora as hora, peliculasc.id as idPelicula,sesionesc.fecha as fecha_compra,
            peliculasc.nombre as titulo, sesionesc.precio as precio FROM horasc
            INNER JOIN sesionesc ON horasc.id = sesionesc.hora
            INNER JOIN salasc ON salasc.id = sesionesc.sala_id
            INNER JOIN peliculasc on peliculasc.id=sesionesc.pelicula_id
            WHERE sesionesc.fecha =:fecha
            AND peliculasc.id=:id";
            $enlaceDatos=$conexion->prepare($consultasql);      
            $enlaceDatos->bindParam(":fecha",$fecha,PDO::PARAM_STR); 
            $enlaceDatos->bindParam(":id",$idPelicula,PDO::PARAM_STR);     
            $enlaceDatos->execute();
            $sesiones=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $sesion =array(
                    'nombrePelicula'=>$row['titulo'],
                    'idPelicula'=>$row['idPelicula'],
                    'precio'=>$row['precio'],
                    'fechacompra'=>$row['fecha_compra'],
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
           peliculasc.argumento as argumento,peliculasc.nombre as nombre ,peliculasc.cartel as cartel ,peliculasc.clasificacion_edad as edad from peliculasc
           where exists(select * from sesionesc where sesionesc.pelicula_id=peliculasc.id)";
       $enlaceDatos=$conexion->prepare($consultasql);
       $enlaceDatos->execute();
       if($enlaceDatos->rowCount()>0){
            $pelicula=array();
            while($row = $enlaceDatos->fetch(PDO::FETCH_ASSOC)){
                $data=array(
                    'id'=>$row['id'],
                    'titulo'=>$row['nombre'],
                    'imagen' => $row["cartel"],
                    'edad' => $row['edad'],
                    'argumento' => $row["argumento"],
                    'clasif' => $row["clasif"],
                    'año' => $row["año"],               
                    'duracion' => $row["duracion"]
                   );
                   $pelicula[]=$data;
            }
            $_SESSION['peliculas']=$pelicula;
       }
       $conexion=null;
       return $_SESSION['peliculas'];
   }catch(PDOException $e){
           echo "Error:" .$e->getMessage();
       }

   }
   public function comprarButacas($idSesion,$butacas,$idUsuario,$fecha)
   {
        try{
            $instancia=new conexion_2();
            $conexion=$instancia->conexion;
            $consultasql="INSERT INTO compra_butacasc (sesion_id,usuario_id,cant_butaca,fecha_compra) values (:sesion,:idusuario,:total,:fecha)";
            $enlaceDatos=$conexion->prepare($consultasql);        
            $enlaceDatos->bindParam(":sesion",$idSesion,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":total",$butacas,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":idusuario",$idUsuario,PDO::PARAM_INT);
            $enlaceDatos->bindParam(":fecha",$fecha,PDO::PARAM_STR);
            $enlaceDatos->execute();
            //$conexion->lastInsertId();
            
        }catch(PDOException $e){
            echo "Error:" .$e->getMessage();
        }
 
    }
   }

?>