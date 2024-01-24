<?php
spl_autoload_register(function ($clase) {
    $paths = [
        '../../bd/' . $clase . '.php',
        '../../app/modelo/' . $clase . '.php',
        'cors/' . $clase . '.php',
        'controladorApi/' . $clase . '.php',
        'app/controlador/' . $clase . '.php',
        'app/modelo/' . $clase . '.php',
        'bd/' . $clase . '.php'
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            break;
        }
    }
});
