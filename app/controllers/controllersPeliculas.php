<?php
include "app/models/peliculas.php";
include_once "QrController.php";
include_once "GenerarPDF.php";
class controllersPeliculas
{
        //funcion para mostrar Pelicula
        public function mostrarPelicula($id)
        {

                $peli = new peliculas();
                $_SESSION['peliculas'] = $peli->mostrarImagenes($id);
                $_SESSION['directores'] = $peli->mostrarDirector($id);
                $_SESSION['actores'] = $peli->mostrarActores($id);
                $_SESSION['actrices'] = $peli->mostrarActriz($id);
                $_SESSION['sesionesFecha'] = $peli->mostarSesionesFecha($id);
                //var_dump($_SESSION['sesionesFecha'][0]['fecha']);
                //$_SESSION['sesiones'] = $peli->salabutacas($id);
                include "app/views/informacionPelicula.php";
        }
        //funcion para mostrar la lista de peliculas que tiene sesiones
        public function listarpeliculas()
        {

                $peli = new peliculas();
                $peli->listarPeliculas();
                include "app/views/bibliotecaPelicula.php";
                //var_dump($_SESSION['peliculas']);
                //foreach($_SESSION['peliculas'] as $pelic){
                //         echo $pelic['titulo'];
                // }
        }
        //funcion para mostrar las peliculas que has buscado en la búsqueda de peliculas
        public function busquedapeliculas()
        {
                
                $error="";
                if(empty($_REQUEST['buscar']))
                {
                        $error="Introduce ese campo para poder buscar la pelicula";
                }
                if(!empty($_REQUEST['buscar']))
                {
                        $peli=new peliculas();
                        $peli->busqueda($_REQUEST['buscar']);

                }
                else{
                        $error="No hay resultados";
                }
               
                include "app/views/bibliotecaPelicula.php";
                
                return $error;
        }
        //funcion para mostrar las butacas
        public function butacas()
        {
                if (!empty($_REQUEST['fecha'])) {
                        $peli = new peliculas();
                        $_SESSION['sesiones'] = $peli->salabutacas($_REQUEST['fecha'], $_SESSION['peliculas'][0]['id']);
                        $tempo=$peli->obtenerButacasOcupadas($_SESSION['sesiones'][0]['sesionid']);
                        if ($_SESSION['sesiones'] == false) {
                                include "app/views/informacionPelicula.php";
                        }
                        if ($_SESSION['sesiones'][0]['nombreSala'] == 'Sala VIP') {
                                include "app/views/salaButacas2.php";
                        } else if ($_SESSION['sesiones'][0]['nombreSala'] == 'Sala 3D') {
                                include "app/views/salaButacas.php";
                        }
                }
        }

        public function comprarEntradas()
        {

                include "app/views/compraEntradas.php";
                /*
                $peli = new peliculas();
                //var_dump($_SESSION['peliculas']);
                if (!empty($_REQUEST['nombrePelicula']) && !empty($_REQUEST['sala']) && !empty($_REQUEST['hora']) && !empty($_REQUEST['fecha'])) {
                        $peli->Compraentrada($_REQUEST['nombrePelicula'],$_REQUEST['sala'], $_REQUEST['hora'],$_REQUEST['fecha']);
                        if ($_REQUEST['sala'] == "1") {
                                include "app/views/salaButacas.php";
                        } else if ($_REQUEST['sala'] == "2") {
                                include "app/views/salaButacas2.php";
                        } else {
                                include "app/views/compraEntradas.php";
                        }
                } else {
                        echo "Debes introducir todos estos campos";
                }
                */
        }

        //funcion para comprar butacas
        public function compra()
        {
                //include "app/views/Compra.php";
                include "app/views/facturaEntrada.php";
                $peli = new peliculas();
                $peli->comprarButacas($_SESSION['sesiones'][0]['sesionid'], $_POST['butacasSeleccionadas'], $_SESSION['usuarios']['id'], $_SESSION['sesiones'][0]['fechacompra']);
        }
        //funcion para mostrar el lectorQR
        public function realizarQR()
        {
        
                $sesionId = isset($_SESSION['sesiones'][0]['sesionid']) ? $_SESSION['sesiones'][0]['sesionid'] : '';
                $nombreUsuario = isset($_SESSION['usuarios']['nombre']) ? $_SESSION['usuarios']['nombre'] : '';
                $nombrePelicula = isset($_SESSION['sesiones'][0]['nombrePelicula']) ? $_SESSION['sesiones'][0]['nombrePelicula'] : '';
                $butacasSeleccionadas = isset($_SESSION['butacasSeleccionadas']) ? $_SESSION['butacasSeleccionadas'] : '';
                //var_dump($sesionId);
                //var_dump($nombreUsuario);
                //var_dump($nombrePelicula);
                //var_dump($butacasSeleccionadas);
                //exit();
                foreach($butacasSeleccionadas as $butaca)
                {
                        $datos ="Sesión={$sesionId}&Butaca={$butaca}&Usuario={$nombreUsuario}&Película={$nombrePelicula}";
                        QrController::generarQr($datos);
                }
        }
        public function PDF(){
                GenerarPDF::generarPDF("factura.pdf");
        }
}
