-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2018 a las 03:27:01
-- Versión del servidor: 5.7.21-log
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Supervisor'),
(2, 'Cajero'),
(3, 'Administrador'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `TipoDocumento` varchar(30) NOT NULL,
  `DocumentoCliente` int(11) NOT NULL,
  `NombreCliente` varchar(90) DEFAULT NULL,
  `ApellidosCliente` varchar(90) DEFAULT NULL,
  `NumeroTelefonico` int(11) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `TipoDocumento`, `DocumentoCliente`, `NombreCliente`, `ApellidosCliente`, `NumeroTelefonico`, `Email`) VALUES
(1, 'NIT', 890900608, 'ALMACENES EXITO S.A', '-', 6049696, 'SERVICIOALCLIENTE@EXITO.COM.CO'),
(2, 'NIT', 860013720, 'PONTIFICIA UNIVERSIDAD JAVERIANA', '-', 3208320, 'santoval@javeriana.edu.co'),
(4, 'CC', 79502829, 'EFREN CAMILO', 'SUESCA TORRES ', 7082912, 'EFRENITO@GMAIL.COM'),
(5, 'CC', 80297562, 'OLGA LUCIA ', 'SOLORZANO PEREZ', 2110597, 'OLGUITASOPE@HOTMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `IdConvenio` int(11) NOT NULL,
  `NombreConvenio` varchar(60) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `IdCliente` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`IdConvenio`, `NombreConvenio`, `Valor`, `IdCliente`) VALUES
(1, 'Almacenes Exito Clientes', 1500000, 1),
(2, 'Universidad Javeriana Alumnos', 2500000, 2),
(5, 'Universidad Javeriana Profesores', 2500000, 2),
(3, 'Almacenes Exito Empleados', 2000000, 1),
(4, 'Universidad Javeriana Profesores', 2500000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `IdLugar` int(11) NOT NULL,
  `Fila` varchar(1) DEFAULT NULL,
  `Columna` varchar(1) DEFAULT NULL,
  `Disponibilidad` tinyint(4) NOT NULL,
  `Placas` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`IdLugar`, `Fila`, `Columna`, `Disponibilidad`, `Placas`) VALUES
(1, 'A', '9', 1, '10'),
(2, 'A', '6', 0, 'VBG678'),
(3, 'B', '2', 0, '1'),
(4, 'D', '2', 1, '2'),
(5, 'C', '1', 0, '3'),
(6, '2', 'B', 1, 'NYT567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `TipoDeDocumento` varchar(100) NOT NULL,
  `Documento` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`IdEmpleado`, `TipoDeDocumento`, `Documento`, `Nombre`, `Apellidos`, `Cargo`) VALUES
(1, 'Cedula de ciudadania', '80125920', 'Freddy Camilo', 'Ardila Amortegui', 'Cajero'),
(2, 'Cedula de extranjeria', '3344556677', 'Luis', 'Fonsi', 'Administrador'),
(1, 'Cedula de ciudadania', '80125920', 'Freddy Camilo', 'Ardila Amortegui', 'Cajero'),
(2, 'Cedula de extranjeria', '3344556677', 'Luis', 'Fonsi', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `IdControlIngreso` int(11) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `tipovehiculo` varchar(100) NOT NULL,
  `TipoTarifa` varchar(100) NOT NULL,
  `PlacasVehiculo` varchar(100) NOT NULL,
  `NombreEmpleado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`IdControlIngreso`, `tiempo`, `tipovehiculo`, `TipoTarifa`, `PlacasVehiculo`, `NombreEmpleado`) VALUES
(1, '11:30:00.000000', 'Motocicleta', 'Hora', 'MNT56A', 'Luis Fonsi Ramirez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL,
  `tarifa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `tarifa`) VALUES
(1, 'Minuto'),
(2, 'Hora'),
(3, 'Convenio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo`
--

CREATE TABLE `tiempo` (
  `IdControlTiempo` int(11) NOT NULL,
  `HoraEntrada` time(6) DEFAULT NULL,
  `HoraSalida` time(6) DEFAULT NULL,
  `PlacaVehiculo` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiempo`
--

INSERT INTO `tiempo` (`IdControlTiempo`, `HoraEntrada`, `HoraSalida`, `PlacaVehiculo`) VALUES
(1, '16:20:00.000000', '18:24:00.000000', '1'),
(2, '11:30:00.000000', '12:04:00.000000', '2'),
(3, '16:30:00.000000', '18:44:00.000000', '3'),
(4, '11:30:00.000000', '11:50:00.000000', '4'),
(5, '10:00:00.000000', '13:20:00.000000', '5'),
(12, '19:30:00.000000', '22:00:00.000000', 'MNT56A'),
(13, '23:00:00.000000', '23:59:00.000000', 'MNT56A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo` int(11) NOT NULL,
  `nombre_documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_tipo`, `nombre_documento`) VALUES
(1, 'Cedula de ciudadania'),
(2, 'Cedula de extranjeria'),
(3, 'Tarjeta de identidad'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_vehiculo`
--

CREATE TABLE `tipo_de_vehiculo` (
  `id_tipo_v` int(11) NOT NULL,
  `nombre_tipov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_vehiculo`
--

INSERT INTO `tipo_de_vehiculo` (`id_tipo_v`, `nombre_tipov`) VALUES
(1, 'Micro Bus'),
(2, 'Automovil'),
(3, 'Motocicleta'),
(4, 'Bicicleta'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`) VALUES
(3, 'Miguel Galindo S', '$2y$10$xvB1v9WQNMq4AiXL3vSRhuENU2NaobHsf3OcMDiWIWe4yunSBFBz2'),
(4, 'Daniel Ruge', '$2y$10$S6pBblA5VTUhQeA5pW/5zOtpWPr39ag5O./fzxlG9iLZ0WOFeET0O'),
(5, 'SuperUsuario', 'qwerty1234'),
(6, 'administrador@gmail.com', '$2y$10$AlRI2VqXLXBW1SUdZNygBewZmGX3m5WaPV0c217yyAvIVxswju2Im'),
(8, 'RogerLondono', '$2y$10$uiUUXxCIeIxiyJy09XidcO7ZdK2/J3jq958DHR9dPzzvMIJgOc1F.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `IdVehiculoCliente` int(11) NOT NULL,
  `TipoV` varchar(100) NOT NULL,
  `Placas` varchar(20) DEFAULT NULL,
  `Marca` varchar(30) DEFAULT NULL,
  `Referencia` varchar(30) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `IdCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`IdVehiculoCliente`, `TipoV`, `Placas`, `Marca`, `Referencia`, `Color`, `Modelo`, `Descripcion`, `IdCliente`) VALUES
(2, 'Motocicleta', 'MNT56A', 'Mazda', 'LT', 'Azul claro', '2018', 'puerta izq rayada', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`IdConvenio`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`IdLugar`);

--
-- Indices de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`IdControlTiempo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`IdVehiculoCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `IdControlTiempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `IdVehiculoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
