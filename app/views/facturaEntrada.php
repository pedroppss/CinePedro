<!--esta muestra la factura lo que has comprado y tambien muestra el lector QR-->
<?php
    $precioEntrada=$_SESSION['sesiones'][0]['precio'];
    $precioTotal=$precioEntrada*$_POST["totalButacasSeleccionadas"]; 
?>
<a href="biblioteca"><img src="app/images/salaButacas/vector.png" class="w-6 h-7 ml-8"></a>
<section class="bg-fond_inicio rounded-2xl mt-12 mb-14 h-[99px] ml-8">
    <p class="text-white font-poppins text-[30px] font-medium p-8">Pagar entradas</p>
</section>
<section class="bg-fond_white w-[499px] h-[789px] rounded-[13px] ml-[550px] border-[1px] border-gray_factura">
    <h1 class="p-8 text-[#333333E5] font-roboto text-[24px] font-medium">Factura</h1>
    <p class="ml-8 text-[#333333CC] font-roboto text-[16px] font-bold">Datos</p>
    <div class="grid grid-cols-2 ml-8 mt-2">
        <div>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">ID de la Pelicula</p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Nombre del Usuario</p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Fecha de la Compra</p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Nombre de la Pelicula</p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Nombre de la Sala</p>
        </div>
        <div class="ml-[10px]">
                <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_SESSION['sesiones'][0]['idPelicula']?></p>
                <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_SESSION['usuarios']['nombre']?></p>
                <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_SESSION['sesiones'][0]['fechacompra']?></p>
                <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_SESSION['sesiones'][0]['nombrePelicula']?></p>
                <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_SESSION['sesiones'][0]['nombreSala']?></p>
            <!--
            <div>
                <p class="text-color_shade_700 font-roboto text-[16px]">X3</p>
                <p class="text-color_shade_700 font-roboto text-[16px]">X3</p>
            </div>
            -->
        </div>
    </div>
    <p class="w-[419px] h-[1px] bg-shade_300 ml-[32px] mt-[32px]"></p>
    <p class="ml-8 text-[#333333CC] font-roboto text-[16px] font-bold mt-[32px]">Butacas y Precio</p>
    <div class="grid grid-cols-2 ml-8 mt-[16px]">
        <div>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Total de Butacas Seleccionadas</p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal">Precio de Entrada</p>
        </div>
        <div class="ml-[10px]">
            <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $_POST["totalButacasSeleccionadas"]?></p>
            <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $precioEntrada ?> €</p>
        </div>
    </div>
    <p class="w-[419px] h-[1px] bg-shade_300 ml-[32px] mt-[32px]"></p>
    <div class="grid grid-cols-2  ml-8 mt-[18px]">
        <div>
            <p class="text-[#333333CC] font-roboto text-[16px] font-bold">Precio Total</p>
        </div>
        <div class="ml-[10px]">
            <p class="text-[#333333] font-roboto text-[16px] font-normal"><?php echo $precioTotal?> €</p>
        </div>
    </div>
    <p class="w-[419px] h-[1px] bg-shade_300 ml-[32px] mt-[18px]"></p>
    <div class="grid grid-cols-2 ml-8 mt-[32px]">
        <div>
            <p class="text-[#333333] font-roboto text-[16px] font-bold">Metode Pembayaran</p>
            <p class="text-[#333333] font-roboto text-[16px] font-bold">Lector QR</p>
        </div>
        <div>
            <p class="text-color_sky_blue font-[12px] font-bold font-roboto">Lihat Semua</p>
            <a href="QR" class="text-color_sky_blue font-[12px] font-bold font-roboto" type="submit" class="text-white">Ver QR,pulse aqui</a>
        </div>
    </div>
    <div class="flex ml-8 mt-[22px] gap-[16px]">
        <img src="app/images/factura/logo.png" class="w-[58px] h-[16px]">
        <p class="text-[#333333] text-[18px] font-normal font-roboto">DANA</p>
    </div>
    <div class="mt-[6px] ml-8">
        <input type="checkbox" id="miCheckbox" name="miCheckbox" class="w-[26px] h-[25px] bg-checkbox_black text-checkbox_black">
            <label for="checkbox" class="text-[#333333CC] text-[16px] font-normal font-poppins ml-2 align-super">Enviar factura al email</label> 
    </div>
    <form action="index.php?ctl=registrar" method="POST">
    <button class="w-[419px] pt-[16px] pb-[16px] pl-[12px] pr-[12px] bg-royal_blue ml-8 mt-[22px] rounded-[8px] text-sunshine_yellow font-roboto text-[24px] font-medium text-center">RESERVAR</button>
    </form>
</section>