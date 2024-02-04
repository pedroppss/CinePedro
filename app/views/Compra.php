<section class="bg-fond_inicio rounded-2xl mt-12 mb-14 h-[500px] ml-8 p-8">
    <h1 class="text-white">Id del Usuario</h1><p class="text-white"><?php echo $_SESSION['usuarios']['id']?></p>
    <h1 class="text-white">Id de la Pelicula</h1><p class="text-white"><?php echo $_SESSION['sesiones'][0]['id']?></p>
    <h1 class="text-white">Nombre de la Pelicula</h1><p class="text-white"><?php echo $_SESSION['sesiones'][0]['nombrePelicula']?></p>
    <h1 class="text-white">Nombre de la Sala</h1><p class="text-white"><?php echo $_SESSION['sesiones'][0]['nombreSala']?></p>
    <h1 class="text-white">Fecha de compra</h1><p class="text-white"><?php echo $_SESSION['sesiones'][0]['fechacompra']?></p>
    <h1 class="text-white">Precio de la entrada</h1><p class="text-white"><?php echo $_SESSION['sesiones'][0]['precio']?></p>
    <h1 class="text-white">Butacas Seleccionadas</h1><p class="text-white"><?php var_dump($_POST["butacasSeleccionadas"])?></p>
    <h1 class="text-white">Total de Butacas</h1><p class="text-white"><?php echo var_dump($_POST["totalButacasSeleccionadas"])?></p>
    <?php
    $_POST['butacasSeleccionadas']=explode(",",$_POST['butacasSeleccionadas']);
    $precioEntrada=$_SESSION['sesiones'][0]['precio'];
    $precioTotal=$precioEntrada*$_POST["totalButacasSeleccionadas"]
    ?>
    <h1 class="text-white">Precio Total: </h1><p class="text-white"><?php echo $precioTotal?>€</p>
    <a href="index.php?ctl=QR" type="submit" class="text-white">Ver QR,pulse aqui</button>
</section>