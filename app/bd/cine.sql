-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2024 a las 13:21:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine_pedro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_butacasc`
--

CREATE TABLE `compra_butacasc` (
  `id` int(11) NOT NULL,
  `sesion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `butaca` int(11) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra_butacasc`
--

INSERT INTO `compra_butacasc` (`id`, `sesion_id`, `usuario_id`, `butaca`, `id_factura`, `qr_code`) VALUES
(1, 1, 1, 5, 1, NULL),
(2, 2, 5, 6, 2, NULL),
(3, 3, 2, 7, 3, NULL),
(4, 4, 4, 8, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generoc`
--

CREATE TABLE `generoc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `generoc`
--

INSERT INTO `generoc` (`id`, `nombre`) VALUES
(1, 'Fantasia'),
(2, 'Acción'),
(3, 'Drama'),
(4, 'Ciencia Ficción'),
(5, 'Aventuras'),
(6, 'Monstruos'),
(7, 'Terror'),
(8, 'Dibujos Animados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeracionfacturasc`
--

CREATE TABLE `numeracionfacturasc` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `numeracionfacturasc`
--

INSERT INTO `numeracionfacturasc` (`id_factura`, `numero_factura`) VALUES
(1, 1001),
(2, 1002),
(3, 1003),
(4, 1004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasc`
--

CREATE TABLE `peliculasc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `año` varchar(50) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `argumento` varchar(500) DEFAULT NULL,
  `cartel` varchar(50) DEFAULT NULL,
  `clasificacion_edad` varchar(50) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculasc`
--

INSERT INTO `peliculasc` (`id`, `nombre`, `clasificacion`, `año`, `duracion`, `argumento`, `cartel`, `clasificacion_edad`, `genero_id`) VALUES
(1, '65(2023)', '4.6', '2023', '93min', 'Después de un catastrófico accidente en un planeta desconocido, el piloto Mills (Adam Driver) descubre rápidamente que realmente está varado en la Tierra… hace 65 millones de años. Ahora, con solo una oportunidad de rescate, Mills y la otra única superviviente, Koa (Ariana Greenblatt), deberán abrirse camino a través del desconocido territorio plagado con peligrosas criaturas prehistóricas en una épica lucha por sobrevivir.\r\n', '65(2023).png', '16+', 1),
(2, 'Fast&Furious10', '9.5', '2023', '2:21', 'Durante numerosas misiones más que imposibles, Dom Toretto y su familia han sido capaces de ser más listos, de tener más valor y de ir más rápido que cualquier enemigo que se cruzara con ellos. Pero ahora tendrán que enfrentarse al oponente más letal que jamás hayan conocido: Un terrible peligro que resurge del pasado, que se mueve por una sangrienta sed de venganza y que está dispuesto a destrozar a la familia y destruir para siempre todo lo que a Dom le importa.\r\n', 'fast10.png', '16+', 2),
(3, 'air(2023)', '6.7', '2023', '112min', 'La historia narra la improbable y revolucionaria asociación que a mediados de los 80 se firmó entre Michael Jordan -un novato en ese momento- y la incipiente sección de baloncesto de la empresa de calzado deportivo Nike; un acuerdo que revolucionaría el mundo del deporte y la cultura contemporánea con la marca Air Jordan. La historia narra la atrevida apuesta que definió la carrera de un equipo empresarial poco convencional, la visión implacable de una madre que conoce el valor del inmenso talen', 'air.png', '16+', 3),
(4, 'Guardianes de la galaxia', '7.1', '2023', '150min', 'La querida banda de los Guardianes se instala en Knowhere. Pero sus vidas no tardan en verse alteradas por los ecos del turbulento pasado de Rocket. Peter Quill, aún conmocionado por la pérdida de Gamora, debe reunir a su equipo en una peligrosa misión para salvar la vida de Rocket, una misión que, si no se completa con éxito, podría muy posiblemente conducir al final de los Guardianes tal y como los conocemos.\r\n', 'guardianes_galaxia_vol_3.jpg', '12+', 4),
(5, 'Transformers: El despertar de las bestias', '5.4', '2023', '127min', 'En 1994, un par de arqueólogos se ven envueltos en un antiguo conflicto a través de una aventura por todo el mundo que se relaciona con tres facciones de Transformers: los Maximals, los Predacons y los Terrorcons mientras ayudan a Optimus Prime y los Autobots en una guerra para proteger la Tierra ante la llegada de Unicron.\r\n', 'transformers.jpg', '16+', 5),
(6, 'Godzilla vs Kong', '5.3', '2021', '113min', 'Godzilla y Kong, dos de las fuerzas más poderosas de un planeta habitado por todo tipo de aterradoras criaturas, se enfrentan en un espectacular combate que sacude los cimientos de la humanidad. Kong y sus protectores emprenderán un peligroso viaje para encontrar su verdadero hogar. Con ellos está Jia, una joven huérfana con la que el gigante tiene un vínculo único y poderoso. En el camino se cruzan inesperadamente con el de un Godzilla enfurecido que va causando destrucción a su paso por el mun', 'godzillaykong.jpg', '16+', 6),
(7, 'Saw x', '6.0', '2023', '118min', 'Situada entre los acontecimientos sucedidos en SAW y SAW II, John, desesperado y enfermo, viaja a México para someterse a un tratamiento experimental y muy arriesgado con la esperanza de curar su cáncer mortal. Sin embargo, toda la operación resulta ser un fraude para engañar a aquellos más vulnerables. Lleno de rabia y con un nuevo y escabroso propósito, John retomará su trabajo como asesino en serie y dará a probar su propia medicina a los embaucadores. Bajo la atenta mirada de Jigsaw, los jóv', 'sawx.jpg', '18+', 7),
(8, 'Spider-Man: Cruzando el Multiverso', '7.9', '2023', '140min', 'Tras reencontrarse con Gwen Stacy, el amigable vecindario de Spider-Man de Brooklyn al completo es catapultado a través del Multiverso, donde se encuentra con un equipo de Spidermans encargados de proteger su propia existencia. Pero cuando los héroes se enfrentan sobre cómo manejar una nueva amenaza, Miles se encuentra enfrentado a las otras Arañas y debe redefinir lo que significa ser un héroe para poder salvar a la gente que más quiere.\r\n', 'spiderman.jpg', 'Todas las edades', 8),
(9, 'Aquaman y el reino perdido', '5.3', '2023', '124min', 'Al no poder derrotar a Aquaman la primera vez, Black Manta, todavía impulsado por la necesidad de vengar la muerte de su padre, no se detendrá ante nada para derrotar a Aquaman de una vez por todas. Esta vez Black Manta es más formidable que nunca y ejerce el poder del mítico Tridente Negro, que desata una fuerza antigua y malévola. Para derrotarlo, Aquaman recurrirá a su hermano encarcelado Orm, el ex rey de la Atlántida, para forjar una alianza improbable. Juntos, deben dejar de lado sus difer', 'aquaman_2.jpg', '16+', 2),
(10, 'La sirenita', '5.4', '2023', '135min', 'Ariel, la más joven de las hijas del Rey Tritón y la más desafiante, desea saber más sobre el mundo más allá del mar y, mientras visita la superficie, se enamora del apuesto Príncipe Eric. Si bien las sirenas tienen prohibido interactuar con los humanos, Ariel debe seguir su corazón. Así, hace un trato con la malvada bruja del mar, Úrsula, que le da la oportunidad de experimentar la vida en la tierra, lo que pone en peligro su vida y la corona de su padre.', 'sirena.png', '6+', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_personalc`
--

CREATE TABLE `peliculas_personalc` (
  `id` int(11) NOT NULL,
  `pelicula_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas_personalc`
--

INSERT INTO `peliculas_personalc` (`id`, `pelicula_id`, `personal_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 3, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 3, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19),
(20, 5, 20),
(21, 5, 21),
(22, 5, 22),
(23, 5, 23),
(24, 5, 24),
(25, 5, 25),
(26, 5, 26),
(27, 5, 27),
(28, 5, 28),
(29, 5, 29),
(30, 5, 30),
(31, 5, 31),
(32, 7, 32),
(33, 7, 33),
(34, 7, 34),
(35, 7, 35),
(36, 7, 36),
(37, 7, 37),
(38, 7, 38),
(39, 7, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 6, 45),
(46, 6, 46),
(47, 6, 47),
(48, 6, 48),
(49, 6, 49),
(50, 6, 50),
(51, 6, 51),
(52, 6, 52),
(53, 6, 53),
(54, 6, 54),
(55, 6, 55),
(56, 6, 56),
(57, 8, 57),
(58, 8, 58),
(59, 8, 59),
(60, 8, 60),
(61, 8, 61),
(62, 8, 62),
(63, 8, 63),
(64, 8, 64),
(65, 8, 65),
(66, 8, 66),
(67, 8, 67),
(68, 8, 68),
(69, 9, 69),
(70, 9, 70),
(71, 9, 71),
(72, 9, 72),
(73, 9, 73),
(74, 9, 74),
(75, 9, 75),
(76, 9, 76),
(77, 9, 77),
(78, 9, 78),
(79, 9, 79),
(80, 9, 80),
(81, 4, 81),
(82, 4, 82),
(83, 4, 83),
(84, 4, 84),
(85, 4, 85),
(86, 4, 86),
(87, 4, 87),
(88, 4, 88),
(89, 4, 89),
(90, 4, 90),
(91, 4, 92),
(92, 4, 92),
(93, 10, 93),
(94, 10, 94),
(95, 10, 95),
(96, 10, 96),
(97, 10, 97),
(98, 10, 98),
(99, 10, 99),
(100, 10, 100),
(101, 10, 101),
(102, 10, 102),
(103, 10, 103),
(104, 10, 104),
(105, 10, 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalc`
--

CREATE TABLE `personalc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` enum('Actor','Actriz','Director') DEFAULT NULL,
  `imagen` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personalc`
--

INSERT INTO `personalc` (`id`, `nombre`, `tipo`, `imagen`) VALUES
(1, 'Vin Diesel', 'Actor', 'actor_fast_1.jpg'),
(2, 'Jason Momoa', 'Actor', 'actor_fast_2.jpg'),
(3, 'Michelle Rodriguez', 'Actriz', 'actriz_fast_3.jpg'),
(4, 'Louis Leterrier', 'Director', 'director_fast.jpg'),
(5, 'Ludacris', 'Actor', 'actor_fast_4.jpg'),
(6, 'Nathalie Emmanuel', 'Actriz', 'actriz_fast_5.jpg'),
(7, 'Sung Kang', 'Actor', 'actor_fast_6.jpg'),
(8, 'John Cena', 'Actor', 'actor_fast_7.jpg'),
(9, 'Brie Larson', 'Actriz', 'actriz_fast_8.jpg'),
(10, 'Matt Damon', 'Actor', 'actor_air_1.jpg'),
(11, 'Ben Affleck', 'Actor', 'actor_air_2.jpg'),
(12, 'Viola Davis', 'Actriz', 'actriz_air_3.jpg'),
(13, 'Jason Bateman', 'Actor', 'actor_air_4.jpg'),
(14, 'Chris Messina', 'Actor', 'actor_air_5.jpg'),
(15, 'Chris Tucker', 'Actor', 'actor_air_6.jpg'),
(16, 'Matthew Maher', 'Actor', 'actor_air_7.jpg'),
(17, 'Marlon Wayans', 'Actor', 'actor_air_8.jpg'),
(18, 'Gustaf Skarsgard', 'Actor', 'actor_air_9.jpg'),
(19, 'Ben Affleck', 'Director', 'director_air.jpg'),
(20, 'Anthnoy Ramos', 'Actor', 'actor_transformers_1.jpg'),
(21, 'Dominique Fishback', 'Actriz', 'actriz_transformers_2.jpg'),
(22, 'Domenic Di Rosa', 'Actor', 'actor_transformers_3.jpg'),
(23, 'Lauren Vélez', 'Actriz', 'actriz_transformers_4.jpg'),
(24, 'Frank Marrs', 'Actor', 'actor_transformers_5.jpg'),
(25, 'Jason D. Avalos', 'Actor', 'actor_transformers_6.jpg'),
(26, 'Jimmy Caspeur', 'Actor', 'actor_transformers_7.jpg'),
(27, 'Dean Scott Vazquez', 'Actor', 'actor_transformers_8.jpg'),
(28, 'Sarah Stiles', 'Actriz', 'actriz_transformers_9.jpg'),
(29, 'Aidan Devine ', 'Actor', 'actor_transformers_10.jpg'),
(30, 'Michael Kelly ', 'Actor', 'actor_transformers_11.jpg'),
(31, 'Steven Caple Jr', 'Director', 'director_transformers.jpg'),
(32, 'Renata Vaca', 'Actriz', 'actriz_sawx_1.jpg'),
(33, 'Shawnee Smith', 'Actriz', 'actriz_sawx_2.jpg'),
(34, 'Paulette Hernandez', 'Actriz', 'actriz_sawx_3.jpg'),
(35, 'Tobin Bell', 'Actor', 'actor_sawx_4.jpg'),
(36, 'Michael Beach', 'Actor', 'actor_sawx_5.jpg'),
(37, 'Synnove Macody Lund', 'Actriz', 'actriz_sawx_6.jpg'),
(38, 'Steven Brand', 'Actor', 'actor_sawx_7.jpg'),
(39, 'Kevin Greutert', 'Director', 'director_sawx.jpg'),
(40, 'Adam Driver', 'Actor', 'actor_65_1.jpg'),
(41, 'Ariana Greenblatt', 'Actriz', 'actriz_65_2.jpg'),
(42, 'Chloe Coleman', 'Actriz', 'actriz_65_3.jpg'),
(43, 'Nika Williams', 'Actriz', 'actriz_65_4.jpg'),
(44, 'Scott Beck', 'Director', 'director_65.jpg'),
(45, 'Alexander Skarsgard', 'Actor', 'actor_godzilla_1.jpg'),
(46, 'Rebecca Hall', 'Actriz', 'actriz_godzilla_2.jpg'),
(47, 'Demian Bichir', 'Actor', 'actor_godzilla_3.jpg'),
(48, 'Millie Bobby Brown', 'Actriz', 'actriz_godzilla_4.jpg'),
(49, 'Eiza Gonzalez', 'Actriz', 'actriz_godzilla_5.jpg'),
(50, 'Shun Oguri', 'Actor', 'actor_godzilla_6.jpg'),
(51, 'Kyle Chandler', 'Actor', 'actor_godzilla_7.jpg'),
(52, 'Kaylee Hottle', 'Actriz', 'actriz_godzilla_8.jpg'),
(53, 'Julian Dennison', 'Actor', 'actriz_godzilla_9.jpg'),
(54, 'Jessica Henwick', 'Actriz', 'actriz_godzilla_10.jpg'),
(55, 'Brian Tyree Henry', 'Actor', 'actor_godzilla_11.jpg'),
(56, 'Adam Wingard', 'Director', 'director_godzilla.jpg'),
(57, 'Shameik Moore', 'Actor', 'actor_spiderman_1.jpg'),
(58, 'Hailee Steinfeld', 'Actriz', 'actriz_spiderman_2.jpg'),
(59, 'Brian Tyree Henry', 'Actor', 'actor_spiderman_3.jpg'),
(60, 'Lauren Vélez', 'Actriz', 'actriz_spiderman_4.jpg'),
(61, 'Jake Johnsonn', 'Actor', 'actor_spiderman_5.jpg'),
(62, 'Oscar Isaac ', 'Actor', 'actor_spiderman_6.jpg'),
(63, 'Isaa Rae', 'Actriz', 'actriz_spiderman_7.jpg'),
(64, 'Daniel Kaluuya', 'Actor', 'actor_spiderman_8.jpg'),
(65, 'Karan Soni', 'Actor', 'actor_spiderman_9.jpg'),
(66, 'Shea Whigham', 'Actor', 'actor_spiderman_10.jpg'),
(67, 'Greta Lee', 'Actriz', 'actriz_spiderman_11.jpg'),
(68, 'Joaquim Dos Santos', 'Director', 'director_spiderman.jpg'),
(69, 'Jason Momoa', 'Actor', 'actor_aquaman_1.jpg'),
(70, 'Patrick Wilson', 'Actor', 'actor_aquaman_2.jpg'),
(71, 'Amber Heard', 'Actriz', 'actriz_aquaman_3.jpg'),
(72, 'Yahya AbdulMateen II', 'Actor', 'actor_aquaman_4.jpg'),
(73, 'Nicole Kidman', 'Actriz', 'actriz_aquaman_5.jpg'),
(74, 'Temuera Morrison', 'Actor', 'actor_aquaman_6.jpg'),
(75, 'Randall Park', 'Actor', 'actor_aquaman_7.jpg'),
(76, 'Indya Moore ', 'Actriz', 'actriz_aquaman_8.jpg'),
(77, 'Vincent Regan', 'Actor', 'actor_aquaman_9.jpg'),
(78, 'Jani Zhao', 'Actriz', 'actriz_aquaman_10.jpg'),
(79, 'Pilou Asbaek', 'Actor', 'actor_aquaman_11.jpg'),
(80, 'James Wan', 'Director', 'director_aquaman.jpg'),
(81, 'Chris Pratt', 'Actor', 'actor_guardianes_1.jpg'),
(82, 'Zoe Saldana', 'Actriz', 'actriz_guardianes_2.jpg'),
(83, 'Dave Bautista', 'Actor', 'actor_guardianes_3.jpg'),
(84, 'Karen Gillan', 'Actriz', 'actriz_guardianes_4.jpg'),
(85, 'Pom Klementieff', 'Actriz', 'actriz_guardianes_5.jpg'),
(86, 'Will Poulter', 'Actor', 'actor_guardianes_6.jpg'),
(87, 'Sean Gunn', 'Actor', 'actor_guardianes_7.jpg'),
(88, 'Elizabeth Debicki', 'Actriz', 'actriz_guardianes_8.jpg'),
(89, 'Sylvester Stallone ', 'Actor', 'actor_guardianes_9.jpg'),
(90, 'Daniela Melchior', 'Actriz', 'actriz_guardianes_10.jpg'),
(91, 'Michael Rosenbaum', 'Actor', 'actor_guardianes_11.jpg'),
(92, 'James Gunn', 'Director', 'director_guardianes.jpg'),
(93, 'Halley Bailey', 'Actriz', 'actriz_sirena_1.jpg'),
(94, 'Jonah Hauer-King', 'Actor', 'actor_sirena_2.jpg'),
(95, 'Javier Bardem', 'Actriz', 'actor_sirena_3.jpg'),
(96, 'Melissa McCarthy', 'Actriz', 'actriz_sirena_4.jpg'),
(97, 'Jessica Alexander', 'Actriz', 'actriz_sirena_5.jpg'),
(98, 'Lorena Andrea', 'Actriz', 'actriz_sirena_6.jpg'),
(99, 'Sienna King', 'Actriz', 'actriz_sirena_7.jpg'),
(100, 'Kajsa Mohammar', 'Actriz', 'actriz_sirena_8.jpg'),
(101, 'Simone Ashley', 'Actriz', 'actriz_sirena_9.jpg'),
(102, 'Lin-Manuel Miranda', 'Actriz', 'actor_sirena_10.jpg'),
(103, 'Noma Dumezweni', 'Actriz', 'actriz_sirena_11.jpg'),
(104, 'Emily Coates', 'Actriz', 'actriz_sirena_12.jpg'),
(105, 'Rob Marshall', 'Director', 'director_sirena.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salasc`
--

CREATE TABLE `salasc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `num_butacas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `salasc`
--

INSERT INTO `salasc` (`id`, `nombre`, `num_butacas`) VALUES
(1, 'Sala 3D', 120),
(2, 'Sala VIP', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionesc`
--

CREATE TABLE `sesionesc` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `pelicula_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sesionesc`
--

INSERT INTO `sesionesc` (`id`, `fecha`, `hora`, `sala_id`, `precio`, `pelicula_id`) VALUES
(1, '2023-12-18', '14:00:00', 1, 16.80, 1),
(2, '2023-12-18', '17:00:00', 1, 12.50, 2),
(3, '2023-12-18', '15:30:00', 2, 11.90, 3),
(4, '2023-12-18', '18:30:00', 2, 13.75, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosc`
--

CREATE TABLE `usuariosc` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `NIF` varchar(9) NOT NULL,
  `activo` tinyint(1) DEFAULT 0,
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `hash_pass` varchar(256) NOT NULL,
  `rol` enum('administrador','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosc`
--

INSERT INTO `usuariosc` (`id`, `correo`, `nombre`, `apellidos`, `NIF`, `activo`, `avatar`, `hash_pass`, `rol`) VALUES
(1, 'venancioblanco2023@gmail.com', 'Serafina', 'Martín Marcos', '12345678a', 1, 'avatar1.jpg', '$2y$10$dERNtSx87UFoGPZSDtgysuKcsu0UvI5ogQ6rcXA9D0ITnupy.rsOu', 'cliente'),
(2, 'ejemplo2@example.com', 'Antonio', 'Rodríguez López', '98765432b', 0, 'avatar2.jpg', 'hash_pass_2', 'cliente'),
(3, 'admin@cine.com', 'Laura', 'Martínez García', '45678901c', 1, 'avatar3.jpg', '$2y$10$dVJvvi9YQq8ugT12sPYGROu37m19v8KKCs9PhDd9SY4Ulek38mZLC', 'administrador'),
(4, 'ejemplo4@example.com', 'Carlos', 'Fernández Sánchez', '34567890d', 1, 'avatar4.jpg', 'hash_pass_4', 'cliente'),
(5, 'ejemplo5@example.com', 'Sofía', 'López Hernández', '23456789e', 0, 'avatar5.jpg', 'hash_pass_5', 'cliente'),
(10, 'pedro@gmail.com', 'pedro', 'perez', '7112325a', 0, 'default.jpg', '$2y$10$hY8EWtFEgM3.CPiw5UhoMeVFUzkRqG4QeLYLAyfAPdKlgLOWSrNUW', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra_butacasc`
--
ALTER TABLE `compra_butacasc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesion_id` (`sesion_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `generoc`
--
ALTER TABLE `generoc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `numeracionfacturasc`
--
ALTER TABLE `numeracionfacturasc`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `peliculasc`
--
ALTER TABLE `peliculasc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- Indices de la tabla `peliculas_personalc`
--
ALTER TABLE `peliculas_personalc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula_id` (`pelicula_id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Indices de la tabla `personalc`
--
ALTER TABLE `personalc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salasc`
--
ALTER TABLE `salasc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesionesc`
--
ALTER TABLE `sesionesc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula_id` (`pelicula_id`),
  ADD KEY `sala_id` (`sala_id`);

--
-- Indices de la tabla `usuariosc`
--
ALTER TABLE `usuariosc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra_butacasc`
--
ALTER TABLE `compra_butacasc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `generoc`
--
ALTER TABLE `generoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `numeracionfacturasc`
--
ALTER TABLE `numeracionfacturasc`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `peliculasc`
--
ALTER TABLE `peliculasc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peliculas_personalc`
--
ALTER TABLE `peliculas_personalc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `personalc`
--
ALTER TABLE `personalc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `salasc`
--
ALTER TABLE `salasc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sesionesc`
--
ALTER TABLE `sesionesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuariosc`
--
ALTER TABLE `usuariosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra_butacasc`
--
ALTER TABLE `compra_butacasc`
  ADD CONSTRAINT `compra_butacasc_ibfk_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesionesc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_butacasc_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuariosc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_butacasc_ibfk_3` FOREIGN KEY (`id_factura`) REFERENCES `numeracionfacturasc` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculasc`
--
ALTER TABLE `peliculasc`
  ADD CONSTRAINT `peliculasc_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas_personalc`
--
ALTER TABLE `peliculas_personalc`
  ADD CONSTRAINT `peliculas_personalc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_personalc_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `personalc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesionesc`
--
ALTER TABLE `sesionesc`
  ADD CONSTRAINT `sesionesc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesionesc_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
