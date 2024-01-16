<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dist/output.css" type="text/css"/>
        <title>Login</title>
</head>
<body  class="container max-w-screen-2xl mx-auto bg-fond_black">
   <header class="container max-w-screen-2xl p-11">
        <img src="../images/login/logo.png" style="width: 179.23px ; height: 55px;" alt="logo">
   </header> 
-->
<body class="container max-w-screen-2xl mx-auto bg-fond_black">
   <main class="bg-no-repeat bg-personalized h-personalized grid content-around justify-around" style="background-image: url(../images/login/fondo-imagenes.png);">
            <div class="p-24 w-500 h-516 rounded-2xl bg-fond_transp">
                    <form action="login_register.php?ctl=login" method="POST">
                        <h1 class="text-3xl font-normal text-white font-poppins">Login</h1>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="email" name="gmail" id="gmail" placeholder="Email">  
                        <br>
                        <input class="w-300 h-12 mt-3 bg-fond_black_2 rounded text-base font-normal font-poppins text-white" type="password" name="password" id="password" placeholder="Password">
                        <br>
                        <button class="w-300 h-12 mt-7 bg-rose-600 text-2xl font-normal text-white font-poppins rounded-lg" type="submit" name="Enviar" value="Enviar">Enviar</button>
                    </form>
                    <form action="login_register.php?ctl=recuperarPassword" method="POST">
                        <button class="text-white text-base mt-5 ml-16 font-normal font-poppins"  type="submit" href="#">¿Has olvidado tu contraseña?</button> 
                    </form>
                    <div class="text-red-600"><?=$error?></div>
            </div>
           
    </main>
</body>
<!--
</body>
</html>
-->
