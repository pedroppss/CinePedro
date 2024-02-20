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
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 3) . '/app/images/';
    }
    public static function getRuta2(){
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 3) . '/api/v1/';
    
    }
    //funcion para mostrar todas las peliculas que haya en la base de datos
    public static function getPeliculas()
    {
        $rutaCaratula=self::getRuta()."carteles/";
        $rutaPersonal=self::getRuta()."actores/";

        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT peliculasc.id as id_pelicula , peliculasc.nombre as nombre_pelicula,
        CONCAT('$rutaCaratula',peliculasc.cartel) as caratula, generoc.nombre as genero,
            personalc.id as id_personal , personalc.nombre as nombre_personal, personalc.tipo
                as rol_personal, CONCAT('$rutaPersonal',personalc.imagen) as imagen_personal
                    FROM peliculasc 
                    INNER JOIN generoc on peliculasc.genero_id=generoc.id
                    INNER JOIN peliculas_personalc on peliculas_personalc.pelicula_id=peliculasc.id
                    INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id
                   " ;
        $resultado=$conexion->prepare($sql);
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultados);
        //exit();
        $peliculas=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];

            if(!isset($peliculas[$id_pelicula])){
                $peliculas[$id_pelicula]=[
                    'id_pelicula'=>$resultado['id_pelicula'],
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'genero'=>$resultado['genero'],
                    'caratula'=>$resultado['caratula'],
                    'elenco'=>[]
                ];
            }
                $peliculas[$id_pelicula]['elenco'][]=[
                    'id_personal'=>$id_personal,
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    "rol_personal"=>$resultado['rol_personal']
                ];

            }
            //var_dump($peliculas);
            //exit();
            return $peliculas; 
    }
    //funcion para mostrar los datos de una pelicula cuyo id 
    public static function getPelicula($id)
    {
        $rutaCaratula=self::getRuta()."carteles/";
        $rutaPersonal=self::getRuta()."actores/";
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT peliculasc.id as id_pelicula , peliculasc.nombre as nombre_pelicula,
        CONCAT('$rutaCaratula',peliculasc.cartel) as caratula, generoc.nombre as genero,
            personalc.id as id_personal , personalc.nombre as nombre_personal, personalc.tipo
                as rol_personal, CONCAT('$rutaPersonal',personalc.imagen) as imagen_personal
                    FROM peliculasc 
                    INNER JOIN generoc on peliculasc.genero_id=generoc.id
                    INNER JOIN peliculas_personalc on peliculas_personalc.pelicula_id=peliculasc.id
                    INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id WHERE peliculasc.id=:id
                   " ;
        $resultado=$conexion->prepare($sql);
        $resultado->bindParam(":id",$id,PDO::PARAM_INT);
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultados);
        //exit();
        $peliculas=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];

            if(!isset($peliculas[$id_pelicula])){
                $peliculas[$id_pelicula]=[
                    'id_pelicula'=>$resultado['id_pelicula'],
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'genero'=>$resultado['genero'],
                    'caratula'=>$resultado['caratula'],
                    'elenco'=>[]
                ];
            }
                $peliculas[$id_pelicula]['elenco'][]=[
                    'id_personal'=>$id_personal,
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    "rol_personal"=>$resultado['rol_personal']
                ];

            }
            //var_dump($peliculas);
            //exit();
            return $peliculas; 
    }
    //funcion para mostrar los actores
    public static function getActores(){
        $rutaPersonal=self::getRuta()."actores/";
        $endpoint=self::getRuta2()."cine.php/peliculas/";
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT personalc.id as id_personal,personalc.nombre as nombre_personal,personalc.tipo as rol,
                concat('$rutaPersonal',personalc.imagen) as imagen_personal,
                    peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula
                        from personalc
                        inner join peliculas_personalc on personalc.id=peliculas_personalc.personal_id
                        inner join peliculasc on peliculasc.id=peliculas_personalc.pelicula_id";
        $resultado=$conexion->prepare($sql);
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($resultados);
        //exit();
        $actores=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];
            if(!isset($actores[$id_personal]))
            {
                $actores[$id_personal]=[
                    'id_personal'=>$resultado['id_personal'],
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    'rol'=>[
                        $resultado['rol']
                    ],
                    'peliculas'=>[]
                ];
            }
            $actores[$id_personal]['peliculas'][]=[
                    'id_pelicula'=>$id_pelicula,
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'endpoint'=>$endpoint.$resultado['id_pelicula'],
            ];
        }
        //var_dump($actores);
        //exit();
        return $actores; 
    }
    //funcion para mostrar los datos de un actor cuyo id
    public static function getActor($id){
        $rutaPersonal=self::getRuta()."actores/";
        $endpoint=self::getRuta2()."cine.php/peliculas/";
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT personalc.id as id_personal,personalc.nombre as nombre_personal,personalc.tipo as rol,
                concat('$rutaPersonal',personalc.imagen) as imagen_personal,
                    peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula
                        from personalc
                        inner join peliculas_personalc on personalc.id=peliculas_personalc.personal_id
                        inner join peliculasc on peliculasc.id=peliculas_personalc.pelicula_id WHERE personalc.id=:id";
        $resultado=$conexion->prepare($sql);
        $resultado->bindParam(":id",$id,PDO::PARAM_INT);
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($resultados);
        //exit();
        $actores=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];
            if(!isset($actores[$id_personal]))
            {
                $actores[$id_personal]=[
                    'id_personal'=>$resultado['id_personal'],
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    'rol'=>[
                        $resultado['rol']
                    ],
                    'peliculas'=>[]
                ];
            }
            $actores[$id_personal]['peliculas'][]=[
                    'id_pelicula'=>$id_pelicula,
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'endpoint'=>$endpoint.$resultado['id_pelicula'],
            ];
        }
        //var_dump($actores);
        //exit();
        return $actores; 
    }
    //funcion para buscar la pelicula cuyo nombre
    public static function buscarPelicula($nombre)
    {
        $rutaCaratula=self::getRuta()."carteles/";
        $rutaPersonal=self::getRuta()."actores/";

        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT peliculasc.id as id_pelicula , peliculasc.nombre as nombre_pelicula,
        CONCAT('$rutaCaratula',peliculasc.cartel) as caratula, generoc.nombre as genero,
            personalc.id as id_personal , personalc.nombre as nombre_personal, personalc.tipo
                as rol_personal, CONCAT('$rutaPersonal',personalc.imagen) as imagen_personal
                    FROM peliculasc 
                    INNER JOIN generoc on peliculasc.genero_id=generoc.id
                    INNER JOIN peliculas_personalc on peliculas_personalc.pelicula_id=peliculasc.id
                    INNER JOIN personalc on personalc.id=peliculas_personalc.personal_id WHERE peliculasc.nombre like :nombre
                   " ;
        $resultado=$conexion->prepare($sql);
        $resultado->bindValue(":nombre",'%'.$nombre.'%');
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultados);
        //exit();
        $peliculas=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];

            if(!isset($peliculas[$id_pelicula])){
                $peliculas[$id_pelicula]=[
                    'id_pelicula'=>$resultado['id_pelicula'],
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'genero'=>$resultado['genero'],
                    'caratula'=>$resultado['caratula'],
                    'elenco'=>[]
                ];
            }
                $peliculas[$id_pelicula]['elenco'][]=[
                    'id_personal'=>$id_personal,
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    "rol_personal"=>$resultado['rol_personal']
                ];

            }
            //var_dump($peliculas);
            //exit();
            return $peliculas; 
    }
    //funcion para buscar el actor cuyo nombre
    public static function buscarActor($nombre){
        $rutaPersonal=self::getRuta()."actores/";
        $endpoint=self::getRuta2()."cine.php/peliculas/";
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="SELECT personalc.id as id_personal,personalc.nombre as nombre_personal,personalc.tipo as rol,
                concat('$rutaPersonal',personalc.imagen) as imagen_personal,
                    peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula
                        from personalc
                        inner join peliculas_personalc on personalc.id=peliculas_personalc.personal_id
                        inner join peliculasc on peliculasc.id=peliculas_personalc.pelicula_id WHERE personalc.nombre like :nombre";
        $resultado=$conexion->prepare($sql);
        $resultado->bindValue(":nombre",'%'.$nombre.'%');
        $resultado->execute();
        $resultados=$resultado->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($resultados);
        //exit();
        $actores=[];
        foreach($resultados as $resultado)
        {
            $id_pelicula=$resultado['id_pelicula'];
            $id_personal = $resultado['id_personal'];
            if(!isset($actores[$id_personal]))
            {
                $actores[$id_personal]=[
                    'id_personal'=>$resultado['id_personal'],
                    'nombre_personal'=>$resultado['nombre_personal'],
                    'imagen_personal'=>$resultado['imagen_personal'],
                    'rol'=>[
                        $resultado['rol']
                    ],
                    'peliculas'=>[]
                ];
            }
            $actores[$id_personal]['peliculas'][]=[
                    'id_pelicula'=>$id_pelicula,
                    'nombre_pelicula'=>$resultado['nombre_pelicula'],
                    'endpoint'=>$endpoint.$resultado['id_pelicula'],
            ];
        }
        //var_dump($actores);
        //exit();
        return $actores; 
    
    }
    //funcion para insertar la pelicula
    public static function insertarPelicula($data)
    {
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql = "INSERT INTO peliculasc (nombre,argumento,cartel,clasificacion_edad,genero_id) 
                VALUES (:nombre,:argumento,:cartel,:clasificacion_edad,:genero_id)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(":nombre", $data["nombre"] , PDO::PARAM_STR);
        $resultado->bindParam(":argumento", $data["argumento"],PDO::PARAM_STR);
        $resultado->bindParam(":cartel", $data["cartel"],PDO::PARAM_STR);
        $resultado->bindParam(":clasificacion_edad", $data["clasificacion_edad"],PDO::PARAM_STR);
        $resultado->bindParam(":genero_id", $data["genero_id"], PDO::PARAM_INT); 
        $resultado->execute();
        $idInsertado=$conexion->lastInsertId();
        return $idInsertado;
    }
    //funcion para insertar el actor
    public static function insertarActor($data)
    {
        $instancia=new Salacine();
        $conexion=$instancia->conexion;
        $sql="INSERT INTO personalc (nombre,tipo,imagen)
            VALUES(:nombre,:tipo,:imagen)";
        $resultado=$conexion->prepare($sql);
        $resultado->bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $resultado->bindParam(":tipo",$data["tipo"],PDO::PARAM_STR);
        $resultado->bindParam(":imagen",$data["imagen"],PDO::PARAM_STR);
        $resultado->execute();
        $idInsertado=$conexion->lastInsertId();
        return $idInsertado;
    }
    

}