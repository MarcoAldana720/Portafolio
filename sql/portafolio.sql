-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2026 a las 17:01:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portafolio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `est_id` int(11) NOT NULL,
  `est_descripcion` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`est_id`, `est_descripcion`) VALUES
(1, 'Alta'),
(2, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `port_id` int(11) NOT NULL,
  `port_titulo` mediumtext DEFAULT NULL,
  `port_descripcion` mediumtext DEFAULT NULL,
  `port_foto` varchar(255) DEFAULT NULL,
  `port_link` varchar(255) DEFAULT NULL,
  `port_id_tipo` int(11) DEFAULT NULL,
  `port_id_estado` int(11) DEFAULT NULL,
  `port_id_usuario` int(11) DEFAULT NULL,
  `port_fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `port_fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`port_id`, `port_titulo`, `port_descripcion`, `port_foto`, `port_link`, `port_id_tipo`, `port_id_estado`, `port_id_usuario`, `port_fecha_creacion`, `port_fecha_actualizacion`) VALUES
(1, 'PROMESA', 'Plataforma web para mejorar el perfil acádemico.', 'img/2025-04-24-14-56-41_Login.png', '', 2, 1, 1, '2025-04-23 20:10:13', '2025-05-19 18:35:01'),
(2, 'Diseño De Logo \"Arrow Digital\"', 'Creación de marca para Arrow Digital.', 'img/2025-04-23-08-12-02_Arrow Digital.jpg', '', 1, 1, 1, '2025-04-23 20:12:03', '2025-05-19 18:49:48'),
(3, 'Diseño De Logo \"Financial\"', 'Creación de marca para Financial.', 'img/2025-04-24-02-54-00_Financial.jpg', '', 1, 1, 1, '2025-04-24 14:54:00', '2025-05-19 18:46:35'),
(4, 'Diseño De Logo \"Madrid\"', 'Creación de marca para Madrid.', 'img/2025-04-24-02-54-34_Madrid.jpg', '', 1, 1, 1, '2025-04-24 14:54:34', '2025-05-19 18:47:00'),
(5, 'Diseño De Logo \"Solven\"', 'Creación de marca para Solven.', 'img/2025-04-24-02-54-57_Solven.jpg', '', 1, 1, 1, '2025-04-24 14:54:57', '2025-05-19 18:48:29'),
(6, 'Diseño De Logo \"Tesla\"', 'Creación de marca para Tesla.', 'img/2025-04-24-14-56-06_Tesla.jpg', '', 1, 1, 1, '2025-04-24 14:55:09', '2025-05-19 20:31:27'),
(7, 'VISAGE', 'Plataforma web para una Clínica de Cirugí­a Plástica.', 'img/2025-04-24-03-29-45_Clinica_Desktop.png', 'https://marcoaldana720.github.io/Plastic-Surgery-Clinic/', 2, 1, 1, '2025-04-24 14:58:53', '2025-05-19 20:36:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio_tecnologias`
--

CREATE TABLE `portafolio_tecnologias` (
  `portec_id` int(11) NOT NULL,
  `portec_id_portafolio` int(11) DEFAULT NULL,
  `portec_id_tecnologia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolio_tecnologias`
--

INSERT INTO `portafolio_tecnologias` (`portec_id`, `portec_id_portafolio`, `portec_id_tecnologia`) VALUES
(16, 1, 1),
(17, 1, 2),
(18, 1, 5),
(19, 7, 1),
(20, 7, 2),
(21, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologias`
--

CREATE TABLE `tecnologias` (
  `tec_id` int(11) NOT NULL,
  `tec_descripcion` text DEFAULT NULL,
  `tec_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologias`
--

INSERT INTO `tecnologias` (`tec_id`, `tec_descripcion`, `tec_icon`) VALUES
(1, 'HTML5', 'fa-brands fa-html5'),
(2, 'CSS3', 'fa-brands fa-css3-alt'),
(3, 'JavaScript', 'fa-brands fa-js'),
(4, 'PHP8', 'fa-brands fa-php'),
(5, 'React.js', 'fa-brands fa-react'),
(6, 'Vue.js', 'fa-brands fa-vuejs'),
(7, 'Node.js', 'fa-brands fa-node'),
(8, 'Express.js', 'fa-brands fa-node-js'),
(9, 'Python', 'fa-brands fa-python'),
(10, 'Django', ''),
(11, 'PostgreSQL', ''),
(12, 'MySQL', 'fa-solid fa-database'),
(13, 'MongoDB', ''),
(14, 'Docker', 'fa-brands fa-docker'),
(15, 'AWS', 'fa-brands fa-aws'),
(16, 'Next.js', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_portafolio`
--

CREATE TABLE `tipo_portafolio` (
  `tp_id` int(11) NOT NULL,
  `tp_descripcion` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_portafolio`
--

INSERT INTO `tipo_portafolio` (`tp_id`, `tp_descripcion`) VALUES
(1, 'Logos'),
(2, 'Paginas web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_nombre` mediumtext DEFAULT NULL,
  `us_usuario` mediumtext DEFAULT NULL,
  `us_contrasena` varchar(255) DEFAULT NULL,
  `us_id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nombre`, `us_usuario`, `us_contrasena`, `us_id_rol`) VALUES
(1, 'Marco Antonio', 'Marco', '$2y$10$ac4n.kRfwJzDnQxzq5Wl7.3r.aaSWw.FemXXTX/wdrD9ozZaX3zmO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`port_id`),
  ADD KEY `port_id_tipo` (`port_id_tipo`),
  ADD KEY `port_id_usuario` (`port_id_usuario`),
  ADD KEY `port_id_estado` (`port_id_estado`);

--
-- Indices de la tabla `portafolio_tecnologias`
--
ALTER TABLE `portafolio_tecnologias`
  ADD PRIMARY KEY (`portec_id`),
  ADD UNIQUE KEY `portec_id_portafolio` (`portec_id_portafolio`,`portec_id_tecnologia`),
  ADD KEY `portec_id_tecnologia` (`portec_id_tecnologia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tecnologias`
--
ALTER TABLE `tecnologias`
  ADD PRIMARY KEY (`tec_id`);

--
-- Indices de la tabla `tipo_portafolio`
--
ALTER TABLE `tipo_portafolio`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `us_id_rol` (`us_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `portafolio_tecnologias`
--
ALTER TABLE `portafolio_tecnologias`
  MODIFY `portec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tecnologias`
--
ALTER TABLE `tecnologias`
  MODIFY `tec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_portafolio`
--
ALTER TABLE `tipo_portafolio`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
