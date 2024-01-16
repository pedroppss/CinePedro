<?php
session_start();
?>
<section>
    <div class="grid grid-cols-2">
        <div>
            <a href="index.php?ctl=default"><img src="app/images/informacionPeliculas/vector.png" class="w-6 h-7"></a>
            <h1 class="p-8 text-white  text-7xl font-poppins font-normal"><?=$_SESSION['peliculas']['nombre'][0]?></h1><!--Nombre de la pelicula-->
            <ul class="flex gap-7 mt-6 ml-8 text-color_gray">
                <li><?=$_SESSION['peliculas']['clasificacion'][0]?></li>
                <li><?=$_SESSION['peliculas']['año'][0]?></li>
                <li><?=$_SESSION['peliculas']['genero'][0]?></li>
                <li><?=$_SESSION['peliculas']['duracion'][0]?></li>
                <li><?=$_SESSION['peliculas']['edad'][0]?></li>
            </ul>
            <p class="text-white font-normal font-poppins text-sm ml-8 mt-7"><?=$_SESSION['peliculas']['argumento'][0]?></p> <!--Argumento-->
            <div class="flex  gap-2 ml-8 mt-4">
                <p class="text-color_gray font-normal font-poppins text-sm">Director:</p>
                <p class="text-white font-normal font-poppins text-sm"><?=$_SESSION['directores']['nombre'][1]?></p> <!--Nombre_de_Director-->
                <img src="app/images/directores/<?=$_SESSION['directores']['imagen'][1]?>" class="w-20 h-20 rounded-2xl ml-8">
            </div>
            <div class="flex gap-2 ml-8 mt-4">
                <p class="text-color_gray font-normal font-poppins text-sm">Actors:</p>
                <p class="text-white font-normal font-poppins text-sm">
                <?php foreach($_SESSION['actores']['nombre'] as $actores){?>
                        <?=$actores.", "?>
                        <?php } ?>
                <?php foreach($_SESSION['actrices']['nombre'] as $actrices){?>
                        <?=$actrices.", "?>
                        <?php } ?>
                </p> <!--Actores-->  
            </div>
            <div class="flex mt-40">
            <?php foreach($_SESSION['actores']['imagen'] as $images){?>
                    <img src="app/images/actores/<?= $images ?>" class="w-32 h-32 rounded-2xl ml-8"> 
            <?php } ?>
            <?php foreach($_SESSION['actrices']['imagen'] as $images2){?>
                    <img src="app/images/actores/<?= $images2 ?>" class="w-32 h-32 rounded-2xl ml-8">
            <?php } ?>
            </div>
            <div class="grid grid-cols-2 justify-between mt-32 ml-8">
                    <div class="flex gap-4">
                        <button class="bg-button_gray w-28 h-11 rounded-md text-white font-medium font-poppins text-base">Trailer</button>
                        <a href="index.php?ctl=butacas" class="bg-rose-600 w-28 h-11 rounded-md text-white font-medium font-poppins text-base"><p class="text-center mt-3">Comprar</p></a>
                    </div>
                    <div class="flex gap-4">
                        <img class="w-8 h-8" src="app/images/informacionPeliculas/gusta.png">
                        <img class="w-8 h-8" src="app/images/informacionPeliculas/marcador.png">
                    </div>
            </div>
        </div>
        <div>
            <img src="app/images/carteles/<?=$_SESSION['peliculas']['imagen'][0]?>" class="w-1000 h-620 -ml-1 rounded-md" alt="">
        </div>
    </div>
</section>
<section class="bg-fond_inicio rounded-2xl mt-12 mb-16 h-72">
    <h1 class="p-8 text-color_gray_2 font-poppins font-medium text-3xl">Recomendaciones</h1>
    <div class="flex gap-10 ml-8">
        <a href=""><img src="app/images/informacionPeliculas/vengadores.png" class="w-64 h-36"></a>
        <a href=""><img src="app/images/informacionPeliculas/thor.png" class="w-64 h-36"></a>
        <a href=""><img src="app/images/informacionPeliculas/strange.png" class="w-64 h-36"></a>
        <a href=""><img src="app/images/informacionPeliculas/wonder.png" class="w-64 h-36"></a>
        <a href=""><img src="app/images/informacionPeliculas/darkness.png" class="w-64 h-36"></a>
    </div>
</section>


