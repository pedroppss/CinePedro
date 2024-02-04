<?php
function style_json($json)
{
    $json = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    $json = htmlspecialchars($json, ENT_NOQUOTES);
    $json = preg_replace('/"([^"]+)"\s*:\s*/', '<span class="json-key">"$1"</span>:', $json);
    $json = str_replace(['{', '}', '[', ']'], ['<span class="json-brace">{</span>', '<span class="json-brace">}</span>', '<span class="json-bracket">[</span>', '<span class="json-bracket">]</span>'], $json);
    return $json;
}
$rutaimagen = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 3) . '/utiles/img/';
$json1 = [
    [
        "id_pelicula" => 1,
        "nombre_pelicula" => "Casablanca",
        "genero" => "Drama",
        "caratula" => $rutaimagen . "caratula/casablanca_poster.jpg",
        "elenco" => [
            [
                "id_personal" => 1,
                "nombre_personal" => "Humphrey Bogart",
                "imagen_personal" => $rutaimagen . "personal/bogart.jpg",
                "rol_personal" => "Actor"
            ],
            [
                "id_personal" => 2,
                "nombre_personal" => "Michael Curtiz",
                "imagen_personal" => $rutaimagen . "personal/curtiz.jpg",
                "rol_personal" => "Director"
            ]
        ]
    ],
    [
        "id_pelicula" => 2,
        "nombre_pelicula" => "El Padrino",
        "genero" => "Acción",
        "caratula" => $rutaimagen . "caratula/elpadrino_poster.jpg",
        "elenco" => [
            [
                "id_personal" => 3,
                "nombre_personal" => "Marlon Brando",
                "imagen_personal" => $rutaimagen . "img/personal/brando.jpg",
                "rol_personal" => "Actor"
            ],
            [
                "id_personal" => 4,
                "nombre_personal" => "Francis Ford Coppola",
                "imagen_personal" => $rutaimagen . "img/personal/coppola.jpg",
                "rol_personal" => "Director"
            ]
        ]
    ]
];

$json2 = [
    "id_pelicula" => 2,
    "nombre_pelicula" => "El Padrino",
    "genero" => "Acción",
    "caratula" => $rutaimagen . "caratula/elpadrino_poster.jpg",
    "elenco" => [
        [
            "id_personal" => 3,
            "nombre_personal" => "Marlon Brando",
            "imagen_personal" => $rutaimagen . "img/personal/brando.jpg",
            "rol_personal" => "Actor"
        ],
        [
            "id_personal" => 4,
            "nombre_personal" => "Francis Ford Coppola",
            "imagen_personal" => $rutaimagen . "img/personal/coppola.jpg",
            "rol_personal" => "Director"
        ]
    ]
];

$json3 = [
    [
        "id_personal"=> 40,
        "nombre_personal"=> "Adam Driver",
        "imagen_personal"=> "http://143.47.43.204:8080/pedro/Cine-Pedro/app/images/actores/actor_65_1.jpg",
        "rol"=> [
            "Actor"
        ],
        "peliculas"=> [
            [
                "id_pelicula"=> 1,
                "nombre_pelicula"=> "65(2023)",
                "endpoint"=>"http://143.47.43.204:8080/pedro/Cine-Pedro/api/v1/cine.php/peliculas/1",
            ]
        ]
    ],
    [
        "id_personal" => 2,
        "nombre_personal" => "Jason Momoa",
        "imagen_personal" => $rutaimagen . "img/actores/actor_fast_2.jpg",
        "rol"=>[
            "Actor"
        ],
        "peliculas" => [
            [
                "id_pelicula" => 2,
                "nombre_pelicula" => "Rápidos y Furiosos10",
                "endpoint"=>"http://143.47.43.204:8080/pedro/Cine-Pedro/api/v1/cine.php/peliculas/2",
            ]
        ]
    ]
];

$json4 = [
    [
        "id_personal" => 2,
        "nombre_personal" => "Jason Momoa",
        "imagen_personal" => $rutaimagen . "img/actores/actor_fast_2.jpg",
        "rol"=>[
            "Actor"
        ],
        "peliculas" => [
            [
                "id_pelicula" => 2,
                "nombre_pelicula" => "Rápidos y Furiosos10",
                "endpoint"=>"http://143.47.43.204:8080/pedro/Cine-Pedro/api/v1/cine.php/peliculas/2",
            ]
        ]
    ]
];

$json5 = [
    [
    "id_pelicula" => 2,
    "nombre_pelicula" => "El Padrino",
    "genero" => "Acción",
    "caratula" => $rutaimagen . "caratula/elpadrino_poster.jpg",
    "elenco" => [
        [
            "id_personal" => 3,
            "nombre_personal" => "Marlon Brando",
            "imagen_personal" => $rutaimagen . "img/personal/brando.jpg",
            "rol_personal" => "Actor"
        ],
        [
            "id_personal" => 4,
            "nombre_personal" => "Francis Ford Coppola",
            "imagen_personal" => $rutaimagen . "img/personal/coppola.jpg",
            "rol_personal" => "Director"
        ]
    ]
    ]
];

$json6 = [
    [
        "id_personal"=> 1,
        "nombre_personal"=> "Vin Diesel",
        "imagen_personal"=> "http://143.47.43.204:8080/pedro/Cine-Pedro/app/images/actores/actor_fast_1.jpg",
        "rol"=> [
            "Actor"
        ],
        "peliculas"=> [
            [
                "id_pelicula"=> 2,
                "nombre_pelicula"=> "Fast&Furious10",
                "endpoint"=> "http://143.47.43.204:8080/pedro/Cine-Pedro/api/v1/cine.php/peliculas/2"
            ]
        ]
    ]
];
$json9=[
    "id_insertado"=>"18"
];
$json10=[
    "id insertado"=> "108"
];
