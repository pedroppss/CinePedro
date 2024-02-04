<?php
include "app/models/peliculas.php";
include_once "QrController.php";
class controllersPeliculas
{
        
        public function mostrarPelicula($id)
        {
               
                $peli = new peliculas();
                $_SESSION['peliculas'] = $peli->mostrarImagenes($id);
                $_SESSION['directores'] = $peli->mostrarDirector($id);
                $_SESSION['actores'] = $peli->mostrarActores($id);
                $_SESSION['actrices'] = $peli->mostrarActriz($id);
                //$_SESSION['sesiones'] = $peli->salabutacas($id);
                include "app/views/informacionPelicula.php";
                
        }
        public function listarpeliculas()
        {
                
                $peli = new peliculas;
                $peli->listarPeliculas();
                include "app/views/bibliotecaPelicula.php";    
                //var_dump($_SESSION['peliculas']);
                //foreach($_SESSION['peliculas'] as $pelic){
                //         echo $pelic['titulo'];
                // }
        }
        public function butacas()
        {
                if(!empty($_REQUEST['fecha']))
                {
                        $peli = new peliculas();
                        $_SESSION['sesiones']=$peli->salabutacas($_REQUEST['fecha'],$_SESSION['peliculas'][0]['id']);
                        
                        if($_SESSION['sesiones']==false)
                        {
                                include "app/views/informacionPelicula.php";
                        }
                        if($_SESSION['sesiones'][0]['nombreSala']=='Sala VIP')
                        {
                                 include "app/views/salaButacas2.php";
                        }
                        else if($_SESSION['sesiones'][0]['nombreSala']=='Sala 3D')
                        {
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
        
        public function compra()
        {
        include "app/views/Compra.php";
        $peli=new peliculas();
        $peli->comprarButacas($_SESSION['sesiones'][0]['id'],$_POST['totalButacasSeleccionadas'],$_SESSION['usuarios']['id'],$_SESSION['sesiones'][0]['fechacompra']);
        }
        public function realizarQR()
        {
                QrController::generarQr();
                $sesionId = isset($_SESSION['sesiones'][0]['id']) ? $_SESSION['sesiones'][0]['id'] : '';
                $butaca = isset($_POST["butacasSeleccionadas"]) ? $_POST["butacasSeleccionadas"] : '';
                $nombreUsuario = isset($_SESSION['usuarios']['nombre']) ? $_SESSION['usuarios']['nombre'] : '';
                $nombrePelicula = isset($_SESSION['sesiones'][0]['nombrePelicula']) ? $_SESSION['sesiones'][0]['nombrePelicula'] : ''; 
                $datos = "Sesión={$sesionId}||Butaca={$butaca}||Usuario={$nombreUsuario}||Película={$nombrePelicula}";
                QrController::generarQr($datos);     
        }

}
