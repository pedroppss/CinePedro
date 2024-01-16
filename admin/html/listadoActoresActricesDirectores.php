
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
                        <?php include '../../admin/assets/templates/asideActoresActricesDirectores.php'; ?><!-- .nk-aside -->
                           <!-- .nk-aside -->
                            <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    <div class="components-preview wide-md mx-auto">
                                        <div class="nk-block-head nk-block-head-lg wide-sm">
                                            <div class="nk-block-head-content">
                                                <div class="nk-block-head-sub"><a class="back-to" href="app/views/login_register.php?ctl=adminPrincipal"><em class="icon ni ni-arrow-left"></em><span>Ir a la Página principal</span></a></div>
                                                <h2 class="nk-block-title fw-normal">Lista de Actores, Actrices y Directores</h2>
                                                <div class="nk-block-des">
                                                    <!--<p class="lead">Using <a href="https://datatables.net/" target="_blank">DataTables</a>, add advanced interaction controls to your HTML tables. It is a highly flexible tool and all advanced features allow you to display table instantly and nice way.</p>
                                                    <p>Check out the <a href="https://datatables.net/" target="_blank">documentation</a> for a full overview.</p>-->
                                                <p class="lead">Esto es una lista de todos los actores, actrices y directores</p>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head -->
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Actores</h4>
                                                </div>
                                            </div>
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <table class="datatable-init table">
                                                        <thead>
                                                            <tr>
                                                                <th>Foto de Actor</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo</th>
                                                                <th>Titulo de la Pelicula</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($_SESSION['actores'] as $actor){ ?>
                                                            <tr>
                                                                <td><img src="app/images/actores/<?php echo $actor['foto']?>"></td>
                                                                <td><?php echo $actor['nombre'] ?></td>
                                                                <td><?php echo $actor['tipo'] ?></td>
                                                                <td><?php echo $actor['tituloPelicula'] ?></td>
                                                            </tr>
                                                           <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .card-preview -->
                                        </div> <!-- nk-block -->
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Actrices</h4>
                                                </div>
                                            </div>
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <table class="datatable-init table">
                                                        <thead>
                                                            <tr>
                                                                <th>Foto de Actriz</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo</th>
                                                                <th>Titulo de la Pelicula</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($_SESSION['actrices'] as $actriz){ ?>
                                                            <tr>
                                                                <td><img src="app/images/actores/<?php echo $actriz['foto']?>"></td>
                                                                <td><?php echo $actriz['nombre'] ?></td>
                                                                <td><?php echo $actriz['tipo'] ?></td>
                                                                <td><?php echo $actriz['tituloPelicula'] ?></td>
                                                            </tr>
                                                           <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .card-preview -->
                                        </div> <!-- nk-block -->
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Directores</h4>
                                                </div>
                                            </div>
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <table class="datatable-init table">
                                                        <thead>
                                                            <tr>
                                                                <th>Foto de Director</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo</th>
                                                                <th>Titulo de la Pelicula</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($_SESSION['directores'] as $director){ ?>
                                                            <tr>
                                                                <td><img src="app/images/directores/<?php echo $director['foto']?>"></td>
                                                                <td><?php echo $director['nombre'] ?></td>
                                                                <td><?php echo $director['tipo'] ?></td>
                                                                <td><?php echo $director['tituloPelicula'] ?></td>
                                                            </tr>
                                                           <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .card-preview -->
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