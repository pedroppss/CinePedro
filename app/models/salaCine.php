<?php
include_once "conexionAPI.php";

class Salacine extends Conectar
{
    public function __construct()
    {
        parent::__construct();
    }
    public static function getRuta()
    {
        
        //revisad esta ruta, debe contener la ruta a la carpeta imagenes de vuestra apliación
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 3) . '/utiles/img/';
    }
    //funcion para mostrar todas las peliculas que haya en la base de datos
    public static function getPeliculas()
    {
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT peliculasc.id as id , peliculasc.nombre as nombre_pelicula,CONCAT('http://localhost:80/dwes2/Cine-Pedro/utiles/img/',peliculasc.cartel) as caratula" ;
        $resultado=$conexion->prepare($sql);
        $resultado->execute();
        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    //funcion para mostrar los datos de una pelicula cuyo id
    public static function getPelicula($id)
    {
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT * FROM peliculasc WHERE id=:id";
        $resultado=$conexion->prepare($sql);
        $resultado->bindParam(":id",$id);
        $resultado->execute();
        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}