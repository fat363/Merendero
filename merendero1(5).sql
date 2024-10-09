-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-10-2024 a las 22:52:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `merendero1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `id_asistente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` text NOT NULL,
  `edad` int(10) NOT NULL,
  `dni` int(15) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `direccion` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistentes`
--

INSERT INTO `asistentes` (`id_asistente`, `nombre`, `apellido`, `edad`, `dni`, `genero`, `direccion`) VALUES
(29, 'valen', 'molina', 18, 14141414, 'F', 'sarmiento 444'),
(30, 'valen', 'molina', 17, 47322043, 'F', 'sarmiento 477'),
(31, 'valen', 'molina', 16, 44444444, 'F', 'sarmiento 477'),
(32, 'luz', 'diaz', 18, 47322042, 'F', 'san luis 118');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'crochet', '2024-09-23', '2024-09-30'),
(2, 'canva', '2024-09-16', '2024-09-23'),
(3, 'genial.ly', '2024-09-25', '2024-10-02'),
(4, 'marketing', '2024-09-14', '2024-10-14'),
(5, 'html', '2024-09-24', '2024-11-26'),
(6, 'php', '2024-09-25', '2024-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(11) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  `id_asistente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_etiqueta`, `tipo`, `id_asistente`) VALUES
(10, 'camperas', NULL),
(11, 'zapatillas', NULL),
(12, 'zapatillas', NULL),
(13, 'zapatillas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_familiar`
--

CREATE TABLE `grupo_familiar` (
  `id_grupoflia` int(60) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `genero` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_flia` varchar(10) NOT NULL,
  `cantidad_de_integrantes` varchar(10) DEFAULT NULL,
  `id_asistente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionesCurso`
--

CREATE TABLE `inscripcionesCurso` (
  `id_inscripcion` int(111) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `correoelectronico` text NOT NULL,
  `curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcionesCurso`
--

INSERT INTO `inscripcionesCurso` (`id_inscripcion`, `nombre`, `correoelectronico`, `curso`) VALUES
(14, 'valen', 'valen@gmail.com', 'marketing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionesTalleres`
--

CREATE TABLE `inscripcionesTalleres` (
  `id_inscripcion` int(15) NOT NULL,
  `nombre` text NOT NULL,
  `correoelectronico` text NOT NULL,
  `taller` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcionesTalleres`
--

INSERT INTO `inscripcionesTalleres` (`id_inscripcion`, `nombre`, `correoelectronico`, `taller`) VALUES
(12, 'valen', 'valen@gmail.com', 'costura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(100) NOT NULL,
  `descripcion_comida` varchar(255) DEFAULT NULL,
  `dia_semana` varchar(10) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `clasificacion` varchar(255) NOT NULL DEFAULT 'desayuno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `correoelectronico` varchar(30) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id_taller` int(11) NOT NULL,
  `taller` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id_taller`, `taller`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'crochet', '2024-09-16', '2024-09-23'),
(2, 'costura', '2024-09-23', '2024-09-30'),
(3, 'costura', '2024-09-23', '2024-09-30'),
(4, 'danza', '2024-09-17', '2024-10-23'),
(5, 'folklore', '2024-09-14', '2024-10-14'),
(6, 'tejer', '2024-09-04', '2024-09-13'),
(7, 'porcelana fria', '2024-09-23', '2024-10-15'),
(8, 'porcelana fria', '2024-09-23', '2024-10-15'),
(9, 'costura', '2024-09-25', '2024-11-14'),
(10, 'costura', '2024-09-25', '2024-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `contraseña` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contraseña`) VALUES
(1, 'rayitodesol', '2345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`id_asistente`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id_etiqueta`);

--
-- Indices de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD PRIMARY KEY (`id_grupoflia`);

--
-- Indices de la tabla `inscripcionesCurso`
--
ALTER TABLE `inscripcionesCurso`
  ADD PRIMARY KEY (`id_inscripcion`);

--
-- Indices de la tabla `inscripcionesTalleres`
--
ALTER TABLE `inscripcionesTalleres`
  ADD PRIMARY KEY (`id_inscripcion`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `id_asistente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id_grupoflia` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `inscripcionesCurso`
--
ALTER TABLE `inscripcionesCurso`
  MODIFY `id_inscripcion` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inscripcionesTalleres`
--
ALTER TABLE `inscripcionesTalleres`
  MODIFY `id_inscripcion` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
