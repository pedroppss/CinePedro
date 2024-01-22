
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>DataTables - General | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <?php include '../../admin/assets/config/css.php'; ?>
</head>

<body class="nk-body bg-white npc-default has-aside ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php include '../../admin/assets/templates/header.php'; ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            <?php include '../../admin/assets/templates/asideGestionSalaSesiones.php'; ?><!-- .nk-aside -->
                            <!-- .nk-aside -->
                            <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    <div class="components-preview wide-md mx-auto">
                                        <div class="nk-block-head nk-block-head-lg wide-sm">
                                            <div class="nk-block-head-content">
                                                <div class="nk-block-head-sub"><a class="back-to" href="app/views/login_register.php?ctl=salas"><em class="icon ni ni-arrow-left"></em><span>Lista de Salas-Sesiones</span></a></div>
                                                <h2 class="nk-block-title fw-normal">Gestionar Salas-Sesiones</h2>
                                                <div class="nk-block-des">
                                                    <!--<p class="lead">Using <a href="https://datatables.net/" target="_blank">DataTables</a>, add advanced interaction controls to your HTML tables. It is a highly flexible tool and all advanced features allow you to display table instantly and nice way.</p>
                                                    <p>Check out the <a href="https://datatables.net/" target="_blank">documentation</a> for a full overview.</p>-->
                                                    <p class="lead">Esto es para Gestionar salas-Sesiones</p>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head -->
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Gestión Salas-Sesiones</h4>
                                                </div>
                                            </div>
                                            <form action="app/views/login_register.php?ctl=gestionarsalasesiones" method="POST" enctype="multipart/form-data">
                                                <label class="form-label" for="default-01">Seleccionar Pelicula:</label>
                                                <br>
                                                <select name="nombrePelicula" id="nombrePelicula" placeholder="nombre de la Pelicula">
                                                    <?php foreach ($_SESSION['peliculas'] as $peli) { ?>
                                                        <option value="<?php echo $peli['id']?>"><?php echo $peli['titulo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br>
                                                <br>
                                                <label class="form-label" for="default-02">Seleccionar sala:</label>
                                                <br>
                                                <select name="nombreSala" id="nombreSala" placeholder="nombre de la Sala">
                                                        <option value="1">Sala 3D</option>
                                                        <option value="2">Sala VIP</option>
                                                </select>
                                                <br>
                                                <br>
                                                <?php
                                                //Obtener la fecha actual
                                                $fechaActual=date('Y-m-d');
                                                //Sumar un día a la fecha actual
                                                $fechaManana=date('Y-m-d',strtotime($fechaActual.' + 1 day'));
                                                ?>
                                                <label class="form-label" for="default-03">Fecha de la Sesión:</label>
                                                <br>
                                                <input type="date" id="fecha" name="fecha" min="<?=$fechaManana?>">
                                                <br>
                                                <br>
                                                <label class="form-label" for="default-04">Hora de la Sesión</label>
                                                <br>
                                                <select name="horaSesion" id="horaSesion">
                                                        <option value="1">17:00:00</option>
                                                        <option value="2">20:00:00</option>
                                                        <option value="3">23:00:00</option>
                                                </select>
                                                <br>
                                                <br>
                                                <label class="form-label" for="default-05">Precio de la Entrada</label>
                                                <br>
                                                <input type="text" name="precio" id="precio" placeholder="Precio de la Entrada">
                                                <br>
                                                <button class="w-300 h-12 mt-7 ml-[299px] bg-rose-600 text-2xl font-normal text-white font-poppins" type="submit" name="asignar" id="asignar" value="añadir">Asignar</button>
                                            </form>
                                        </div> <!-- nk-block -->
                                    </div><!-- .components-preview -->
                                </div>
                                <!-- footer @s -->
                                <?php include '../../admin/assets/templates/footer.php'; ?>
                                <!-- footer @e -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- JavaScript -->
    <?php include '../../admin/assets/config/js.php'; ?>
    <script src="./assets/js/libs/datatable-btns.js?ver=3.2.3"></script>
</body>

</html>