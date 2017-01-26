-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2017 a las 15:15:53
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
-- Estructura de tabla para la tabla `tbl_incidenteprioridad`
--

CREATE TABLE `tbl_incidenteprioridad` (
  `IncidentePrioridadID` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidentes`
--

CREATE TABLE `tbl_incidentes` (
  `IncidenteID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Detalles` longtext NOT NULL,
  `IncidenteEstadoID` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidentestado`
--

CREATE TABLE `tbl_incidentestado` (
  `IncidenteEstadoID` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(0, 0, 0, 0, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `PersonaID` int(10) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Documento` int(8) DEFAULT NULL,
  `Sexo` longblob,
  `Mail` varchar(255) DEFAULT NULL,
  `Domicilio` varchar(255) DEFAULT NULL,
  `LocalidadID` int(10) DEFAULT NULL,
  `ProvinciaID` int(10) NOT NULL,
  `DepartamentoID` int(10) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(5, 'Incidentes', '2017-01-11 00:00:00', 0, 'javascript:loadPage(\'pages/incidentes/incidentes.php\');', NULL, 2);

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
(10, 'Ivan, Neira', 'ien1983@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-01-26 12:09:29');

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
(10, 3);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `tbl_incidentestado`
--
ALTER TABLE `tbl_incidentestado`
  ADD PRIMARY KEY (`IncidenteEstadoID`);

--
-- Indices de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  ADD PRIMARY KEY (`PerfilID`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`PersonaID`);

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
-- AUTO_INCREMENT de la tabla `tbl_incidenteprioridad`
--
ALTER TABLE `tbl_incidenteprioridad`
  MODIFY `IncidentePrioridadID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_incidentes`
--
ALTER TABLE `tbl_incidentes`
  MODIFY `IncidenteID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_incidentestado`
--
ALTER TABLE `tbl_incidentestado`
  MODIFY `IncidenteEstadoID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  MODIFY `PerfilID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primaria de la tabla', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  MODIFY `PersonaID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'LLave primaria de la tabla', AUTO_INCREMENT=11;
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
