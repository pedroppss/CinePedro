<?php
include "app/models/peliculas.php";
class controllersPeliculas{
    /*
    public function listar(){
        $peli=new peliculas();
        $_SESSION['peliculas']=$peli->listarPeliculas();
        var_dump($_SESSION['peliculas']);
    }
    */
    public function mostrar_fast_furious(){
        //$id=(isset($_GET["id"]) ? intval($_GET["id"]):0);
        //if($id==2){
            //isset($_SESSION)?:session_start();
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(2);
            $_SESSION['directores']=$peli->mostrarDirector(2);
            $_SESSION['actores']=$peli->mostrarActores(2);
            $_SESSION['actrices']=$peli->mostrarActriz(2);

            //var_dump($_SESSION['peliculas']);
            //var_dump($_SESSION['directores']);
            //var_dump($_SESSION['actores']);
            //var_dump($_SESSION['actores']['nombre']);
            //var_dump($_SESSION['actores']['imagen']);
            //var_dump($_SESSION['actrices']['nombre']);
                
       
    }
    public function mostrar_air()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(3);
            $_SESSION['directores']=$peli->mostrarDirector(3);
            $_SESSION['actores']=$peli->mostrarActores(3);
            $_SESSION['actrices']=$peli->mostrarActriz(3);
    }
    public function mostrar_transformers()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(5);
            $_SESSION['directores']=$peli->mostrarDirector(5);
            $_SESSION['actores']=$peli->mostrarActores(5);
            $_SESSION['actrices']=$peli->mostrarActriz(5);
    }
    public function mostrar_sawx()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(7);
            $_SESSION['directores']=$peli->mostrarDirector(7);
            $_SESSION['actores']=$peli->mostrarActores(7);
            $_SESSION['actrices']=$peli->mostrarActriz(7);
    }
    public function mostrar_65()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(1);
            $_SESSION['directores']=$peli->mostrarDirector(1);
            $_SESSION['actores']=$peli->mostrarActores(1);
            $_SESSION['actrices']=$peli->mostrarActriz(1);
    }
    public function mostrar_godzilla_kong()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(6);
            $_SESSION['directores']=$peli->mostrarDirector(6);
            $_SESSION['actores']=$peli->mostrarActores(6);
            $_SESSION['actrices']=$peli->mostrarActriz(6);
           
    }
    public function mostrar_spiderman()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(8);
            $_SESSION['directores']=$peli->mostrarDirector(8);
            $_SESSION['actores']=$peli->mostrarActores(8);
            $_SESSION['actrices']=$peli->mostrarActriz(8);
    }
    public function mostrar_aquaman()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(9);
            $_SESSION['directores']=$peli->mostrarDirector(9);
            $_SESSION['actores']=$peli->mostrarActores(9);
            $_SESSION['actrices']=$peli->mostrarActriz(9);
    }
    public function mostrar_guardianes_galaxia()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(4);
            $_SESSION['directores']=$peli->mostrarDirector(4);
            $_SESSION['actores']=$peli->mostrarActores(4);
            $_SESSION['actrices']=$peli->mostrarActriz(4);
    }
    public function mostrar_sirena()
    {
            $peli=new peliculas();
            $_SESSION['peliculas']=$peli->mostrarImagenes(10);
            $_SESSION['directores']=$peli->mostrarDirector(10);
            $_SESSION['actores']=$peli->mostrarActores(10);
            $_SESSION['actrices']=$peli->mostrarActriz(10);
    }
    
}