<!--Biblioteca que muestra las peliculas que tienen las sesiones-->
<main class="bg-fond_inicio rounded-2xl">
    <!--esta es la primera section-->
    <section class="p-8 font-poppins font-medium">
        <h1 class="text-white text-[30px]">Buscar peliculas</h1>
        <p class="text-color_white text-[18px] font-normal mt-[19px]">PlayON online cinema offers more than three thousand films for viewing, including new releases and premieres</p>
    </section>
    <section class="ml-8 mt-[50px] flex gap-[15px]">
        <button class="w-[99px] h-[46px] rounded-[6.26px] bg-button_2 text-color_button_2 font-poppins  font-normal text-[18px]">Genres</button>
        <button class="w-[134px] h-[46px] rounded-[6.26px] bg-button_3 text-color_button_2 font-poppins font-normal text-[18px]">Released</button>   
    </section>
    <!--esta es la segunda section-->
    <section class="ml-14 mt-[125px]">
        <div class="grid grid-cols-6 gap-10 ml-[19px] mr-[65px]">
            <?php foreach($_SESSION['peliculas'] as $pelicula){ ?>
                <div class="flex">
                <a href="index.php?ctl=id&id=<?=$pelicula['id']?>"><img src="app/images/carteles/<?php echo $pelicula['imagen']?>" class="w-[200px] h-[296px] rounded-sm"></a>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--esta es la tercera section-->
    <section class="mt-[42.08px]">
        <div class="flex gap-[14px] justify-center">
            <a href="#"><img src="app/images/bibliotecas/derecha.png" class="w-[37px] h-[48px]"></a>
            <a href="#" class="w-[37px] h-[48px] rounded-[5px] bg-button_4 border-[1.108px] border-gray_2 text-white text-[30px] font-medium font-poppins text-center">1</a>
            <a href="#" class="w-[37px] h-[48px] rounded-[5px] bg-button_4 border-[1.108px] border-gray_2 text-white text-[30px] font-medium font-poppins text-center">2</a>
            <a href="#"><img src="app/images/bibliotecas/izquierda.png" class="w-[37px] h-[48px] mb-[47px]"></a>
        </div>  
    </section>
</main>