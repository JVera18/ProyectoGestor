-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2023 a las 22:12:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gg_archivos`
--

CREATE TABLE `gg_archivos` (
  `id_archivos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gg_archivos`
--

INSERT INTO `gg_archivos` (`id_archivos`, `id_usuario`, `id_categorias`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(1, 1, NULL, 'operaciones_matematicas.png', 'png', '../../archivos/1/operaciones_matematicas.png', '2023-02-09 01:08:18'),
(2, 1, NULL, 'mundo.png', 'png', '../../archivos/1/mundo.png', '2023-02-09 01:09:08'),
(3, 1, NULL, 'llamada-telefonica.png', 'png', '../../archivos/1/llamada-telefonica.png', '2023-02-09 01:16:32'),
(4, 3, NULL, 'educacion.png', 'png', '../../archivos/3/educacion.png', '2023-02-09 01:28:04'),
(5, 3, NULL, 'operaciones_matematicas.png', 'png', '../../archivos/3/operaciones_matematicas.png', '2023-02-09 01:37:09'),
(9, 3, 5, 'kpop.png', 'png', '../../archivos/3/kpop.png', '2023-02-09 15:53:28'),
(11, 1, 3, 'hornear.png', 'png', '../../archivos/1/hornear.png', '2023-02-09 17:02:12'),
(14, 3, 6, 'Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg', 'jpeg', '../../archivos/3/Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg', '2023-02-10 01:16:11'),
(15, 3, 6, 'code-alt-regular-24.png', 'png', '../../archivos/3/code-alt-regular-24.png', '2023-02-10 01:21:18'),
(16, 3, 6, 'Julitza Vera Oña – Actividad Asincrónica 01.pdf', 'pdf', '../../archivos/3/Julitza Vera Oña – Actividad Asincrónica 01.pdf', '2023-02-11 11:20:51'),
(17, 3, 5, 'Instructivo de Registro de Código Único (1).pdf', 'pdf', '../../archivos/3/Instructivo de Registro de Código Único (1).pdf', '2023-02-11 13:46:42'),
(18, 3, 5, 'juli.mp4', 'mp4', '../../archivos/3/juli.mp4', '2023-02-11 19:43:36'),
(19, 3, 5, 'The Weeknd - Nothing Is Lost (You Give Me Strength).mp3', 'mp3', '../../archivos/3/The Weeknd - Nothing Is Lost (You Give Me Strength).mp3', '2023-02-11 19:47:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gg_categorias`
--

CREATE TABLE `gg_categorias` (
  `id_categorias` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gg_categorias`
--

INSERT INTO `gg_categorias` (`id_categorias`, `id_usuario`, `nombre`, `fechaInsert`) VALUES
(3, 1, 'Peliculas 2022', '2023-02-07 23:28:43'),
(5, 3, 'categoria', '2023-02-09 01:27:26'),
(6, 3, 'tesis1', '2023-02-10 01:07:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gg_usuarios`
--

CREATE TABLE `gg_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `usuario` varchar(245) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gg_usuarios`
--

INSERT INTO `gg_usuarios` (`id_usuario`, `nombre`, `fechaNacimiento`, `email`, `usuario`, `password`, `insert`) VALUES
(1, 'joss', '2000-10-03', 'joss@gmail.com', 'joss', 'be8d00cc108e81a112d3242ac047c222e6c1e54f', '2023-02-07 15:10:23'),
(2, 'juan', '2023-02-04', 'juan@gmail.com', 'juan', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '2023-02-07 15:16:33'),
(3, 'sol', '2005-01-13', 'sol@hotmail.com', 'sol', 'fbb93bb966c801b3a72230e8f3b752b62ef22929', '2023-02-09 01:26:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gg_archivos`
--
ALTER TABLE `gg_archivos`
  ADD PRIMARY KEY (`id_archivos`),
  ADD KEY `fkArchivosCategorias_idx` (`id_categorias`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `gg_categorias`
--
ALTER TABLE `gg_categorias`
  ADD PRIMARY KEY (`id_categorias`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `gg_usuarios`
--
ALTER TABLE `gg_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gg_archivos`
--
ALTER TABLE `gg_archivos`
  MODIFY `id_archivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `gg_categorias`
--
ALTER TABLE `gg_categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `gg_usuarios`
--
ALTER TABLE `gg_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gg_archivos`
--
ALTER TABLE `gg_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categorias`) REFERENCES `gg_categorias` (`id_categorias`),
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `gg_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `gg_categorias`
--
ALTER TABLE `gg_categorias`
  ADD CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `gg_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
