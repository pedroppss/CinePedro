<?php
session_start();
?>
<section class=" bg-fond_inicio rounded-2xl mt-12 mb-14 h-[699px] ml-[429px] mr-[372px]">
    <h1 class="p-8 text-center text-white text-[28px] font-poppins font-medium">Formulario de Compra de Entradas</h1>
    <form action="index.php?ctl=compra" method="POST">
        <label for="pelicula" class="ml-8 text-white font-poppins font-medium text-[22px]">Seleciona una pelicula:</label>
        <br>
        <select name="nombrePelicula" id="nombrePelicula" placeholder="nombre de la Pelicula" class="ml-8 mt-2 text-[18px] font-poppins rounded-md" required>
            <?php foreach ($_SESSION['peliculas'] as $peli) { ?>
                <option value="<?php echo $peli['id']?>"><?php echo $peli['titulo']?></option>
            <?php } ?>
        </select>
        <br>
        <br>
        <label for="fecha" class="ml-8 text-white font-poppins font-medium text-[22px]">Selecciona una dia:</label>
        <table class="text-white ml-8 mt-4">
            <tr class="flex gap-5 border-2 w-[653px] h-[77px] rounded-sm border-green-950 bg-green-900">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $siguienteDia = date('Y-m-d', strtotime("+$i day")); ?>
                    <td class="text-white font-semibold border-2 h-[60px] mt-[7px] ml-[10px] mb-[2px] rounded-sm bg-green-950 border-green-900">
                        <button type="button" class="custom-button" onclick="seleccionarFecha('<?= $siguienteDia ?>')" value="<?= $siguienteDia ?>">
                            <?= date('l j F', strtotime("+$i day")) ?>
                        </button>
                    </td>
                <?php } ?>
            </tr>
        </table>
        <input type="hidden" id="fechaSeleccionada" name="fecha"  required>
        <br>
        <label for="sala" class="ml-8 text-white font-poppins font-medium text-[22px]">Selecciona una sala:</label>
        <br>
        <select id="sala" name="sala" class="ml-8 mt-2 text-[18px] font-poppins rounded-md" required>
            <option value="1">Sala VIP</option>
            <option value="2">Sala 3D</option>
        </select>
        <br>
        <br>
        <label for="hora" class="text-white font-poppins font-medium text-[22px] ml-8" >Hora de la sesión:</label>
        <br>
        <select id="hora" name="hora" class="ml-8 mt-2 text-[18px] font-poppins rounded-md" required>
            <option value="1">17:00</option>
            <option value="2">20:00</option>
            <option value="3">23:00</option>
        </select>
        <br>
        <br>
        <input type="submit" name="butacas" value="Ver Butacas Disponibles" class="w-[563px] h-12  ml-[84px] mt-[37px] bg-rose-600 text-2xl font-normal text-white font-poppins rounded-lg">
    </form>
    <script>
        function seleccionarFecha(fecha) {
            document.getElementById('fechaSeleccionada').value = fecha;
        }
    </script>
</section>