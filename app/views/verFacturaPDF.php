<!--esto muestra la factura pero en formato pdf-->
<?php
$rutaImagenPelicula = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/app/images/carteles/';
$rutaImagenUsuario = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/app/images/avatar/';
$rutaLogo = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/app/images/login/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/css/dist/output.css" type="text/css" />
    <title>FACTURA PDF</title>
</head>

<body>
    <!--<img src="<?= $rutaLogo ?>logo.png" style="width: 179.23px ; height: 55px;" alt="Logo">-->
    <section>
        <img src="../../app/images/login/logo.png" class="mt-[8rem] ml-[21rem]" style="width: 179.23px ; height: 55px;" alt="Logo">
        <div class="ml-[21rem] mt-[30px]">
            <p class="font-poppins font-bold">Fecha de compra:</p>
            <p></p><!--fecha de compra-->
            <p class="font-poppins mt-[5px]">86390-WHMKZ88-609144</p>
            <p class="w-[527px] font-poppins mt-[5px]">Autorizado medianta la resolucion Nro. 01235562123/SUNAT Representacion impresa de la factura Electrónica.
                Este documentado puede ser validado en http://143.47.43.204:8080/pedro/Cine-Pedro/. Serie y correlativo BB06-2124656
            </p>
        </div>
    </section>
    <p class="mt-[40px] ml-[21rem] w-[72rem] border-[1px] border-gray"></p>
    <section>
        <!--Nombre de la Pelicula-->
        <h1 class=" ml-[21rem] mt-[20px] text-[40px] font-poppins text-black font-extrabold">Pablo,Apóstol de Cristo</h1>
        <div class="flex gap-[10px]">
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Lugar:</p>
            <p class="text-[20px] font-medium font-poppins">Cine-Pedro San Miguel</p>
        </div>
        <div class="flex gap-[10px]">
            <!--fecha de compra-->
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Fecha:</p>
            <p class="text-[20px] font-medium font-poppins"></p>
        </div>
        <div class="flex gap-[10px]">
            <!--Nombre de la sala-->
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Sala:</p>
            <p class="text-[20px] font-medium font-poppins"></p>
        </div>
        <div class="flex gap-[10px]">
            <!--edad-->
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Censura:</p>
            <p class="text-[20px] font-medium font-poppins"></p>
        </div>
        <div class="flex gap-[10px]">
            <!--Numero de Asientos-->
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Asientos:</p>
            <p class="text-[20px] font-medium font-poppins"></p>
        </div>
        <div class="flex gap-[10px]">
            <!--cliente-->
            <p class="ml-[21rem] text-[20px] font-poppins font-extrabold">Cliente:</p>
            <p class="text-[20px] font-medium font-poppins"></p>
        </div>
    </section>
    <p class="mt-[40px] ml-[21rem] w-[72rem] border-[1px] border-gray"></p>
    <section class="mt-[20px]">
        <table class="ml-[21rem] border-collapse">
            <tr class="border-[1px] border-b-black flex gap-[391px] text-left">
                <th>Cantidad de Butacas</th>
                <th>Nombre de la Pelicula</th>
                <th>Precio</th>
            </tr>
            <tr class="border-[1px] border-b-black flex gap-[391px] text-left">
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </section>
</body>

</html>