-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 10, 2019 at 12:00 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PITA`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
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
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `titulo`, `descripcion`, `archivo`, `id_grupo`, `fecha_pub`, `fecha_entrega`, `activo`) VALUES
(1, 'Análisis FODA', 'Crear un análisis foda sobre ustedes', '', 194, '2019-03-14 04:15:15', '2019-03-14 06:00:00', 1),
(2, 'Actualización de datos', 'actualicen sus datos, moderfukas', '', 194, '2019-03-14 04:19:45', '2019-03-16 06:00:00', 1),
(3, 'Mapa mental', 'hagan un mapa d su mente por que YOLO', '', 194, '2019-03-14 04:21:53', '2019-03-15 06:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asesorias`
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

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fec_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_usuarios`
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
  `no_control` int(10) NOT NULL,
  `carrera` varchar(150) NOT NULL,
  `semestre` int(11) NOT NULL,
  `grupo` varchar(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `edit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_usuarios`
--

INSERT INTO `detalle_usuarios` (`id`, `id_usuario`, `nombre`, `a_paterno`, `a_materno`, `fec_nac`, `direccion`, `num_tel`, `no_control`, `carrera`, `semestre`, `grupo`, `email`, `edit`) VALUES
(1, 63, 'felipe', 'perez', 'perez', '1965-07-21', NULL, NULL, 65, 'Sistemas Computacionales', 3, 'A', 'felipe@email.com', 1),
(2, 64, 'edwin ociel', 'rosas', 'carrasco', '1994-11-01', 'Francisco Sarabia #80 Col. Insurgentes Norte, Minatitlán', '9221275462', 13081060, 'Sistemas Computacionales', 3, 'A', 'edwin_roca@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `entrega_actividades`
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
-- Table structure for table `formatos`
--

CREATE TABLE `formatos` (
  `id` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foro`
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

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `grupo` varchar(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupo`
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
-- Table structure for table `mensajes`
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
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `emisor`, `receptor`, `titulo`, `mensaje`, `fecha`) VALUES
(1, 64, 63, 'Mensaje de prueba', 'adadadasdasdas', '2019-03-13 17:51:56'),
(2, 44, 63, 'oli', 'adasdasdasdasdasdasd', '2019-03-14 04:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `plan_trabajo`
--

CREATE TABLE `plan_trabajo` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `parcial` int(5) NOT NULL,
  `autor` int(11) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fec_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes_registro`
--

CREATE TABLE `solicitudes_registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `a_paterno` varchar(250) NOT NULL,
  `a_materno` varchar(250) NOT NULL,
  `fec_nac` date NOT NULL,
  `no_control` varchar(20) NOT NULL,
  `division` varchar(250) NOT NULL,
  `semestre` int(5) DEFAULT NULL,
  `grupo` varchar(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solicitudes_registro`
--

INSERT INTO `solicitudes_registro` (`id`, `nombre`, `a_paterno`, `a_materno`, `fec_nac`, `no_control`, `division`, `semestre`, `grupo`, `email`, `pass`, `tipo`) VALUES
(4, 'eber felipe', 'rosas', 'carrasco', '1999-07-31', '15081060', 'Bioquimica', 1, 'A', 'eber117@email.com', '4671a2bd825bc852770d93a791ec494921a59eed90dadd6317570183a3bc6cf3bcb0babfddacaa7fcac17579f262a893e1ab6f16aa0a0e140ce1358fe1c29ee2', 3),
(5, 'rosa aurelia', 'carrasco', 'girón', '1966-08-21', '87', 'Bioquimica', 1, 'A', 'Rosa@email.com', '4671a2bd825bc852770d93a791ec494921a59eed90dadd6317570183a3bc6cf3bcb0babfddacaa7fcac17579f262a893e1ab6f16aa0a0e140ce1358fe1c29ee2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `fecha_registro`, `nombre`, `no_control`, `grupo`, `email`, `password`, `tipo`) VALUES
(44, '2019-02-20 15:19:47', 'admin', '0', 1, 'admin@email.com', '20admin19', 1),
(63, '2019-03-13 04:00:03', 'felipe perez perez', '65', 194, 'felipe@email.com', '4671a2bd825bc852770d93a791ec494921a59eed90dadd6317570183a3bc6cf3bcb0babfddacaa7fcac17579f262a893e1ab6f16aa0a0e140ce1358fe1c29ee2', 2),
(64, '2019-03-13 17:51:23', 'edwin ociel rosas carrasco', '13081060', 194, 'edwin_roca@hotmail.com', '579f038916415d226704b1e7c4e76b59aeb2489cadb769ec9335f5da1f04afe4228667ea70be21c6f43a389b01a5886a350ae8bb9062c27267b0db2e0c535e17', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indexes for table `asesorias`
--
ALTER TABLE `asesorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `alumno` (`alumno`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indexes for table `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `emisor` (`emisor`),
  ADD KEY `receptor` (`receptor`);

--
-- Indexes for table `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indexes for table `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo` (`grupo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asesorias`
--
ALTER TABLE `asesorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formatos`
--
ALTER TABLE `formatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foro`
--
ALTER TABLE `foro`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

--
-- Constraints for table `asesorias`
--
ALTER TABLE `asesorias`
  ADD CONSTRAINT `asesorias_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asesorias_ibfk_2` FOREIGN KEY (`alumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `foro` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detalle_usuarios`
--
ALTER TABLE `detalle_usuarios`
  ADD CONSTRAINT `detalle_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `entrega_actividades`
--
ALTER TABLE `entrega_actividades`
  ADD CONSTRAINT `entrega_actividades_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrega_actividades_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`receptor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
  ADD CONSTRAINT `plan_trabajo_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;