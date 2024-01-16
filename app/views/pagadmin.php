
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dist/output.css" type="text/css"/>
        <title>Bienvenido administrador</title>
</head>
<body class="container max-w-screen-2xl mx-auto bg-fond_black">
   <header class="container max-w-screen-2xl p-11 grid grid-cols-2">
        <img src="../images/login_register/logo.png" style="width: 179.23px ; height: 55px;" alt="logo">
        <div class="flex justify-end text-white font-normal font-poppins gap-6 text-sm">
            <a href="login_register.php?ctl=logout">Cerrar Sesion</a>
            <a href="login_register.php?ctl=adminPrincipal">Admin</a>
        </div>
   </header>
   <main class="bg-no-repeat bg-personalized h-personalized grid content-around justify-around" style="background-image: url(../images/login/fondo-imagenes.png);">
                <div class="p-24 w-500 h-516 rounded-2xl bg-fond_transp">
                        <img src="../images/avatar/<?= $_SESSION["usuarios"]["avatar"]?>" class="w-[106px] ml-[100px] rounded-[57px]">
                        <p class="text-white font-poppins font-normal text-lg mt-5 ml-3">Bienvenido administrador: <?=$_SESSION["usuarios"]["nombre"]?></p>
                        <a class="w-300 h-12 mt-[50px] ml-2 bg-rose-600 text-2xl font-normal text-white font-poppins" type="submit" href="../../index.php"><p class="text-center mt-2">Ir al inicio</p></a> 
                </div>
    </main>
</body>
</html>