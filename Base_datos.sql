-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2024 a las 22:24:43
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
-- Base de datos: `proyecto_empresa`
--
CREATE DATABASE IF NOT EXISTS `proyecto_empresa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_empresa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacena_coordenada`
--

CREATE TABLE `almacena_coordenada` (
  `ID` int(11) NOT NULL,
  `LATITUD` varchar(200) NOT NULL,
  `LONGITUD` varchar(200) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `CODIGO` varchar(100) NOT NULL,
  `DIRECCION_ACTUAL` varchar(200) NOT NULL,
  `MUNICIPIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `ID` int(11) NOT NULL,
  `ID_INSPECTORES` int(11) DEFAULT NULL,
  `ID_RUTA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenada`
--

CREATE TABLE `coordenada` (
  `ID` int(11) NOT NULL,
  `DIRECCION_ACTUAL` varchar(255) NOT NULL,
  `ID_CODIGO_INSTALACION` varchar(50) NOT NULL,
  `MUNICIPIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas_erroneas`
--

CREATE TABLE `coordenadas_erroneas` (
  `ID` int(11) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `CODIGO` varchar(50) NOT NULL,
  `DIRECCION_ACTUAL` varchar(200) NOT NULL,
  `MUNICIPIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_descodificadas`
--

CREATE TABLE `direcciones_descodificadas` (
  `ID` int(11) NOT NULL,
  `DIRECCIONES` varchar(255) DEFAULT NULL,
  `CODIGO` varchar(50) DEFAULT NULL,
  `DIRECCION_ACTUAL` varchar(200) NOT NULL,
  `MUNICIPIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrrutamiento`
--

CREATE TABLE `enrrutamiento` (
  `ID` int(11) NOT NULL,
  `LATITUD` decimal(10,8) DEFAULT NULL,
  `LONGITUD` decimal(11,8) DEFAULT NULL,
  `DIRECCIONES` varchar(255) DEFAULT NULL,
  `CODIGO` varchar(100) NOT NULL,
  `DIRECCION_ACTUAL` varchar(200) NOT NULL,
  `MUNICIPIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores`
--

CREATE TABLE `inspectores` (
  `ID` int(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `NUMERO_DE_OPERARIO` int(20) NOT NULL,
  `DNI_CEDULA` int(20) NOT NULL,
  `GRUPO` varchar(50) NOT NULL,
  `FECHA_NACIMIENTO` varchar(50) NOT NULL,
  `NUMERO_CELULAR` varchar(11) NOT NULL,
  `FECHA_VENCIMIENTO_CARNET_SALUD` varchar(50) NOT NULL,
  `FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR` varchar(20) NOT NULL,
  `CANTIDAD_HORAS_DIARIAS` int(5) NOT NULL,
  `USUARIO_ASOCIADO` varchar(50) NOT NULL,
  `IMEI` varchar(100) NOT NULL,
  `CARGO` varchar(30) NOT NULL,
  `ESTADO` varchar(10) NOT NULL,
  `VERSION_APP` varchar(50) NOT NULL,
  `FECHA_MODIFICACION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL,
  `fecha_programacion` varchar(50) NOT NULL,
  `requerimiento` int(50) NOT NULL,
  `orden_trabajo` int(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `codigo_instalacion` varchar(50) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `observacion_requerimiento` text NOT NULL,
  `estado_operativo` varchar(20) NOT NULL,
  `tipo_agenda` varchar(20) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `sub_zonas` varchar(20) NOT NULL,
  `zona` varchar(20) NOT NULL,
  `inspector` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas_inactivas`
--

CREATE TABLE `rutas_inactivas` (
  `id` int(11) NOT NULL,
  `fecha_programacion` varchar(50) NOT NULL,
  `requerimiento` int(50) NOT NULL,
  `orden_trabajo` int(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `codigo_instalacion` varchar(50) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `observacion_requerimiento` text NOT NULL,
  `estado_operativo` varchar(20) NOT NULL,
  `tipo_agenda` varchar(20) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `sub_zonas` varchar(20) NOT NULL,
  `zona` varchar(20) NOT NULL,
  `inspector` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `usuario`, `contrasena`) VALUES
(26, 'andres', 'pipeandre.2003@gmail.com', '1045606021', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacena_coordenada`
--
ALTER TABLE `almacena_coordenada`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_INSPECTORES` (`ID_INSPECTORES`),
  ADD KEY `ID_RUTA` (`ID_RUTA`);

--
-- Indices de la tabla `coordenada`
--
ALTER TABLE `coordenada`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `coordenadas_erroneas`
--
ALTER TABLE `coordenadas_erroneas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `direcciones_descodificadas`
--
ALTER TABLE `direcciones_descodificadas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `enrrutamiento`
--
ALTER TABLE `enrrutamiento`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inspectores`
--
ALTER TABLE `inspectores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutas_inactivas`
--
ALTER TABLE `rutas_inactivas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacena_coordenada`
--
ALTER TABLE `almacena_coordenada`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coordenada`
--
ALTER TABLE `coordenada`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coordenadas_erroneas`
--
ALTER TABLE `coordenadas_erroneas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `direcciones_descodificadas`
--
ALTER TABLE `direcciones_descodificadas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enrrutamiento`
--
ALTER TABLE `enrrutamiento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inspectores`
--
ALTER TABLE `inspectores`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1473;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
