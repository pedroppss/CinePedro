<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar QR</title>
    <style>
        figure {
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid blue;
        }
    </style>
</head>
<body>
    <figure>
        <img src="<?= $rutaArchivo ?>" alt="imagen QR">
        <br>
        <figcaption>
            <a href="<?= $rutaArchivo ?>" download="<?= $nombreArchivoQR ?>"> Pincha para Descargar QR</a>
        </figcaption>
    </figure>
</body>

</html>