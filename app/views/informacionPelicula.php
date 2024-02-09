
<section>
    <div class="grid grid-cols-2">
        <div>
            <a href="biblioteca"><img src="app/images/informacionPeliculas/vector.png" class="w-6 h-7"></a>
            <h1 class="p-8 text-white  text-7xl font-poppins font-normal"><?php echo $_SESSION['peliculas'][0]['titulo'] ?></h1><!--Nombre de la pelicula-->
            <ul class="flex gap-7 mt-6 ml-8 text-color_gray">
                <li><?=$_SESSION['peliculas'][0]['clasif'] ?></li>
                <li><?=$_SESSION['peliculas'][0]['año'] ?></li>
                <li><?=$_SESSION['peliculas'][0]['genero'] ?></li>
                <li><?=$_SESSION['peliculas'][0]['duracion'] ?></li>
                <li><?=$_SESSION['peliculas'][0]['edad'] ?></li>
            </ul>
            <p class="text-white font-normal font-poppins text-sm ml-8 mt-7"><?= $_SESSION['peliculas'][0]['argumento'] ?></p> <!--Argumento-->
            <div class="flex  gap-2 ml-8 mt-4">
                <p class="text-color_gray font-normal font-poppins text-sm">Director:</p>
                <p class="text-white font-normal font-poppins text-sm"><?= $_SESSION['directores'][0]['nombre'] ?></p> <!--Nombre_de_Director-->
            </div>
            <div class="flex gap-2 ml-8 mt-4">
                <p class="text-color_gray font-normal font-poppins text-sm">Actors:</p>
                <p class="text-white font-normal font-poppins text-sm">
                    <?php foreach ($_SESSION['actores'] as $actores) { ?>
                        <?= $actores['nombre'] . ", " ?>
                    <?php } ?>
                    <?php foreach ($_SESSION['actrices'] as $actrices) { ?>
                        <?= $actrices['nombre'] . ", " ?>
                    <?php } ?>
                </p> <!--Actores-->
            </div>
            <form action="butacas" method="POST">
                <div>
                    <p class="text-color_gray font-normal font-poppins text-sm ml-8 mt-8">Selecciona el día:</p>
                    <select name="fecha" class="ml-8 mt-2 text-[18px] font-poppins rounded-md">
                        <!--
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                            $siguienteDia = date('Y-m-d', strtotime("+$i day"));
                            $formattedDate = date('l j F', strtotime("+$i day"));
                        ?>
                            <option value="<?php echo $siguienteDia ?>">
                                <?= $formattedDate ?>
                            </option>
                        <?php } ?>
                        -->
                        <?php foreach($_SESSION['sesionesFecha'] as $sesion){?>
                            <option value="<?php echo $sesion['fecha']?>">
                                <?php echo $sesion['fecha']?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!--
                <div>
                    <p class="text-color_gray font-normal font-poppins text-sm ml-8 mt-8">Selecciona la Sala: </p>
                    <select name="sala" class="ml-8 mt-2 text-[18px] font-poppins rounded-md">
                        <?php foreach ($_SESSION['sesiones'] as $ses) { ?>
                            <option value="<?php echo $ses['id'] ?>"><?php echo $ses['nombreSala'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <p class="text-color_gray font-normal font-poppins text-sm ml-8 mt-8">Selecciona la Hora: </p>
                    <select name="hora" class="ml-8 mt-2 text-[18px] font-poppins rounded-md">
                        <?php foreach ($_SESSION['sesiones'] as $ses) { ?>
                            <option value="<?php echo $ses['idHora'] ?>"><?php echo $ses['nombreSala'] ?> - <?php echo $ses['hora'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                <p class="text-color_gray font-normal font-poppins text-sm ml-8 mt-8">ID de la Pelicula :</p>
                    <select class="ml-8 mt-2 text-[18px] font-poppins rounded-md" name="id" id="id">
                    <?php foreach ($_SESSION['sesiones'] as $ses) { ?>
                            <option value="<?php echo $ses['idPelis']?>"><?php echo $ses['idPelis']?></option>
                    <?php } ?>
                    </select>
                </div>
                    -->
                <div class="grid grid-cols-2 justify-between mt-32 ml-8">
                    <div class="flex gap-4">
                        <button class="bg-button_gray w-28 h-11 rounded-md text-white font-medium font-poppins text-base">Trailer</button>
                        <button class="bg-fond_pink w-28 h-11 rounded-md text-white font-medium font-poppins text-base" type="submit" name="comprar" id="comprar">
                            <p>Comprar</p>
                        </button>
                    </div>
                    <div class="flex gap-4">
                        <img class="w-8 h-8" src="app/images/informacionPeliculas/gusta.png">
                        <img class="w-8 h-8" src="app/images/informacionPeliculas/marcador.png">
                    </div>
                </div>
            </form>
        </div>
        <div>
            <img src="app/images/carteles/<?= $_SESSION['peliculas'][0]['imagen']?>" class="w-1000 h-620 -ml-1 rounded-md" alt="">
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