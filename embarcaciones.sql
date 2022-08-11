-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2022 a las 22:04:18
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `embarcaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarcaciones`
--

CREATE TABLE `embarcaciones` (
  `idEmbarcacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `salida` varchar(11) NOT NULL,
  `entrega` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `embarcaciones`
--

INSERT INTO `embarcaciones` (`idEmbarcacion`, `nombre`, `empresa`, `tipo`, `salida`, `entrega`) VALUES
(15, 'Embarcación prueba 1', 17, 'Materia prima', '2022-07-28', '2022-08-05'),
(16, 'Embarcación prueba 2', 17, 'Papelería', '2022-07-30', '2022-08-12'),
(17, 'Embarcación prueba 3', 3, 'Herramienta', '2022-07-29', '2022-08-06'),
(18, 'Embarcación prueba 4', 4, 'Refacciones', '2022-08-02', '2022-08-20'),
(19, 'Embarcación prueba 5', 4, 'Materia prima', '2022-08-01', '2022-08-06'),
(20, 'Embarcación prueba 6', 6, 'Uniformes', '2022-08-04', '2022-08-10'),
(21, 'Embarcación prueba 7', 6, 'Equipo deportivo', '2022-08-06', '2022-08-12'),
(22, 'Embarcación prueba 8', 5, 'Computadoras', '2022-08-06', '2022-08-16'),
(23, 'Embarcación prueba 9', 5, 'Teclados', '2022-08-06', '2022-08-16'),
(24, 'Embarcación prueba 10', 5, 'Herramienta', '2022-08-08', '2022-08-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tripulacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `empresa`, `correo`, `telefono`, `tripulacion`) VALUES
(1, 'Empleado Prueba 1', 3, 'correo_empleado1@dominio.com', '1111111111', 17),
(11, 'Empleado Prueba 2', 4, 'correo_empleado2@dominio.com', '2222222222', 19),
(12, 'Empleado Prueba 3', 3, 'correo_empleado3@dominio.com', '3333333333', 17),
(13, 'Empleado Prueba 4', 4, 'correo_empleado4@dominio.com', '4444444444', 19),
(14, 'Empleado Prueba 5', 4, 'correo_empleado5@dominio.com', '5555555555', 19),
(15, 'Empleado Prueba 6', 4, 'correo_empleado6@dominio.com', '6666666666', 19),
(16, 'Empleado Prueba 7', 3, 'correo_empleado7@dominio.com', '7777777777', 17),
(18, 'Empleado Prueba 9', 4, 'correo_empleado9@dominio.com', '9999999999', 19),
(20, 'Empleado Prueba 10', 4, 'correo_empleado10@dominio.com', '1010101010', 19),
(21, 'Angel López Rodríguez ', 4, 'angel_lopez87@gmail.com', '2224637842', 19),
(22, 'Empleado Prueba 11', 4, 'correo_empleado11@dominio.com', '0110110110', 19),
(30, 'Empleado Prueba 8', 3, 'correo_empleado8@dominio.com', '8888888888', 17),
(31, 'Empleado Prueba 12', 5, 'correo_empleado12@dominio.com', '0120120120', NULL),
(32, 'Empleado Prueba 13', 5, 'correo_empleado13@dominio.com', '0130130130', NULL),
(33, 'Empleado Prueba 14', 5, 'correo_empleado14@dominio.com', '0140140140', NULL),
(34, 'Empleado Prueba 15', 5, 'correo_empleado15@dominio.com', '0150150150', NULL),
(35, 'Empleado Prueba 16', 5, 'correo_empleado16@dominio.com', '0160160160', NULL),
(37, 'Embarcación prueba 17', 3, 'correo_empleado17@dominio.com', '0170170170', 17),
(38, 'Embarcación prueba 18', 4, 'correo_empleado18@dominio.com', '0180180180', 19),
(39, 'Embarcación prueba 19', 5, 'correo_empleado19@dominio.com', '0190190190', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `empleados` int(11) NOT NULL,
  `embarcaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `nombre`, `direccion`, `correo`, `telefono`, `logo`, `empleados`, `embarcaciones`) VALUES
(3, 'COMPANY', 'Direccion empresa #1', 'correo_empresa1@dominio.com.mx', '1111111111', 'logos/3.jpg', 5, 1),
(4, 'FOXTROT', 'Direccion empresa #Fox', 'correo_empresa2@dominio.com.mx', '2222222222', 'logos/4.jpg', 9, 2),
(5, 'TECHNOLOGY', 'Direccion empresa #3', 'correo_empresa3@dominio.com.mx', '3333333333', 'logos/5.jpg', 6, 3),
(6, 'SPARTAN HIGH FOOTBALL', 'Direccion empresa #4', 'correo_empresa4@dominio.com.mx', '4444444444', 'logos/6.jpg', 0, 2),
(15, 'LUMINART FILMS', 'Direccion empresa #5', 'correo_empresa5@dominio.com.mx', '5555555555', 'logos/15.jpg', 0, 0),
(16, 'TECHLOGO', 'Direccion empresa #6', 'correo_empresa6@dominio.com.mx', '6666666666', 'logos/16.jpg', 0, 0),
(17, 'CA', 'Dirección empresa #CA', 'correo_empresa7@dominio.com.mx', '7777777777', 'logos/17.jpg', 0, 2),
(20, 'LN', 'Direccion empresa #LN', 'correo_empresaX@dominio.com.mx', '6664357289', 'logos/20.jpg', 0, 0),
(22, 'YO GA', 'Direccion empresa #YO GA', 'correo_yoga@dominio.com.mx', '7776554329', 'logos/22.jpg', 0, 0),
(23, 'MI', 'Dirección empresa #MI', 'correo_mi@dominio.com.mx', '2226457897', 'logos/23.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulaciones`
--

CREATE TABLE `tripulaciones` (
  `idTripulacion` int(11) NOT NULL,
  `embarcacion` int(11) NOT NULL,
  `empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tripulaciones`
--

INSERT INTO `tripulaciones` (`idTripulacion`, `embarcacion`, `empleado`) VALUES
(32, 19, 21),
(33, 19, 22),
(34, 19, 14),
(35, 19, 18),
(36, 19, 13),
(37, 19, 15),
(39, 17, 37),
(40, 17, 1),
(41, 17, 12),
(42, 17, 16),
(43, 17, 30),
(44, 19, 38),
(45, 19, 20),
(46, 19, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `telefono`, `correo`, `contrasena`, `foto`) VALUES
(1, 'Luis Angel Moreno Vega', '2228328196', 'luismoreno.lmv4@gmail.com', 'ContraLuis', 'fotos_perfil/1.jpg'),
(5, 'Usuario Prueba 1', '1111111111', 'correo_pueba1@dominio.com', 'Contra1', 'fotos_perfil/user.jpg'),
(6, 'Usuario Prueba 2', '2222222222', 'correo_pueba2@dominio.com', 'Contra2', 'fotos_perfil/user.jpg'),
(9, 'Ines Flores Vasquez', '22212730378', 'ines_flores@correo.com', 'ContraInes', 'fotos_perfil/9.jpg'),
(10, 'Julian Perez Hernandez', '2225629194', 'julian_perez@correo.com.mx', 'Contrajulian', 'fotos_perfil/user.jpg'),
(11, 'Mario Gonzales Diaz', '2222028464', 'mario_gonz@gmail.com', 'ContraMario', 'fotos_perfil/user.jpg'),
(12, 'Victoria Benitez Romero', '2222299378', 'victoria99@outlook.com.mx', 'ContraViky', 'fotos_perfil/user.jpg'),
(13, 'Liliana Dominguez Cuevas', '2222848364', 'lili_97@gmail.com', 'ContraLili', 'fotos_perfil/user.jpg'),
(31, 'Usuario Prueba 3', '3333333333', 'correo_pueba3@dominio.com', 'Contra3', 'fotos_perfil/user.jpg'),
(32, 'Usuario Prueba 4', '4444444444', 'correo_pueba4@dominio.com', 'Contra4', 'fotos_perfil/user.jpg'),
(33, 'Usuario Prueba 5', '5555555555', 'correo_pueba5@dominio.com', 'Contra5', 'fotos_perfil/user.jpg'),
(34, 'Usuario Prueba 6', '6666666666', 'correo_pueba6@dominio.com', 'Contra6', 'fotos_perfil/user.jpg'),
(35, 'Usuario Prueba 7', '7777777777', 'correo_pueba7@dominio.com', 'Contra7', 'fotos_perfil/user.jpg'),
(36, 'Usuario Prueba 8', '8888888888', 'correo_pueba8@dominio.com', 'Contra8', 'fotos_perfil/user.jpg'),
(37, 'Usuario Prueba 9', '9999999999', 'correo_pueba9@dominio.com', 'Contra9', 'fotos_perfil/user.jpg'),
(38, 'Usuario Prueba 10', '0100100100', 'correo_pueba10@dominio.com', 'Contra10', 'fotos_perfil/user.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD PRIMARY KEY (`idEmbarcacion`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `tripulacion` (`tripulacion`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `tripulaciones`
--
ALTER TABLE `tripulaciones`
  ADD PRIMARY KEY (`idTripulacion`),
  ADD KEY `embarcacion` (`embarcacion`),
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  MODIFY `idEmbarcacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tripulaciones`
--
ALTER TABLE `tripulaciones`
  MODIFY `idTripulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD CONSTRAINT `embarcaciones_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tripulaciones`
--
ALTER TABLE `tripulaciones`
  ADD CONSTRAINT `tripulaciones_ibfk_1` FOREIGN KEY (`embarcacion`) REFERENCES `embarcaciones` (`idEmbarcacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tripulaciones_ibfk_2` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
