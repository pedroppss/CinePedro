<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dist/output.css" type="text/css"/>
        <title>Registro</title>
</head>
<body  class="container max-w-screen-2xl mx-auto bg-fond_black">
   <header class="container max-w-screen-2xl p-11">
        <img src="../images/register/logo.png" style="width: 179.23px ; height: 55px;" alt="logo">
   </header> 
-->
<body class="container max-w-screen-2xl mx-auto bg-fond_black">
   <main class="bg-no-repeat bg-personalized h-personalized grid content-around justify-around" style="background-image: url(../images/register/fondo-imagenes.png);">
                <div class="p-24 w-500 h-620 rounded-2xl bg-fond_transp">
                    <a href="login_register.php?ctl=login"><img class="-ml-20 -mt-16"  src="../images/register/vector.png" alt="vector"></a>
                    <form action="login_register.php?ctl=register" method="POST">
                        <h1 class="text-3xl font-normal mt-12 text-white font-poppins">Registro</h1>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="text" name="nombre" id="nombre" placeholder="Nombre">  
                        <br>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                        <br>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="password" name="password" id="password" placeholder="Password">
                        <br>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="text" name="nif" id="nif" placeholder="NIF">
                        <br>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="email" name="gmail" id="gmail" placeholder="Email">
                        <br>
                        <button class="w-300 h-12 mt-7 bg-rose-600 text-2xl font-normal text-white font-poppins rounded-lg" type="submit" name="registrar" value="registrar" >Registrarme</button>
                    </form> 
                </div>
    </main>
</body>
<!--
</body>
</html>
-->