-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2017 a las 01:06:49
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gi_msp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `CategoriaID` int(11) NOT NULL,
  `Parent` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`CategoriaID`, `Parent`, `Nombre`) VALUES
(1, 0, 'Sistemas'),
(2, 1, 'GeDoc'),
(3, 1, 'Cartas Médicas'),
(4, 1, 'Mesa de Entrada'),
(5, 1, 'Cronos'),
(6, 1, 'Otro'),
(7, 0, 'Hardware'),
(8, 7, 'PC'),
(9, 7, 'Impresora/s'),
(10, 7, 'Otro'),
(11, 0, 'Otro'),
(12, 0, 'Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dependencias`
--

CREATE TABLE `tbl_dependencias` (
  `DependenciaID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_dependencias`
--

INSERT INTO `tbl_dependencias` (`DependenciaID`, `UsuarioID`, `Nombre`) VALUES
(1, 3, 'Desarrollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidenteestado`
--

CREATE TABLE `tbl_incidenteestado` (
  `IncidenteEstadoID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_incidenteestado`
--

INSERT INTO `tbl_incidenteestado` (`IncidenteEstadoID`, `Nombre`) VALUES
(1, 'Abierto'),
(2, 'Cerrado'),
(3, 'Resuelto'),
(4, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidenteprioridad`
--

CREATE TABLE `tbl_incidenteprioridad` (
  `IncidentePrioridadID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_incidenteprioridad`
--

INSERT INTO `tbl_incidenteprioridad` (`IncidentePrioridadID`, `Nombre`) VALUES
(1, 'Bajo'),
(2, 'Normal'),
(3, 'Urgente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidentes`
--

CREATE TABLE `tbl_incidentes` (
  `IncidenteID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `CategoriaID` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Detalles` longtext NOT NULL,
  `IncidenteEstadoID` int(11) NOT NULL,
  `IncidentePrioridadID` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_incidentes`
--

INSERT INTO `tbl_incidentes` (`IncidenteID`, `UsuarioID`, `CategoriaID`, `Titulo`, `Detalles`, `IncidenteEstadoID`, `IncidentePrioridadID`, `FechaRegistro`) VALUES
(1, 3, 0, 'Titulo', '<p>Detalle</p>', 1, 1, '2017-01-27 15:17:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfiles`
--

CREATE TABLE `tbl_perfiles` (
  `PerfilID` int(11) NOT NULL COMMENT 'llave primaria de la tabla',
  `Nombre` varchar(45) DEFAULT NULL COMMENT 'Descripción del perfil',
  `FechaRegistro` datetime DEFAULT NULL COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_perfiles`
--

INSERT INTO `tbl_perfiles` (`PerfilID`, `Nombre`, `FechaRegistro`) VALUES
(3, 'Administrador', '2017-01-11 00:00:00'),
(4, 'Operador', '2017-01-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfilesrecursos`
--

CREATE TABLE `tbl_perfilesrecursos` (
  `Consultar` tinyint(1) DEFAULT '0',
  `Agregar` tinyint(1) DEFAULT '0',
  `Editar` tinyint(1) DEFAULT '0',
  `Eliminar` tinyint(1) DEFAULT '0',
  `RecursoID` int(11) NOT NULL,
  `PerfilID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_perfilesrecursos`
--

INSERT INTO `tbl_perfilesrecursos` (`Consultar`, `Agregar`, `Editar`, `Eliminar`, `RecursoID`, `PerfilID`) VALUES
(0, 0, 0, 0, 1, 3),
(0, 0, 0, 0, 2, 3),
(0, 0, 0, 0, 3, 3),
(0, 0, 0, 0, 4, 3),
(0, 0, 0, 0, 5, 3),
(0, 0, 0, 0, 5, 3),
(0, 0, 0, 0, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `RecursoID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL COMMENT 'nombre del recurso',
  `FechaRegistro` datetime DEFAULT NULL COMMENT 'Fecha en la que se registro el recurso',
  `Parent` int(11) DEFAULT '1',
  `Link` varchar(255) DEFAULT '#',
  `Icon` varchar(30) DEFAULT NULL,
  `Orden` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`RecursoID`, `Nombre`, `FechaRegistro`, `Parent`, `Link`, `Icon`, `Orden`) VALUES
(1, 'Home', '2017-01-11 00:00:00', 0, 'javascript:loadPage(\'pages/home/home.php\');', 'fa fa-home', 0),
(2, 'Usuarios', '2017-01-11 00:00:00', 0, '', '', 1),
(3, 'Usuarios', '2017-01-11 00:00:00', 2, 'javascript:loadPage(\'pages/usuarios/usuarios.php\');', NULL, 1),
(4, 'Permisos', '2017-01-11 00:00:00', 2, 'javascript:loadPage(\'pages/permisos/permisos.php\');', NULL, 2),
(5, 'Incidentes', '2017-01-11 00:00:00', 0, 'javascript:loadPage(\'pages/incidentes/incidentes.php\');', NULL, 2),
(6, 'Configuraciones', '2017-01-11 00:00:00', 0, 'javascript:loadPage(\'pages/configuraciones/configuraciones.php\');', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `UsuarioID` int(11) NOT NULL COMMENT 'LLave primaria de la tabla',
  `Nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre completo del usuario',
  `Email` varchar(75) DEFAULT NULL COMMENT 'Login del usuario',
  `Password` varchar(45) DEFAULT NULL COMMENT 'Clave del usuario',
  `FechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en la que se registro el usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`UsuarioID`, `Nombre`, `Email`, `Password`, `FechaRegistro`) VALUES
(3, 'Sebastian, Mendoza', 'pseba20@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-01-11 00:00:00'),
(8, 'Delgado, Rolando', 'rdel@gmai.com.ar', 'f4cc399f0effd13c888e310ea2cf5399', '2017-01-25 08:47:44'),
(10, 'Ivan, Neira', 'ien1983@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-01-26 12:09:29'),
(11, 'Garcia, Paulo', 'a@a.com', '202cb962ac59075b964b07152d234b70', '2017-01-26 12:29:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuariosperfiles`
--

CREATE TABLE `tbl_usuariosperfiles` (
  `UsuarioID` int(11) NOT NULL,
  `PerfilID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuariosperfiles`
--

INSERT INTO `tbl_usuariosperfiles` (`UsuarioID`, `PerfilID`) VALUES
(8, 4),
(3, 3),
(10, 3),
(11, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `tbl_dependencias`
--
ALTER TABLE `tbl_dependencias`
  ADD PRIMARY KEY (`DependenciaID`);

--
-- Indices de la tabla `tbl_incidenteestado`
--
ALTER TABLE `tbl_incidenteestado`
  ADD PRIMARY KEY (`IncidenteEstadoID`);

--
-- Indices de la tabla `tbl_incidenteprioridad`
--
ALTER TABLE `tbl_incidenteprioridad`
  ADD PRIMARY KEY (`IncidentePrioridadID`);

--
-- Indices de la tabla `tbl_incidentes`
--
ALTER TABLE `tbl_incidentes`
  ADD PRIMARY KEY (`IncidenteID`);

--
-- Indices de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  ADD PRIMARY KEY (`PerfilID`);

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`RecursoID`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- Indices de la tabla `tbl_usuariosperfiles`
--
ALTER TABLE `tbl_usuariosperfiles`
  ADD KEY `fk_usuarios_perfiles_usuarios_idx` (`UsuarioID`),
  ADD KEY `fk_usuarios_perfiles_perfiles1_idx` (`PerfilID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_dependencias`
--
ALTER TABLE `tbl_dependencias`
  MODIFY `DependenciaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_incidenteestado`
--
ALTER TABLE `tbl_incidenteestado`
  MODIFY `IncidenteEstadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_incidenteprioridad`
--
ALTER TABLE `tbl_incidenteprioridad`
  MODIFY `IncidentePrioridadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_incidentes`
--
ALTER TABLE `tbl_incidentes`
  MODIFY `IncidenteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  MODIFY `PerfilID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primaria de la tabla', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'LLave primaria de la tabla', AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_usuariosperfiles`
--
ALTER TABLE `tbl_usuariosperfiles`
  ADD CONSTRAINT `fk_usuarios_perfiles_perfiles1` FOREIGN KEY (`PerfilID`) REFERENCES `tbl_perfiles` (`PerfilID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_perfiles_usuarios` FOREIGN KEY (`UsuarioID`) REFERENCES `tbl_usuarios` (`UsuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
