<?php
include "../../app/models/salaCine.php";
/*  Respuesta al cliente:
        1. 200 : OK → La solicitud ha tenido éxito
                header("HTTP/1.0 200 OK");
        2. 201 : Created → La solicitud ha tenido éxito y se ha creado un nuevo recurso  
                header("HTTP/1.0 201 Created");
        3. 204 : No Content → La petición se ha completado con éxito, pero su respuesta no tiene ningún contenido  
                header("HTTP/1.0 204 No Content");
        4. 400 : Bad Request → La solicitud contiene sintaxis errónea 
                header("HTTP/1.0 400 Bad Request");
        5. 404 : Not Found → El servidor no pudo encontrar el contenido solicitado  
                header("HTTP/1.0 404 Not Found");       
        6. 500 : Internal Server Error → Se ha producido un error interno
                 header("HTTP/1.0 500 Internal Server Error");
   */
class Insertar
{
        const PATH = '../../app/images/carteles/';
        const PATH2 ='../../app/images/actores/';
        public static function gestion()
        {
            $data = json_decode(file_get_contents("php://input"), true);
           
            //El id es autoincremental, por lo que no es necesario pasarlo como parámetro
            //Lo debemos regoger de la base de datos
            //PDO nos permite obtener el último id insertado con el método lastInsertId()
    
            //var_dump($data);
            //exit;
            if(!isset($data["nombre"]) && !is_string($data['nombre']))
            {
                self::enviarRespuesta(false,"El nombre debe ser un string");
            }
            if 
            (
                isset($data['nombre']) && isset($data['argumento']) && isset($data['cartel']) && isset($data['clasificacion_edad'])
                && isset($data['genero_id'])
            ) 
            {
                
                if (self::validarDatos($data) && self::validarImagen($data)) 
                {
                    //var_dump($data);
                    //      exit;
                    $idPelicula = self::registrarPelicula($data);
                    //var_dump($idPelicula);
                    if($idPelicula){
                        self::enviarRespuesta(true,$idPelicula);
                    }else{
                        self::enviarRespuesta(false,"Faltan campos requeridos en JSON recibido");
                    }
                }
                    
            }
            if(isset($data['nombre']) && isset($data['tipo']) && isset($data['imagen']))
            {
            
                
                if($data['tipo']=="actor" || $data['tipo']=='actriz' || $data['tipo']=="director")
                {
                    $data['nombre']=ucwords(strtolower($data['nombre']));    
                    $data['tipo']=ucwords(strtolower($data['tipo']));

                    if(self::validarDatosActores($data) && self::validarImagenActores($data))
                    {
                        $idActor=self::registrarActor($data);
                        if($idActor)
                        {
                            self::enviarRespuesta(true,$idActor);
                        }else
                        {
                            self::enviarRespuesta(false,"Falta campos requeridos en JSON recibido");
                        }
                    }
                }
               
                
            }

        }
        //es para validar datos de los Actores
        private static function validarDatosActores($data)
        {
            $correcto=false;
            if(is_string($data['nombre']) && is_string($data['tipo']) && is_string($data['imagen']))
            {
                $correcto=true;

            }else{

                $correcto=false;
            }
            return $correcto;
        }

        private static function validarImagenActores(&$data)
        {
            $valor = true;
            $imagen64 = $data['imagen'];
            $nombre = $data['nombre'];
            // Extraigo el tipo mime del formato de la imagen
            $mime = mime_content_type($imagen64);
            // Establezco la extensión del fichero
            $extension = explode('/', $mime)[1];
            // Establezco los tipos permitidos
            $tipos_permitidos = ['image/png', 'image/jpeg', 'image/gif', 'image/bmp', 'image/webp'];
            // Comprueba si el tipo de imagen está permitido
            if (!in_array($mime, $tipos_permitidos)) {
                //echo "<br>error, tipo no permitido";
                $valor = false;
            }
            // Comprueba si el tamaño de la imagen es menor de 1MB
            $longitud = mb_strlen($imagen64);
            if (round($longitud * (1E-6), 2) > 1) {
                //echo "<br>error, la imagen es demasiado grande";
                $valor = false;
            } else {
                $data['imagen'] = self::guardarImagenActor($imagen64, $nombre, $extension);
            }
    
            return $valor;
        }
        private static function guardarImagenActor($imagen64, $nombre, $extension)
        {
            $nuevo_fichero_ruta = self::PATH2 . str_replace(' ','_',$nombre). '.' . $extension;
            $nombre= $nombre. '.' . $extension;
            // Decodifica la imagen de Base64 a formato original y quita la cabecera añadida
            $quitarCabecera = explode(',', $imagen64);
            // Guarda el fichero en la ruta indicada
            if(file_put_contents($nuevo_fichero_ruta, base64_decode($quitarCabecera[1])))
            {
                //move_uploaded_file($nombre,$nuevo_fichero_ruta);
                return $nombre;
            }
            else
            {
                return null;
            }
        }
         //es para validar datos de la pelicula
         private static function validarDatos($data)
         {
             $correcto=false;
             // Si los datos son válidos, debes devolver true
             // Si los datos no son válidos, debes devolver false
             if(is_string($data['nombre']) && is_string($data['argumento']) && is_string($data['cartel']) && is_string($data['clasificacion_edad']) && is_numeric($data['genero_id']))
             {
                 $correcto=true;
             }else
             {
                 $correcto=false;
             }   
             return $correcto;
             
         }
        private static function validarImagen(&$data)
        {
            $valor = true;
            $imagen64 = $data['cartel'];
            $nombre = $data['nombre'];
    
    
            // Extraigo el tipo mime del formato de la imagen
            $mime = mime_content_type($imagen64);
    
            // Establezco la extensión del fichero
            $extension = explode('/', $mime)[1];
    
            // Establezco los tipos permitidos
            $tipos_permitidos = ['image/png', 'image/jpeg', 'image/gif', 'image/bmp', 'image/webp'];
    
            // Comprueba si el tipo de imagen está permitido
            if (!in_array($mime, $tipos_permitidos)) {
                //echo "<br>error, tipo no permitido";
                $valor = false;
            }
    
            // Comprueba si el tamaño de la imagen es menor de 1MB
            $longitud = mb_strlen($imagen64);
    
            if (round($longitud * (1E-6), 2) > 1) {
                //echo "<br>error, la imagen es demasiado grande";
                $valor = false;
            } else {
                $data['cartel'] = self::guardarImagen($imagen64, $nombre, $extension);
            }
    
            return $valor;
        }
        private static function guardarImagen($imagen64, $nombre, $extension)
        {
            $nuevo_fichero_ruta = self::PATH .$nombre.time(). '.' . $extension;
            $nombre= $nombre . time() . '.' . $extension;
    
            // Decodifica la imagen de Base64 a formato original y quita la cabecera añadida
            $quitarCabecera = explode(',', $imagen64);
    
            // Guarda el fichero en la ruta indicada
            file_put_contents($nuevo_fichero_ruta, base64_decode($quitarCabecera[1]));
    
            return $nombre;
        }
        private static function registrarPelicula($data)
        {
            $idPelicula = null;
            $idPelicula=Salacine::insertarPelicula($data);
            return $idPelicula;
        }
        private static function registrarActor($data)
        {
            $idActor=null;
            $idActor=Salacine::insertarActor($data);
            return $idActor;
        }
        private static function enviarRespuesta($exitoso,$mensaje)
        {
    
            if ($exitoso) {
                header("HTTP/1.1 201 OK");
                echo json_encode (["id insertado"=>$mensaje]);
            } else {
                header("HTTP/1.1 400 bad request");
                echo json_encode (["Error"=>$mensaje]);
            }
        }
}
