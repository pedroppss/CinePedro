<?php
include "app/controllers/Ruta.php";
include "app/qr/Barcode_Generator.php";
class QrController
{
    public static function generarQr($datos = null)
    {

        $format = 'svg'; // Formatos disponibles: gif, png, jpg, jpeg, svg
        $s = 'qr-l'; // tipo de código y densidad (también puede ser qr-m, qr-q, qr-h)
        //Estos datos se serán codificados en el QR por defecto
        if ($datos == null) {

           
 $sesionId = isset($_SESSION['sesiones'][0]['id']) ? $_SESSION['sesiones'][0]['id'] : '';
            $butaca = isset($_POST["butacasSeleccionadas"]) ? $_POST["butacasSeleccionadas"] : '';
            $nombreUsuario = isset($_SESSION['usuarios']['nombre']) ? $_SESSION['usuarios']['nombre'] : '';
            $nombrePelicula = isset($_SESSION['sesiones'][0]['nombrePelicula']) ? $_SESSION['sesiones'][0]['nombrePelicula'] : '';

            $datos = "Sesión={$sesionId}||Butaca={$butaca}||Usuario={$nombreUsuario}||Película={$nombrePelicula}";
        }


        // Opciones de configuración
        $options = [
            'f' => $format, // formato de salida, gif, png, jpg, jpeg, svg
            's' => $s, // tipo y densidad
            'd' => $datos, // datos codificados en el qr
            'sf' => 8, // factor de escala
            'md' => 1, // grosor de los cuadros-no modificar
        ];

        if (ob_get_length()) {
            ob_end_flush(); // Enviar el contenido del buffer al navegador y desactivar el buffer de salida
        }

        $generadorQR = new Barcode_Generator();

        $imagen = $generadorQR->output_image($format, $s, $datos, $options);

        # Generar un nombre de archivo aleatorio para el QR
        $nombreArchivoQR = "QR" . bin2hex(random_bytes(5)) . ".$format";

        # Definir la ruta de la carpeta donde se guardará el archivo
        # La carpeta debe tener permisos de escritura y estar creada en el directirio qr con el nombre qr_generados
        # El servidor por motivos de seguridad no permite dar permisos de escritura a carpetas desde el código PHP
        $rutaCarpeta = Ruta::QR_PATH;
        $rutaArchivo = $rutaCarpeta . $nombreArchivoQR;
        # Guardar el contenido en el archivo en una carpeta del servidor cuya ruta es qr/qr_generados
        file_put_contents($rutaArchivo, $imagen);
        # Mostrar el archivo QR en el navegador
        include 'app/views/visualizarQR.php';
    }
}
