<?php
include "../../app/models/salaCine.php";
class Mostrar
{
    public static function getRuta()
    {
        //revisad esta ruta, debe ser la correcta para vuestra aplicacición
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/imgs/';
    }
    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $mensaje = ["error" => "Endpoint no especificado"];
            $error = "400 Bad Request";
            self::enviarRespuesta(NULL, $error, $mensaje);
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            $recurso = $rutaPathSinBarra[1];
            $id = isset($rutaPathSinBarra[2]) ? $rutaPathSinBarra[2] : null;
           // $nombre=isset($_GET['buscar']) ? $rutaPathSinBarra[2] : null;
           // var_dump($nombre);
            switch ($recurso) {
                case 'peliculas':
                    if (isset($_GET['buscar']))
                    {
                        self::getBuscarPelicula($_GET['buscar']); 
                        break;
                    }
                    if ($id) {
                        self::getPelicula($id);
                    }else {
                        self::getPeliculas();
                    }
                    break;
                case 'actores':
                    if (isset($_GET['buscar']))
                    {
                        self::getBuscarActor($_GET['buscar']); 
                        break;
                    }
                    if ($id) {
                        self::getActor($id);
                    } else {
                        self::getActores();
                    }
                    break;
                case 'sesiones':
                    $dia = isset($_GET['dia']) ? $_GET['dia'] : null;
                    self::getSesiones($dia);
                    break;
                default:
                    $mensaje = ["error" => "Endpoint no especificado"];
                    $error = "400 Bad Request";
                    self::enviarRespuesta(NULL, $error, $mensaje);
                    break;
            }
        }
    }

    //Metodo para mostrar los datos de una pelicula 
    public static function getPelicula($id)
    {
          $datosConsulta=[];
          $datosConsulta=Salacine::getPelicula($id);
          self::enviarRespuesta($datosConsulta);
    }
    //Metodo para mostrar todas las peliculas
    public static function getPeliculas()
    {
        $datosConsulta=[];
        $datosConsulta=Salacine::getPeliculas();
        self::enviarRespuesta($datosConsulta);
    }
    //Metodo para buscar la pelicula usando el nombre
    public static function getBuscarPelicula($nombre){
        $datosConsulta=[];
        $datosConsulta=Salacine::buscarPelicula($nombre);
        self::enviarRespuesta($datosConsulta);
    }
    //Metodo para mostrar el actor
    public static function getActor($id)
    {
        $datosConsulta=[];
        $datosConsulta=Salacine::getActor($id);
        self::enviarRespuesta($datosConsulta);
    }
    //Metodo para mostrar todos los actores
    public static function getActores(){
        $datosConsulta=[];
        $datosConsulta=Salacine::getActores();
        self::enviarRespuesta($datosConsulta);
    }
    //Metodo para buscar el actor usando el nombre
    public static function getBuscarActor($nombre)
    {
        $datosConsulta=[];
        $datosConsulta=Salacine::buscarActor($nombre);
        self::enviarRespuesta($datosConsulta);
    }
    //Metodo para mostra el sensor
    public static function getSesiones($dia)
    {

    }
    private static function enviarRespuesta($datosConsulta = NULL, $error = NULL, $mensaje = NULL)
    {
        if ($datosConsulta) {
            $codificado = json_encode(
                $datosConsulta,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
            header("HTTP/1.1 200 OK");
            echo $codificado;
        } else {
            header("HTTP/1.1 $error");
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
    
}
