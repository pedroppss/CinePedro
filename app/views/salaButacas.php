<script src="node_modules/jquery/dist/jquery.js"></script>
<a href="index.php?ctl=biblioteca"><img src="app/images/salaButacas/vector.png" class="w-6 h-7 ml-8"></a>
<section class="bg-fond_inicio rounded-2xl mt-12 mb-16 h-72 ml-8">
  <div class="grid grid-cols-2 p-8 text-center">
    <div class="flex gap-12 ml-56">
      <button class="bg-button_gray_3 w-28 h-14 text-white font-medium font-poppins text-lg rounded-md">Sala 3D</button>
      <!--<button class="bg-button_gray_4 w-28 h-14 text-white font-medium font-poppins text-lg rounded-md">Sala VIP</button>-->
      <!--<a href="index.php?ctl=butacas_2" class="bg-button_gray_4 w-28 h-14 text-white font-medium font-poppins text-lg rounded-md" type="button"><p class="mt-3">Sala VIP</p></a>-->
    </div>
    <div>
      <p class="text-white font-medium text-3xl font-poppins ">Sala 3D - <?php echo $_SESSION['sesiones'][0]['hora'] ?></p>
      <p class="text-color_white font-normal text-lg font-poppins">Elige tus entradas</p>
    </div>
  </div>
  <div class="flex gap-12 ml-56">
    <button class="bg-p_rose w-28 h-14 text-white font-medium font-poppins text-lg rounded-md ml-8"><?php echo $_SESSION['sesiones'][0]['hora'] ?></button>
    <!--
        <button class="bg-p_rose_2 w-28 h-14 text-white font-medium font-poppins text-lg rounded-md">20:00</button>
        <button class="bg-p_rose_2 w-28 h-14 text-white font-medium font-poppins text-lg rounded-md">23:00</button>-->
  </div>
</section>
<form action="factura" method="POST">
<section>
  <table border="0" class="ml-80 mr-72">
  <?php
    $asientos = array(
      'A' => array(),
      'B' => array(),
      'C' => array(),
      'D' => array(),
      'E' => array(),
      'F' => array(),
      'G' => array(),
      'H' => array()
    );
    for ($row = 'A'; $row <= 'G'; $row++) {
      for ($seat = 0; $seat < 18; $seat++) {
        if(($row !='H') && ($row!='G') && ($row!='F')  && ($row!='E')  && ($row!='D')
            && ($row!='C')  && ($row!='B')&& ($seat==5) || ($seat==12) || ($seat==13)){
          $asientos[$row][$seat] = -1;
        }else{
          $asientos[$row][$seat] = $row . $seat;// (int)($row) * 20 + $seat;
        }
      }
    }
    for ($row = 'H'; $row <= 'H'; $row++) {
      for ($seat = 0; $seat < 21; $seat++) {
        $asientos[$row][$seat] = $row . $seat;//(int)($row) * 20 + $seat;
      }
    }

    
    ?>
    <table border="0" class="ml-80 mr-72">
      <tbody>
        <?php for ($row = 'A'; $row <= 'G'; $row++) { ?>
          <tr>
            <?php for ($seat = 0; $seat < 18; $seat++) { ?>
              <td>
                <?php if ($asientos[$row][$seat] == -1) { ?>
                  <img src="app/images/salaButacas/vacio.png" class="w-11 h-10">
                <?php } else { ?>
                  <div class="relative">
                    <?php if(in_array($row.$seat, $_SESSION['butacasOcupadas'])) { ?>
                        <a href="#" class="seat" id="butaca-<?php echo $asientos[$row][$seat] ?>">
                          <img id="<?php echo $asientos[$row][$seat]; ?>" src="app/images/salaButacas/Unavailable.png" class="w-11 h-10 unavalible" alt="Butaca <?php echo $row . $seat; ?>">
                        </a>
                        <label class="absolute text-black top-[13%] left-[22%] font-poppins text-[15px]"><?php echo $row . $seat; ?></label>
                    <?php } else { ?>
                        <a href="#" class="seat" id="butaca-<?php echo $asientos[$row][$seat] ?>">
                          <img id="<?php echo $asientos[$row][$seat]; ?>" src="app/images/salaButacas/Available.png" class="w-11 h-10" alt="Butaca <?php echo $row . $seat; ?>">
                        </a>
                        <label class="absolute text-black top-[13%] left-[22%] font-poppins text-[15px]"><?php echo $row . $seat; ?></label>
                    <?php } ?>
                  </div>
                <?php } ?>
              </td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <table border="0" class="ml-[183px] mr-[20px]">
      <tbody>
        <?php for ($row = 'H'; $row <= 'H'; $row++) { ?>
          <tr>
            <?php for ($seat = 0; $seat < 21; $seat++) { ?>
              <td>
                <?php if ($asientos[$row][$seat] == -1) { ?>
                  <img src="app/images/salaButacas/vacio.png" class="w-11 h-10">
                <?php } else { ?>
                  <div class="relative">
                    <?php if(in_array($row.$seat, $_SESSION['butacasOcupadas'])) { ?>
                        <a href="#" class="seat" id="butaca-<?php echo $asientos[$row][$seat] ?>">
                          <img id="<?php echo $asientos[$row][$seat]; ?>" src="app/images/salaButacas/Unavailable.png" class="w-11 h-10 unavalible" alt="Butaca <?php echo $row . $seat; ?>">
                        </a>
                        <label class="absolute text-black top-[13%] left-[22%] font-poppins text-[15px]"><?php echo $row . $seat; ?></label>
                    <?php } else { ?>
                        <a href="#" class="seat" id="butaca-<?php echo $asientos[$row][$seat] ?>">
                          <img id="<?php echo $asientos[$row][$seat]; ?>" src="app/images/salaButacas/Available.png" class="w-11 h-10" alt="Butaca <?php echo $row . $seat; ?>">
                        </a>
                        <label class="absolute text-black top-[13%] left-[22%] font-poppins text-[15px]"><?php echo $row . $seat; ?></label>
                    <?php } ?>
                  </div>
                <?php } ?>
              </td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <input type="hidden" name="butacasSeleccionadas" id="butacasSeleccionadas">
    <input type="hidden" name="totalButacasSeleccionadas" id="totalButacasSeleccionadas">
</section>
<section>
  <div class="flex gap-20  justify-center mt-20 mb-20">
    <div>
      <img src="app/images/salaButacas/Unavailable.png" class="w-11 h-10">
      <p class="text-white font-poppins font-normal text-sm -ml-[17px]">Unavailable</p>
    </div>
    <div>
      <img src="app/images/salaButacas/Available.png" class="w-11 h-10">
      <p class="text-white font-poppins font-normal text-sm -ml-[8px]">Available</p>
    </div>
    <div>
      <img src="app/images/salaButacas/Selected.png" class="w-11 h-10">
      <p class="text-white font-poppins font-normal text-sm -ml-[8px]">Selected</p>
    </div>
  </div>
  <button class="bg-p_rose w-1500 h-87 ml-8 mt-20 mb-16 rounded-md text-white text-3xl" type="submit" id="enviar">Comprar</button>
</section>
</form>
<script>
    $(document).ready(function(){
      var totalButacasSeleccionadas = 0;
    $(".seat").on('click', function(event) {
      event.preventDefault();

      if($(this).find("img").hasClass("unavalible")){
        return;
      }

      var currentSrc = $(this).find("img").attr("src");
      var normalSrc = "app/images/salaButacas/Available.png";
      var selectedSrc = "app/images/salaButacas/Selected.png";

      if (currentSrc === normalSrc) {
        $(this).find("img").attr("src", selectedSrc);
        totalButacasSeleccionadas++;
      } else if (currentSrc === selectedSrc) {
        $(this).find("img").attr("src", normalSrc);
        totalButacasSeleccionadas--;
      }
      $(this).find("img").toggleClass("ocupada");
    });    
      $("#enviar").on('click', function(event){
      let cadena="";
      $(".ocupada").each(function(){
        cadena=cadena+$(this).attr("id")+",";
      });
      cadena=cadena.substr(0, cadena.length-1);
      $("#butacasSeleccionadas").val(cadena);
      $("#totalButacasSeleccionadas").val(totalButacasSeleccionadas);
      $("#totalButacasMostradas").text("Total de butacas seleccionadas: " + totalButacasSeleccionadas);
    });
    });
</script>
