-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: db745573440.db.1and1.com
-- Tiempo de generación: 10-04-2019 a las 03:08:49
-- Versión del servidor: 5.5.60-0+deb7u1-log
-- Versión de PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db745573440`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_entrega` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `titulo`, `descripcion`, `archivo`, `id_grupo`, `fecha_pub`, `fecha_entrega`, `activo`) VALUES
(1, 'AnÃ¡lisis FODA', 'Buen dÃ­a, jovenes.\r\nQuiero solicitarles que realicen un anÃ¡lisis FODA sobre ustedes. escriban sus fortalezas, debilidades y demÃ¡s en un archivo formato PDF y envÃ­enmelo por este medio para su revisiÃ³n.\r\nQue tengan un buen dÃ­a.', NULL, 194, '2019-03-14 05:17:54', '2019-03-16 04:00:00', 1),
(2, 'Test sobre Inteligencia Emocional', 'Descargar este documento y contestar las preguntas del test, subrayando la respuesta.\r\n\r\nSubir el documento con las respuestas.', 'TEST DE INTELIGENCIA EMOCIONAL 4B.pdf', 308, '2019-04-09 22:52:35', '2019-04-09 04:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesorias`
--

CREATE TABLE `asesorias` (
  `id` int(11) NOT NULL,
  `tutor` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asesorias`
--

INSERT INTO `asesorias` (`id`, `tutor`, `alumno`, `titulo`, `descripcion`, `fecha`, `hora`) VALUES
(1, 73, 84, 'Reporte de sus calificaciones parciales obtenidas en las materias que cursan', 'Favor en enviar el archivo de Excel, donde registra las calificaciones parciales de las materias que se encuentra estudiando. dicho documento debe estar actualizado.\r\nSaludos.', '2019-04-10', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fec_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post`, `id_usuario`, `fec_pub`, `comentario`) VALUES
(4, 6, 82, '2019-04-09 19:44:42', 'PAAAAAAAA\r\n'),
(5, 6, 77, '2019-04-09 19:47:58', 'siempre son los mas callados'),
(6, 6, 86, '2019-04-09 19:48:11', 'paaaaaaaaa\r\n\r\n'),
(7, 8, 77, '2019-04-09 19:49:19', 'no puedo, me pegan :\'v\r\n'),
(8, 7, 87, '2019-04-09 19:50:06', 'Is fake'),
(9, 8, 82, '2019-04-09 19:50:25', 'nmms rosember esta al 2x1 en el malecon vamos!'),
(10, 8, 83, '2019-04-09 19:51:17', 'Gonzalo pero no hay problema, aun no son nada:v ella no puede decir nada'),
(11, 8, 77, '2019-04-09 19:52:11', 'jajajaja no puedo argumentar nada ante esa logica\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuarios`
--

CREATE TABLE `detalle_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `a_paterno` varchar(100) NOT NULL,
  `a_materno` varchar(100) NOT NULL,
  `fec_nac` date NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `num_tel` varchar(20) DEFAULT NULL,
  `no_control` varchar(20) NOT NULL,
  `carrera` varchar(150) NOT NULL,
  `semestre` int(11) NOT NULL,
  `grupo` varchar(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `edit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_usuarios`
--

INSERT INTO `detalle_usuarios` (`id`, `id_usuario`, `nombre`, `a_paterno`, `a_materno`, `fec_nac`, `direccion`, `num_tel`, `no_control`, `carrera`, `semestre`, `grupo`, `email`, `edit`) VALUES
(11, 73, 'zofia ', 'benitez', 'alonso', '1970-10-21', NULL, NULL, 111, 'Sistemas Computacionales', 4, 'B', 'sofybenitez@hotmail.com', 1),
(12, 74, 'kevin brian ', 'peã±a', 'potenciano', '1998-11-30', NULL, NULL, 17081284, 'Sistemas Computacionales', 4, 'B', 'kevinbrianpena@gmail.com', 1),
(13, 75, 'brayan enrique', 'camarillo', 'rodriguez', '1999-09-27', NULL, NULL, 17080087, 'Sistemas Computacionales', 4, 'B', 'bracaro666@gmail.com', 1),
(14, 76, 'manuel eduardo ', 'perez', 'cabra', '1999-05-27', 'Independencia 202, Campo Nuevo, Las Choapas', '9231299310', 17080130, 'Sistemas Computacionales', 4, 'B', 'manuelperezcabra@gmail.com', 2),
(15, 77, 'gonzalo', 'alonso', 'castro', '1999-01-02', 'zarapuato, xiztlacakan', '9876543210', 17080082, 'Sistemas Computacionales', 4, 'B', 'gonzaloskill123@gmail.com', 2),
(16, 78, 'elizeth regina', 'lopez', 'zamora', '1999-05-29', 'Esmeralda #630, La Victoria, Coatzacoalcos', '9212354339', 17080120, 'Sistemas Computacionales', 4, 'B', 'elilopezx3@hotmail.com', 2),
(17, 79, 'dulce maria', 'morales', 'ochoa', '1999-08-12', 'alberto fuster, paraiso, coatzacoalcos', '9211312599', 17080126, 'Sistemas Computacionales', 4, 'B', 'isic.dmoraleso@itesco.edu.mx', 2),
(18, 80, 'carlos guillermo', 'contreras', 'uscanga', '1993-06-23', NULL, NULL, 17080093, 'Sistemas Computacionales', 4, 'B', 'cielo.negro.02@gmail.com', 1),
(19, 81, 'israel', 'francisco', 'martinez', '1996-07-14', NULL, NULL, 17080102, 'Sistemas Computacionales', 4, 'B', 'isr.fran.faick@hotmail.com', 1),
(20, 82, 'alessandro', 'lopez', 'lopez', '1999-05-04', 'azteca, francisco villa, coatzacoalcos', '9212683537', 17080118, 'Sistemas Computacionales', 4, 'B', 'alesslopez99@gmail.com', 2),
(21, 83, 'adolfo rosemberg', 'renteria', 'pineda', '1999-01-23', NULL, NULL, 17080139, 'Sistemas Computacionales', 4, 'B', 'blackwolfv23@gmail.com', 1),
(22, 84, 'valeria', 'coronel', 'flores', '1999-02-15', NULL, NULL, 17081219, 'Sistemas Computacionales', 4, 'B', 'valeriia.dani22@hotmail.com', 1),
(23, 85, 'jesus alberto', 'sandoval', 'matias', '1999-02-09', NULL, NULL, 17080146, 'Sistemas Computacionales', 4, 'B', 'jesus_inteligente9@hotmail.com', 1),
(24, 86, 'maximino', 'lopez ', 'gonzalez ', '1999-07-02', 'callle carmen serdan #14, canticas,cosoleacaque veracruz', '9211810786', 17080117, 'Sistemas Computacionales', 4, 'B', 'nen_pepe@hotmail.com', 2),
(25, 87, 'francisco javier', 'rodriguez', 'gomez', '1999-06-24', NULL, NULL, 17080144, 'Sistemas Computacionales', 4, 'B', 'isic.frodriguezg@itesco.edu.mx', 1),
(26, 88, 'lino', 'perez', 'romero', '1999-08-17', NULL, NULL, 17080132, 'Sistemas Computacionales', 4, 'B', 'linoromero819@gmail.com', 1),
(27, 89, 'abigail damiana', 'santiago ', 'clemente', '1998-12-21', NULL, NULL, 17080147, 'Sistemas Computacionales', 4, 'B', 'isic.asantiagoc@itesco.edu.mx', 1),
(28, 90, 'ãngel miguel', 'hipolito', 'ãlvarez', '1998-01-22', NULL, NULL, 17080111, 'Sistemas Computacionales', 4, 'B', 'gelan117vip@gmail.com', 1),
(29, 91, 'norma hildelisa', 'jiménez', 'alor', '1973-11-27', NULL, NULL, 112, 'Animacion Digital y Efectos Visuales', 2, 'A', 'njalor@hotmail.com', 1),
(30, 92, 'kenia itzel ', 'hernandez', 'sagrero', '2000-09-22', NULL, NULL, 18080150, 'Animacion Digital y Efectos Visuales', 2, 'A', 'keniahdez2209@gmail.com', 1),
(31, 93, 'osmar javier ', 'gutiérrez', 'alvarez ', '1999-04-09', NULL, NULL, 18080148, 'Animacion Digital y Efectos Visuales', 2, 'A', 'osmargu.al999@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_actividades`
--

CREATE TABLE `entrega_actividades` (
  `id_actividad` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `id` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formatos`
--

INSERT INTO `formatos` (`id`, `archivo`, `fec_sub`, `tipo`) VALUES
(1, 'Plan de trabajo.pdf', '2019-03-25 03:55:17', 'plan_trabajo'),
(2, 'Programa.pdf', '2019-03-25 03:55:29', 'programa'),
(3, 'Registro del tutorado.pdf', '2019-03-25 03:55:44', 'registro_tutorado'),
(4, 'Reporte parcial.pdf', '2019-03-25 03:56:06', 'reporte_parcial'),
(5, 'Reporte final.pdf', '2019-03-25 03:56:20', 'reporte_final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_post` int(11) NOT NULL,
  `fecha_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(250) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id_post`, `fecha_pub`, `titulo`, `contenido`, `imagen`, `id_usuario`, `id_grupo`, `visible`) VALUES
(6, '2019-04-09 19:44:15', 'Sexualidad e Rosemberg', 'Rosemberg tira para el bando contrario', '', 76, 308, 1),
(7, '2019-04-09 19:47:16', 'you are welcome', 'You are welcome, on this site you will find happiness', 'fondo.jpg', 77, 308, 1),
(8, '2019-04-09 19:48:20', 'Tonks que pz vamos por unas nenas ?', ':)', '', 82, 308, 1),
(9, '2019-04-09 22:46:53', 'Bienvenidos a este espacio de retroalimentaciÃ³n', 'Hola jÃ³venes,  este espacio es para plantear alguna duda que tengan sobre aspectos acadÃ©micos.\r\n\r\nSaludos.', '', 73, 308, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `grupo` varchar(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo`, `semestre`, `carrera`) VALUES
(0, '0', 0, 'Admin'),
(1, 'A', 1, 'Administracion'),
(2, 'B', 1, 'Administracion'),
(3, 'C', 1, 'Administracion'),
(4, 'D', 1, 'Administracion'),
(5, 'E', 1, 'Administracion'),
(6, 'F', 1, 'Administracion'),
(7, 'A', 2, 'Administracion'),
(8, 'B', 2, 'Administracion'),
(9, 'C', 2, 'Administracion'),
(10, 'D', 2, 'Administracion'),
(11, 'E', 2, 'Administracion'),
(12, 'F', 2, 'Administracion'),
(13, 'A', 3, 'Administracion'),
(14, 'B', 3, 'Administracion'),
(15, 'C', 3, 'Administracion'),
(16, 'D', 3, 'Administracion'),
(17, 'E', 3, 'Administracion'),
(18, 'F', 3, 'Administracion'),
(19, 'A', 4, 'Administracion'),
(20, 'B', 4, 'Administracion'),
(21, 'C', 4, 'Administracion'),
(22, 'D', 4, 'Administracion'),
(23, 'E', 4, 'Administracion'),
(24, 'F', 4, 'Administracion'),
(25, 'A', 1, 'Animacion Digital y Efectos Visuales'),
(26, 'B', 1, 'Animacion Digital y Efectos Visuales'),
(27, 'C', 1, 'Animacion Digital y Efectos Visuales'),
(28, 'D', 1, 'Animacion Digital y Efectos Visuales'),
(29, 'E', 1, 'Animacion Digital y Efectos Visuales'),
(30, 'F', 1, 'Animacion Digital y Efectos Visuales'),
(31, 'A', 2, 'Animacion Digital y Efectos Visuales'),
(32, 'B', 2, 'Animacion Digital y Efectos Visuales'),
(33, 'C', 2, 'Animacion Digital y Efectos Visuales'),
(34, 'D', 2, 'Animacion Digital y Efectos Visuales'),
(35, 'E', 2, 'Animacion Digital y Efectos Visuales'),
(36, 'F', 2, 'Animacion Digital y Efectos Visuales'),
(37, 'A', 3, 'Animacion Digital y Efectos Visuales'),
(38, 'B', 3, 'Animacion Digital y Efectos Visuales'),
(39, 'C', 3, 'Animacion Digital y Efectos Visuales'),
(40, 'D', 3, 'Animacion Digital y Efectos Visuales'),
(41, 'E', 3, 'Animacion Digital y Efectos Visuales'),
(42, 'F', 3, 'Animacion Digital y Efectos Visuales'),
(43, 'A', 4, 'Animacion Digital y Efectos Visuales'),
(44, 'B', 4, 'Animacion Digital y Efectos Visuales'),
(45, 'C', 4, 'Animacion Digital y Efectos Visuales'),
(46, 'D', 4, 'Animacion Digital y Efectos Visuales'),
(47, 'E', 4, 'Animacion Digital y Efectos Visuales'),
(48, 'F', 4, 'Animacion Digital y Efectos Visuales'),
(49, 'A', 1, 'Bioquimica'),
(50, 'B', 1, 'Bioquimica'),
(51, 'C', 1, 'Bioquimica'),
(52, 'D', 1, 'Bioquimica'),
(53, 'E', 1, 'Bioquimica'),
(54, 'F', 1, 'Bioquimica'),
(55, 'A', 2, 'Bioquimica'),
(56, 'B', 2, 'Bioquimica'),
(57, 'C', 2, 'Bioquimica'),
(58, 'D', 2, 'Bioquimica'),
(59, 'E', 2, 'Bioquimica'),
(60, 'F', 2, 'Bioquimica'),
(61, 'A', 3, 'Bioquimica'),
(62, 'B', 3, 'Bioquimica'),
(63, 'C', 3, 'Bioquimica'),
(64, 'D', 3, 'Bioquimica'),
(65, 'E', 3, 'Bioquimica'),
(66, 'F', 3, 'Bioquimica'),
(67, 'A', 4, 'Bioquimica'),
(68, 'B', 4, 'Bioquimica'),
(69, 'C', 4, 'Bioquimica'),
(70, 'D', 4, 'Bioquimica'),
(71, 'E', 4, 'Bioquimica'),
(72, 'F', 4, 'Bioquimica'),
(73, 'A', 1, 'Electrica'),
(74, 'B', 1, 'Electrica'),
(75, 'C', 1, 'Electrica'),
(76, 'D', 1, 'Electrica'),
(77, 'E', 1, 'Electrica'),
(78, 'F', 1, 'Electrica'),
(79, 'A', 2, 'Electrica'),
(80, 'B', 2, 'Electrica'),
(81, 'C', 2, 'Electrica'),
(82, 'D', 2, 'Electrica'),
(83, 'E', 2, 'Electrica'),
(84, 'F', 2, 'Electrica'),
(85, 'A', 3, 'Electrica'),
(86, 'B', 3, 'Electrica'),
(87, 'C', 3, 'Electrica'),
(88, 'D', 3, 'Electrica'),
(89, 'E', 3, 'Electrica'),
(90, 'F', 3, 'Electrica'),
(91, 'A', 4, 'Electrica'),
(92, 'B', 4, 'Electrica'),
(93, 'C', 4, 'Electrica'),
(94, 'D', 4, 'Electrica'),
(95, 'E', 4, 'Electrica'),
(96, 'F', 4, 'Electrica'),
(97, 'A', 1, 'Electronica'),
(98, 'B', 1, 'Electronica'),
(99, 'C', 1, 'Electronica'),
(100, 'D', 1, 'Electronica'),
(101, 'E', 1, 'Electronica'),
(102, 'F', 1, 'Electronica'),
(103, 'A', 2, 'Electronica'),
(104, 'B', 2, 'Electronica'),
(105, 'C', 2, 'Electronica'),
(106, 'D', 2, 'Electronica'),
(107, 'E', 2, 'Electronica'),
(108, 'F', 2, 'Electronica'),
(109, 'A', 3, 'Electronica'),
(110, 'B', 3, 'Electronica'),
(111, 'C', 3, 'Electronica'),
(112, 'D', 3, 'Electronica'),
(113, 'E', 3, 'Electronica'),
(114, 'F', 3, 'Electronica'),
(115, 'A', 4, 'Electronica'),
(116, 'B', 4, 'Electronica'),
(117, 'C', 4, 'Electronica'),
(118, 'D', 4, 'Electronica'),
(119, 'E', 4, 'Electronica'),
(120, 'F', 4, 'Electronica'),
(121, 'A', 1, 'Gestion Empresarial'),
(122, 'B', 1, 'Gestion Empresarial'),
(123, 'C', 1, 'Gestion Empresarial'),
(124, 'D', 1, 'Gestion Empresarial'),
(125, 'E', 1, 'Gestion Empresarial'),
(126, 'F', 1, 'Gestion Empresarial'),
(127, 'A', 2, 'Gestion Empresarial'),
(128, 'B', 2, 'Gestion Empresarial'),
(129, 'C', 2, 'Gestion Empresarial'),
(130, 'D', 2, 'Gestion Empresarial'),
(131, 'E', 2, 'Gestion Empresarial'),
(132, 'F', 2, 'Gestion Empresarial'),
(133, 'A', 3, 'Gestion Empresarial'),
(134, 'B', 3, 'Gestion Empresarial'),
(135, 'C', 3, 'Gestion Empresarial'),
(136, 'D', 3, 'Gestion Empresarial'),
(137, 'E', 3, 'Gestion Empresarial'),
(138, 'F', 3, 'Gestion Empresarial'),
(139, 'B', 4, 'Gestion Empresarial'),
(140, 'C', 4, 'Gestion Empresarial'),
(141, 'D', 4, 'Gestion Empresarial'),
(142, 'E', 4, 'Gestion Empresarial'),
(143, 'F', 4, 'Gestion Empresarial'),
(144, 'A', 1, 'Informatica'),
(145, 'B', 1, 'Informatica'),
(146, 'C', 1, 'Informatica'),
(147, 'D', 1, 'Informatica'),
(148, 'E', 1, 'Informatica'),
(149, 'F', 1, 'Informatica'),
(150, 'A', 2, 'Informatica'),
(151, 'B', 2, 'Informatica'),
(152, 'C', 2, 'Informatica'),
(153, 'D', 2, 'Informatica'),
(154, 'E', 2, 'Informatica'),
(155, 'F', 2, 'Informatica'),
(156, 'A', 3, 'Informatica'),
(157, 'B', 3, 'Informatica'),
(158, 'C', 3, 'Informatica'),
(159, 'D', 3, 'Informatica'),
(160, 'E', 3, 'Informatica'),
(161, 'F', 3, 'Informatica'),
(162, 'A', 4, 'Informatica'),
(163, 'B', 4, 'Informatica'),
(164, 'C', 4, 'Informatica'),
(165, 'D', 4, 'Informatica'),
(166, 'E', 4, 'Informatica'),
(167, 'F', 4, 'Informatica'),
(168, 'A', 1, 'Industrial'),
(169, 'B', 1, 'Industrial'),
(170, 'C', 1, 'Industrial'),
(171, 'D', 1, 'Industrial'),
(172, 'E', 1, 'Industrial'),
(173, 'F', 1, 'Industrial'),
(174, 'A', 2, 'Industrial'),
(175, 'B', 2, 'Industrial'),
(176, 'C', 2, 'Industrial'),
(177, 'D', 2, 'Industrial'),
(178, 'E', 2, 'Industrial'),
(179, 'F', 2, 'Industrial'),
(180, 'A', 3, 'Industrial'),
(181, 'B', 3, 'Industrial'),
(182, 'C', 3, 'Industrial'),
(183, 'D', 3, 'Industrial'),
(184, 'E', 3, 'Industrial'),
(185, 'F', 3, 'Industrial'),
(186, 'A', 4, 'Industrial'),
(187, 'B', 4, 'Industrial'),
(188, 'C', 4, 'Industrial'),
(189, 'D', 4, 'Industrial'),
(190, 'E', 4, 'Industrial'),
(191, 'F', 4, 'Industrial'),
(192, 'A', 1, 'Mecatronica'),
(193, 'B', 1, 'Mecatronica'),
(194, 'C', 1, 'Mecatronica'),
(195, 'D', 1, 'Mecatronica'),
(196, 'E', 1, 'Mecatronica'),
(197, 'F', 1, 'Mecatronica'),
(198, 'A', 2, 'Mecatronica'),
(199, 'B', 2, 'Mecatronica'),
(200, 'C', 2, 'Mecatronica'),
(201, 'D', 2, 'Mecatronica'),
(202, 'E', 2, 'Mecatronica'),
(203, 'F', 2, 'Mecatronica'),
(204, 'A', 3, 'Mecatronica'),
(205, 'B', 3, 'Mecatronica'),
(206, 'C', 3, 'Mecatronica'),
(207, 'D', 3, 'Mecatronica'),
(208, 'E', 3, 'Mecatronica'),
(209, 'F', 3, 'Mecatronica'),
(210, 'A', 4, 'Mecatronica'),
(211, 'B', 4, 'Mecatronica'),
(212, 'C', 4, 'Mecatronica'),
(213, 'D', 4, 'Mecatronica'),
(214, 'E', 4, 'Mecatronica'),
(215, 'F', 4, 'Mecatronica'),
(216, 'A', 1, 'Mecanica'),
(217, 'B', 1, 'Mecanica'),
(218, 'C', 1, 'Mecanica'),
(219, 'D', 1, 'Mecanica'),
(220, 'E', 1, 'Mecanica'),
(221, 'F', 1, 'Mecanica'),
(222, 'A', 2, 'Mecanica'),
(223, 'B', 2, 'Mecanica'),
(224, 'C', 2, 'Mecanica'),
(225, 'D', 2, 'Mecanica'),
(226, 'E', 2, 'Mecanica'),
(227, 'F', 2, 'Mecanica'),
(228, 'A', 3, 'Mecanica'),
(229, 'B', 3, 'Mecanica'),
(230, 'C', 3, 'Mecanica'),
(231, 'D', 3, 'Mecanica'),
(232, 'E', 3, 'Mecanica'),
(234, 'F', 3, 'Mecanica'),
(235, 'A', 4, 'Mecanica'),
(236, 'B', 4, 'Mecanica'),
(237, 'C', 4, 'Mecanica'),
(238, 'D', 4, 'Mecanica'),
(239, 'E', 4, 'Mecanica'),
(240, 'F', 4, 'Mecanica'),
(241, 'A', 1, 'Petrolera'),
(242, 'B', 1, 'Petrolera'),
(243, 'C', 1, 'Petrolera'),
(244, 'D', 1, 'Petrolera'),
(245, 'E', 1, 'Petrolera'),
(246, 'F', 1, 'Petrolera'),
(247, 'A', 2, 'Petrolera'),
(248, 'B', 2, 'Petrolera'),
(249, 'C', 2, 'Petrolera'),
(250, 'D', 2, 'Petrolera'),
(251, 'E', 2, 'Petrolera'),
(252, 'F', 2, 'Petrolera'),
(253, 'A', 3, 'Petrolera'),
(254, 'B', 3, 'Petrolera'),
(255, 'C', 3, 'Petrolera'),
(256, 'D', 3, 'Petrolera'),
(257, 'E', 3, 'Petrolera'),
(258, 'F', 3, 'Petrolera'),
(259, 'A', 4, 'Petrolera'),
(260, 'B', 4, 'Petrolera'),
(261, 'C', 4, 'Petrolera'),
(262, 'D', 4, 'Petrolera'),
(263, 'E', 4, 'Petrolera'),
(264, 'F', 4, 'Petrolera'),
(265, 'A', 1, 'Quimica'),
(266, 'B', 1, 'Quimica'),
(267, 'C', 1, 'Quimica'),
(268, 'D', 1, 'Quimica'),
(269, 'E', 1, 'Quimica'),
(270, 'F', 1, 'Quimica'),
(271, 'A', 2, 'Quimica'),
(272, 'B', 2, 'Quimica'),
(273, 'C', 2, 'Quimica'),
(274, 'D', 2, 'Quimica'),
(275, 'E', 2, 'Quimica'),
(276, 'F', 2, 'Quimica'),
(277, 'A', 3, 'Quimica'),
(278, 'B', 3, 'Quimica'),
(279, 'C', 3, 'Quimica'),
(280, 'D', 3, 'Quimica'),
(281, 'E', 3, 'Quimica'),
(282, 'F', 3, 'Quimica'),
(283, 'A', 4, 'Quimica'),
(284, 'B', 4, 'Quimica'),
(285, 'C', 4, 'Quimica'),
(286, 'D', 4, 'Quimica'),
(287, 'E', 4, 'Quimica'),
(288, 'F', 4, 'Quimica'),
(289, 'A', 1, 'Sistemas Computacionales'),
(290, 'B', 1, 'Sistemas Computacionales'),
(291, 'C', 1, 'Sistemas Computacionales'),
(292, 'D', 1, 'Sistemas Computacionales'),
(293, 'E', 1, 'Sistemas Computacionales'),
(294, 'F', 1, 'Sistemas Computacionales'),
(295, 'A', 2, 'Sistemas Computacionales'),
(296, 'B', 2, 'Sistemas Computacionales'),
(297, 'C', 2, 'Sistemas Computacionales'),
(298, 'D', 2, 'Sistemas Computacionales'),
(299, 'E', 2, 'Sistemas Computacionales'),
(300, 'F', 2, 'Sistemas Computacionales'),
(301, 'A', 3, 'Sistemas Computacionales'),
(302, 'B', 3, 'Sistemas Computacionales'),
(303, 'C', 3, 'Sistemas Computacionales'),
(304, 'D', 3, 'Sistemas Computacionales'),
(305, 'E', 3, 'Sistemas Computacionales'),
(306, 'F', 3, 'Sistemas Computacionales'),
(307, 'A', 4, 'Sistemas Computacionales'),
(308, 'B', 4, 'Sistemas Computacionales'),
(309, 'C', 4, 'Sistemas Computacionales'),
(310, 'D', 4, 'Sistemas Computacionales'),
(312, 'E', 4, 'Sistemas Computacionales'),
(313, 'F', 4, 'Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `emisor`, `receptor`, `titulo`, `mensaje`, `fecha`) VALUES
(8, 76, 83, 'hola', 'hola', '2019-04-09 19:47:03'),
(9, 83, 82, 'ola', '', '2019-04-09 19:48:06'),
(10, 83, 84, 'hola bb', ':v', '2019-04-09 19:49:46'),
(11, 87, 83, '2pack', 'Hola wapo', '2019-04-09 19:51:00'),
(12, 87, 85, '2pack', 'Hola, prra', '2019-04-09 19:51:27'),
(13, 85, 87, 'Cosas de compas', 'kjdshfkjshkjfd', '2019-04-09 19:51:48'),
(14, 82, 78, 'HOLA :)', 'HOLAAA :)))', '2019-04-09 19:53:44'),
(15, 82, 88, 'HOLAA', 'HOLAAA:)', '2019-04-09 19:54:00'),
(16, 44, 73, 'MensajerÃ­a', 'Buen dÃ­a, por este medio puede mandarme mensaje a cerca de las dudas que tenga con la plataforma. De igual manera estarÃ© al pendiente de cÃ³mo se comporta el sistema. Â¡Saludos! ', '2019-04-09 20:15:25'),
(17, 73, 88, 'Saludos', 'Hola Lino, este mensaje es sÃ³lo para probar el funcionamiento de esta herramienta.\r\n\r\nSaludos', '2019-04-09 22:53:59'),
(18, 91, 93, 'Prueba de plataforma', 'Buenas tardes, favor de \"navegar\" en las opciones que como tutorados pueden utilizar en la plataforma. Cualquier observaciÃ³n me notican. Gracias', '2019-04-09 23:48:00'),
(19, 91, 92, 'Prueba de plataforma', '\"Prueba de plataforma\"\r\nBuenas tardes, favor de \"navegar\" en las opciones que como tutorados pueden utilizar en la...\r\n', '2019-04-09 23:49:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_trabajo`
--

CREATE TABLE `plan_trabajo` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_trabajo`
--

INSERT INTO `plan_trabajo` (`id`, `autor`, `archivo`, `fec_sub`, `estado`) VALUES
(1, 73, 'PLAN DE TRABAJO DEL TUTOR.pdf', '2019-04-09 23:13:44', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `parcial` int(5) NOT NULL,
  `autor` int(11) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `parcial`, `autor`, `archivo`, `fec_sub`, `estado`) VALUES
(1, 1, 73, 'REPORTE PARCIAL 1 4B.pdf', '2019-04-09 23:01:41', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_registro`
--

CREATE TABLE `solicitudes_registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `a_paterno` varchar(250) NOT NULL,
  `a_materno` varchar(250) NOT NULL,
  `fec_nac` date NOT NULL,
  `no_control` int(9) NOT NULL,
  `division` varchar(250) NOT NULL,
  `semestre` int(5) DEFAULT NULL,
  `grupo` varchar(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes_registro`
--

INSERT INTO `solicitudes_registro` (`id`, `nombre`, `a_paterno`, `a_materno`, `fec_nac`, `no_control`, `division`, `semestre`, `grupo`, `email`, `pass`, `tipo`) VALUES
(23, 'claudia ', 'melendez', 'valencia', '1973-12-15', 0, 'Informatica', 2, 'A', 'zofybenitez2110@gmail.com', '674d9b6015af069e3e8a6577efb348d25537b11f7dc310429d170e8d35a88e2ca74dbe6b823c8ae8e428d1f422244a642fd4623d12cdcf962c9143d08d8be0f7', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(250) NOT NULL,
  `no_control` varchar(20) NOT NULL,
  `grupo` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `fecha_registro`, `nombre`, `no_control`, `grupo`, `email`, `password`, `tipo`) VALUES
(44, '2019-02-20 15:19:47', 'admin', '0', 1, 'admin@email.com', '20admin19', 1),
(73, '2019-04-09 18:05:16', 'zofia  benitez alonso', '111', 308, 'sofybenitez@hotmail.com', 'dc8e834467f5185f97afea4b171f3566681836cf79cd9f67743368c876cd6b96a71505bedd670afdfae4ad1d6ac3186710a1160d1813875ada55a188a0a97c81', 2),
(74, '2019-04-09 19:39:09', 'kevin brian  peã±a potenciano', '17081284', 308, 'kevinbrianpena@gmail.com', '73cba74c46bfb8e5bfb6b4b53e1ebbadcccba18e3ece04af8f80bfccb94e42666bd1217a3ec4955d3c78c24dfb7dbea3d2933f3dacaccfd2cb892c1f10bad3d6', 3),
(75, '2019-04-09 19:39:19', 'brayan enrique camarillo rodriguez', '17080087', 308, 'bracaro666@gmail.com', 'e1d274aa83e0530c1d508b91253fd4b842c38adc7764f367014d8b2376c4989b8104ebc50c25edd9f55ca9a8fd49944ef143f878f1b7ceb8d791a70804c6269a', 3),
(76, '2019-04-09 19:39:27', 'manuel eduardo  perez cabra', '17080130', 308, 'manuelperezcabra@gmail.com', '5266d83c61670291ac75b295451cc679739887a55c2e8ca2e27f8002242f174ffa361035981cc23bd4e08622f0add9649c5c3c16dfc60c3e484c2d598cb6403e', 3),
(77, '2019-04-09 19:39:32', 'gonzalo alonso castro', '17080082', 308, 'gonzaloskill123@gmail.com', '059fd617d419977f99b2f1a8597036abded8392259bed08f3e1ecae01d2334b4176b6bb281e95c9678cf0a8423c33afb9a0904690f98de5e39ea0dbe138fb0ee', 3),
(78, '2019-04-09 19:39:43', 'elizeth regina lopez zamora', '17080120', 308, 'elilopezx3@hotmail.com', '6e2540a03de733f13a6756f932a0c894ad3a0ef4f37e1627726572b8d3b6e95faaf0092297d04e4a8d3c4c61dcdf69397a6fa118a659d0f9f37f43bc534dd2d0', 3),
(79, '2019-04-09 19:39:59', 'dulce maria morales ochoa', '17080126', 308, 'isic.dmoraleso@itesco.edu.mx', '8d4e819f57f7c67e0126fe7d309b35f6ff07e988b08075605742db812dde30685e027abb82df72daddb190636723f2ce5c4b85ba6dc065fc734215877a895c17', 3),
(80, '2019-04-09 19:40:03', 'carlos guillermo contreras uscanga', '17080093', 308, 'cielo.negro.02@gmail.com', '95d94e9a5636f32e63604e469d04099fc10e3c36f9325cfc9917bba03ebd0f5893666f3c7ecbd94acbdc23fc61a28e28e809140da7c1b59ea625e74962965ff7', 3),
(81, '2019-04-09 19:41:01', 'israel francisco martinez', '17080102', 308, 'isr.fran.faick@hotmail.com', '7c2fc3fd442abd2e09f47dcbe6d7e5663e12a7a2c22d62878d01ffb4117af66c4e8e105335a9a1854c60f671b9c207f703d8b23db1406a9d7c9502557a5de1d4', 3),
(82, '2019-04-09 19:41:05', 'alessandro lopez lopez', '17080118', 308, 'alesslopez99@gmail.com', '283f01eaf6037d0bc8d56cbd894b4292d97ca28149ff86e44729107b40cc5610ca7b7ee8b89ae55c4da73b38f21881b5751cb96e63a5148a0121397d21f20445', 3),
(83, '2019-04-09 19:41:09', 'adolfo rosemberg renteria pineda', '17080139', 308, 'blackwolfv23@gmail.com', 'e9e6f286fd5729c91f35bee84f1a2036e0560e09c075d6d4816bd57f550b1308a126a2e7ae746bc86a7b1bd943e923236d3e9c3c06b73eb2cb113bf9a67a3a47', 3),
(84, '2019-04-09 19:41:19', 'valeria coronel flores', '17081219', 308, 'valeriia.dani22@hotmail.com', '1546b630d5bd2975306400b02c8ff8d4077e9a562d54474e918b755c2ba7a219b44ce479a2c9715211d57c0b7fd1d95bcb8f5b3adbdff7d9d4194e84d3559520', 3),
(85, '2019-04-09 19:41:22', 'jesus alberto sandoval matias', '17080146', 308, 'jesus_inteligente9@hotmail.com', '5c49d22749fd1c30cb5bdbeb346ec6bebf21e0bc980a3642ce6a9024f055ca1d4bb329cb87a206552887ee8e88ab6cd79282e884bbd4beb3883b470c3024d48b', 3),
(86, '2019-04-09 19:41:26', 'maximino lopez  gonzalez ', '17080117', 308, 'nen_pepe@hotmail.com', '7cdc3dc043a5eee6390585fc89a2efb5cd6aaa107ea7faf15e62b37721a8447adb74dfac14639d942c79344cf8c0679a0b06a279de102daf336b9e7171c19f87', 3),
(87, '2019-04-09 19:41:29', 'francisco javier rodriguez gomez', '17080144', 308, 'isic.frodriguezg@itesco.edu.mx', '73ce4fb9b74fe0f8db79c433d89dfe0b0b98cce7e76594a629caaa2ab05e18d138341fcfb146443396fc84e91936ea8a782856ca65a5ae21b19203291c58564d', 3),
(88, '2019-04-09 19:41:33', 'lino perez romero', '17080132', 308, 'linoromero819@gmail.com', '33e087ef2a321becd35ad85775158d43fe6ef33510346d2317a590b6f84df23cb3649fe324b7fe257a24726a330b66997d2072f10a0194744dcc01601ae60bd1', 3),
(89, '2019-04-09 19:54:27', 'abigail damiana santiago  clemente', '17080147', 308, 'isic.asantiagoc@itesco.edu.mx', 'fd1eadae0e85fb6df588c395c33a729f9ec2604eb37caca402d2352a4edfefae0922701803ef44a80570d0562a7b128b8035e05a6b57f2a202090edd6081df34', 3),
(90, '2019-04-09 19:54:30', 'ãngel miguel hipolito ãlvarez', '17080111', 308, 'gelan117vip@gmail.com', 'e4660b6797aeec6f7f4d36088bc8f704b851b3d70fc4258fa738532860ea03e086e2e3fb5d10d09eeddca59ba861acfe9d845b92e8ffc39adaaad857e88ecda9', 3),
(91, '2019-04-09 23:36:16', 'norma hildelisa jiménez alor', '112', 31, 'njalor@hotmail.com', '9b3b4b6f7e805c53d6bd646fe7a054b0370e495760e623faf80479813407c7341f1e9cceac654e0bb26f273df78a141ac05d50dbc0513f1d53c0365e6bb0654f', 2),
(92, '2019-04-09 23:36:19', 'kenia itzel  hernandez sagrero', '18080150', 31, 'keniahdez2209@gmail.com', '66d9cba42ad6c3aae2ba719c895205c6c164c33789fc2d03c6f02ecf682f3e7ff6fdcf3a32eda131056ce9426a3dcd9a37615fb2756840183b0304ca4618d862', 3),
(93, '2019-04-09 23:36:23', 'osmar javier  gutiérrez alvarez ', '18080148', 31, 'osmargu.al999@gmail.com', 'fc6f97adba30af732d706d4e995202c2ea07b202187c8d3337f89f60d3dc0e97e25e8d7c9ed621dd2d3067d15cee47a2f0c8f9ce3040851ec5708fc412a9f5db', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `alumno` (`alumno`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `emisor` (`emisor`),
  ADD KEY `receptor` (`receptor`);

--
-- Indices de la tabla `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo` (`grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD CONSTRAINT `asesorias_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asesorias_ibfk_2` FOREIGN KEY (`alumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `foro` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  ADD CONSTRAINT `detalle_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  ADD CONSTRAINT `entrega_actividades_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrega_actividades_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`receptor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  ADD CONSTRAINT `plan_trabajo_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
