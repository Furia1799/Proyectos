-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2019 a las 20:52:51
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `terapeutafinal`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarAlumnos` (IN `nombreI` VARCHAR(30), IN `apellidoPI` VARCHAR(30), IN `apellidoMI` VARCHAR(30), IN `nacimientoI` DATE, IN `emailI` VARCHAR(30), IN `pwdI` VARCHAR(20), IN `celI` VARCHAR(10), IN `statusI` VARCHAR(20), IN `generoI` VARCHAR(20), IN `idI` INT)  UPDATE usuarios SET  nombre= nombreI,apellidoP= apellidoP,
					 apellidoM =apellidoMI,nacimiento= nacimientoI,
                     email= emailI,pwd = pwdI,cel=celI,
                     status= statusI,genero=generoI 
                     WHERE id=idI$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuarios` (IN `idI` INT)  DELETE FROM usuarios 
	WHERE id=idI$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAlumnos` (IN `nombreI` VARCHAR(30), IN `apellidoPI` VARCHAR(30), IN `apellidoMI` VARCHAR(30), IN `nacimientoI` DATE, IN `emailI` VARCHAR(30), IN `pwdI` VARCHAR(20), IN `celI` VARCHAR(10), IN `statusI` VARCHAR(20), IN `generoI` VARCHAR(15))  INSERT INTO usuarios (nombre,apellidoP,apellidoM,nacimiento,email,pwd,cel,status,genero)
		VALUES(nombreI,apellidoPI, apellidoMI,nacimientoI,emailI, pwdI,celI,statusI,generoI)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarAlumnos` ()  SELECT 
*
FROM 
usuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unoUsuario` (IN `idI` INT)  SELECT * FROM usuarios 
    WHERE id=idI$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getTotalDoctores` () RETURNS INT(11) BEGIN
   	DECLARE totalDoctores int;
   	SELECT COUNT(*) INTO totalDoctores 
   	FROM doctores;
RETURN totalDoctores;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getTotalUsuarios` () RETURNS INT(11) BEGIN

  DECLARE totalUsuarios int;
  SELECT COUNT(*) INTO totalUsuarios 
 FROM usuarios;

  
  RETURN totalUsuarios;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `estatura` varchar(10) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `consultorio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `peso`, `estatura`, `observaciones`, `doctor_id`, `paciente_id`, `consultorio_id`) VALUES
(1, '2019-11-19', '09:13:26', '67', '1.72', 'esta muy grave', 2, 1, 3),
(2, '2019-11-19', '09:13:26', '67', '1.72', 'esta muy grave', 1, 6, 1),
(4, '2019-11-20', '21:51:36', '23', '23', '43', 2, 1, 3),
(20, '2019-11-22', '24:06:00', '65', '170', NULL, 1, 1, 1),
(21, '2019-11-26', '14:39:30', '23', '23', 'es muy malo', 1, 1, 1),
(22, '2019-11-27', '12:54:41', '50', '50', 'Listo para jugar', 1, 1, 1),
(23, '2019-11-30', '17:31:49', '60', '178', 'Muy grave', 6, 14, 1),
(24, '2019-12-05', '13:19:48', '100', '1000', 'Ninguna', 6, 13, 1),
(25, '2019-12-06', '13:34:37', '-100', '-100', '', 6, 13, 1);

--
-- Disparadores `citas`
--
DELIMITER $$
CREATE TRIGGER `ingresar_cita` AFTER INSERT ON `citas` FOR EACH ROW INSERT INTO expediente (cita_id) VALUES(new.id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `id` int(11) NOT NULL,
  `equipamiento` varchar(300) NOT NULL,
  `observaciones` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`id`, `equipamiento`, `observaciones`) VALUES
(1, 'Escritorio , 3 sillas , cama terapeutica , laptop , telefono , caja fuerte.', 'ninguna'),
(3, 'Escritorio, 2 sillas, cama terapeutica , laptop , telefono .', 'Ventana rota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidoP` varchar(20) NOT NULL,
  `apellidoM` varchar(20) NOT NULL,
  `nacimiento` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellidoP`, `apellidoM`, `nacimiento`, `email`, `pwd`, `status`, `genero`) VALUES
(1, 'Bryan', 'Flores', 'Reyes', '1999-07-01', 'furia1799@gmail.com', '123', 'Activo', 'Hombre'),
(2, 'Noe', 'Reyes', 'Flores', '1999-05-22', 'Edgar_noe@.com', 'edgar123', 'Activo', 'Hombre'),
(4, 'Karen', 'Sepulveda', 'Cardenas', '1999-12-16', 'karen@gmail.com', 'karen123', 'Activo', 'Mujer'),
(5, 'Cristina', 'Flores', 'Tinoco', '1974-07-24', 'cristina@.com', 'cristina123', 'Activo', 'Mujer'),
(6, 'Admin', 'Admin', 'Admin', '2019-11-30', 'Admin@.com', 'Admin123', 'Activo', 'Admin'),
(8, 'Bryan', 'Reyes', 'Flores', '1999-10-01', 'Bryan@.com', 'bryan123', 'Activo', 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id_expediente`, `cita_id`) VALUES
(4, 20),
(5, 21),
(6, 22),
(7, 23),
(8, 24),
(9, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidoP` varchar(20) NOT NULL,
  `apellidoM` varchar(20) NOT NULL,
  `nacimiento` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `cel` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoP`, `apellidoM`, `nacimiento`, `email`, `pwd`, `cel`, `status`, `genero`) VALUES
(1, 'Bryan', 'Reyes', 'flores', '0000-00-00', 'furia@gmail.com', '123', '123', 'activo', 'hombre'),
(6, 'Karen', 'Sepulveda', 'Cardenas', '1999-07-16', 'karen@gmail.com', '123', '4444444445', 'Activo', 'Mujer'),
(8, 'Noe', 'Reyes', 'Flores', '1993-05-22', 'Edgar_noe@.com', 'noe123', '3317262355', 'Activo', 'Hombre'),
(13, 'Gustavo', 'Perez', 'Flores', '2019-01-12', 'Gustavo@.com', 'gustavo123', '3312334556', 'Activo', 'Hombre'),
(14, 'Luis', 'Diaz', 'Preciado', '1998-12-07', 'dias_@.com', '123tamarindo', '3334353637', 'Activo', 'Hombre'),
(16, 'Gustavo', 'Perez', 'Flores', '1993-07-01', 'Gustavo@.com', '123', '3333333333', 'Activo', 'Hombre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `consutorio_id` (`consultorio_id`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `cita_id` (`cita_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
