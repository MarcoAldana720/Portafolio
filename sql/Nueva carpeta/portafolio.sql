-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2025 a las 23:00:13
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
  `est_descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`est_id`, `est_descripcion`) VALUES
(1, 'Alta'),
(2, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `gale_id` int(11) NOT NULL,
  `gale_id_portafolio` int(11) DEFAULT NULL,
  `gale_titulo_img` text DEFAULT NULL,
  `gale_descripcion` text DEFAULT NULL,
  `gale_foto` varchar(255) DEFAULT NULL,
  `gale_fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `gale_fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`gale_id`, `gale_id_portafolio`, `gale_titulo_img`, `gale_descripcion`, `gale_foto`, `gale_fecha_creacion`, `gale_fecha_actualizacion`) VALUES
(1, 1, 'Inicio de sesión.', NULL, 'img/2025-04-07-08-41-51_Login.png', '2025-04-07 20:41:51', '2025-04-07 21:32:13'),
(2, 1, 'Ayuda para inicio de sesión.', NULL, 'img/2025-04-07-08-44-40_Login_1.png', '2025-04-07 20:44:40', '2025-04-07 21:32:18'),
(3, 1, 'Panel de control para administrador.', NULL, 'img/2025-04-07-08-45-36_Ad_5.PNG', '2025-04-07 20:45:36', '2025-04-07 21:32:25'),
(4, 1, 'Gestión de usuarios.', NULL, 'img/2025-04-07-08-48-34_Ad_1.PNG', '2025-04-07 20:48:34', '2025-04-07 21:32:35'),
(5, 1, 'Alta de usuario.', NULL, 'img/2025-04-07-08-50-47_Ad_2.PNG', '2025-04-07 20:50:47', '2025-04-07 21:32:43'),
(6, 1, 'Control de usuarios.', NULL, 'img/2025-04-07-08-52-21_Ad_3.PNG', '2025-04-07 20:52:21', '2025-04-07 20:52:21'),
(7, 1, 'Actualizar datos del usuario.', NULL, 'img/2025-04-07-08-53-18_Ad_4.PNG', '2025-04-07 20:53:18', '2025-04-07 20:53:18'),
(8, 1, 'Panel de control para docente.', NULL, 'img/2025-04-07-08-57-35_Us_01_1.png', '2025-04-07 20:57:35', '2025-04-07 20:57:35'),
(9, 1, 'Agregar y editar información del profesor.', NULL, 'img/2025-04-07-09-01-14_Us_01_2.png', '2025-04-07 21:01:14', '2025-04-07 21:01:14'),
(10, 1, 'Formación académica.', NULL, 'img/2025-04-07-09-02-33_Us_02.png', '2025-04-07 21:02:33', '2025-04-07 21:02:33'),
(11, 1, 'Agregar y editar estudios realizados.', NULL, 'img/2025-04-07-09-03-40_Us_02_1.png', '2025-04-07 21:03:40', '2025-04-07 21:03:40'),
(12, 1, 'Editar y eliminar estudio realizado.', NULL, 'img/2025-04-07-09-05-31_Us_02_2.png', '2025-04-07 21:05:31', '2025-04-07 21:05:31'),
(13, 1, 'Experiencia profesional.', NULL, 'img/2025-04-07-09-15-47_Us_03.png', '2025-04-07 21:15:47', '2025-04-07 21:15:47'),
(14, 1, 'Agregar y editar datos laborales.', NULL, 'img/2025-04-07-09-17-08_Us_03_1.png', '2025-04-07 21:17:08', '2025-04-07 21:17:08'),
(15, 1, 'Editar y eliminar datos laborales.', NULL, 'img/2025-04-07-09-17-51_Us_03_2.png', '2025-04-07 21:17:51', '2025-04-07 21:17:51'),
(16, 1, 'Proyectos de investigación.', NULL, 'img/2025-04-07-09-20-07_Us_04.png', '2025-04-07 21:20:07', '2025-04-07 21:20:07'),
(18, 1, 'Listado de líneas de generación.', NULL, 'img/2025-04-07-09-23-04_Us_04_1_1.png', '2025-04-07 21:23:04', '2025-04-07 21:27:03'),
(19, 1, 'Agregar linea de generación.', NULL, 'img/2025-04-07-09-24-34_Us_04_1_3.png', '2025-04-07 21:24:34', '2025-04-07 21:26:41'),
(20, 1, 'Asociar linea de generación.', NULL, 'img/2025-04-07-09-25-18_Us_04_1_2.png', '2025-04-07 21:25:18', '2025-04-07 21:26:30'),
(21, 1, 'Editar y eliminar linea de generación.', NULL, 'img/2025-04-07-09-29-37_Us_04_1.png', '2025-04-07 21:29:38', '2025-04-07 21:29:38'),
(22, 2, 'Vista Desktop', NULL, 'img/2025-04-11-08-55-32_Desktop.png', '2025-04-11 20:55:32', '2025-04-11 20:55:32'),
(23, 2, 'Vista Tablet', NULL, 'img/2025-04-11-08-55-48_Tablet.png', '2025-04-11 20:55:48', '2025-04-11 20:56:54'),
(24, 2, 'Vista Móvil', NULL, 'img/2025-04-11-08-56-03_Movil.png', '2025-04-11 20:56:03', '2025-04-11 20:57:09'),
(25, 1, 'Producción académica.', NULL, 'img/2025-04-14-12-06-49_Us_05.png', '2025-04-14 00:06:49', '2025-04-14 00:07:13'),
(26, 1, 'Agregar producción académica (Artículos).', NULL, 'img/2025-04-14-12-08-00_Us_05_1.png', '2025-04-14 00:08:00', '2025-04-14 00:10:00'),
(27, 1, 'Agregar producción académica (Libros).', NULL, 'img/2025-04-14-12-09-33_Us_05_2.png', '2025-04-14 00:09:33', '2025-04-14 00:09:33'),
(28, 1, 'Editar y eliminar producción académica.', NULL, 'img/2025-04-14-12-10-59_Us_05_3.png', '2025-04-14 00:10:59', '2025-04-14 00:10:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `port_id` int(11) NOT NULL,
  `port_titulo` text DEFAULT NULL,
  `port_resumen` text DEFAULT NULL,
  `port_descripcion` text DEFAULT NULL,
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

INSERT INTO `portafolio` (`port_id`, `port_titulo`, `port_resumen`, `port_descripcion`, `port_foto`, `port_link`, `port_id_tipo`, `port_id_estado`, `port_id_usuario`, `port_fecha_creacion`, `port_fecha_actualizacion`) VALUES
(1, 'PROMESA', 'Plataforma web para mejorar el perfil acádemico.', 'Es una plataforma web donde va a permitir mejora el pefil acádemico de los docentes y es responsiva para cualquier dispositivo (Desktop, Tablet y Móvil).', 'img/2025-04-07-20-42-18_Login.png', '', 2, 1, 1, '2025-04-07 15:22:26', '2025-04-07 20:42:18'),
(2, 'VISAGE', 'Plataforma web para una Clínica de Cirugía Plástica.', 'Es una plataforma web que está diseñada para ofrecer información y servicios especializados en Clínica de Cirugía Plástica y es responsiva para cualquier dispositivo (Desktop, Tablet y Móvil).', 'img/2025-04-11-07-51-17_Desktop.png', 'https://marcoaldana720.github.io/Plastic-Surgery-Clinic/', 2, 1, 1, '2025-04-11 19:51:17', '2025-04-11 20:59:27'),
(3, 'VISAGE', 'Plataforma web sobre una Clínica de Cirugía Plástica.', 'Es una plataforma web que está diseñada para ofrecer información y servicios especializados en cirugía plástica.', 'img/2025-04-11-07-51-45_Desktop.png', 'https://marcoaldana720.github.io/Plastic-Surgery-Clinic/', 2, 2, 1, '2025-04-11 19:51:45', '2025-04-11 19:52:25');

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
(26, 1, 1),
(27, 1, 2),
(28, 1, 5),
(29, 1, 16),
(46, 2, 1),
(47, 2, 2),
(48, 2, 3),
(34, 3, 1),
(35, 3, 2),
(36, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` text DEFAULT NULL
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
  `tec_descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologias`
--

INSERT INTO `tecnologias` (`tec_id`, `tec_descripcion`) VALUES
(1, 'HTML5'),
(2, 'CSS3'),
(3, 'JavaScript'),
(4, 'PHP8'),
(5, 'React.js'),
(6, 'Vue.js'),
(7, 'Node.js'),
(8, 'Express.js'),
(9, 'Python'),
(10, 'Django'),
(11, 'PostgreSQL'),
(12, 'MySQL'),
(13, 'MongoDB'),
(14, 'Docker'),
(15, 'AWS'),
(16, 'Next.js');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_portafolio`
--

CREATE TABLE `tipo_portafolio` (
  `tp_id` int(11) NOT NULL,
  `tp_descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_portafolio`
--

INSERT INTO `tipo_portafolio` (`tp_id`, `tp_descripcion`) VALUES
(1, 'Logos'),
(2, 'Páginas web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_nombre` text DEFAULT NULL,
  `us_usuario` text DEFAULT NULL,
  `us_contrasena` varchar(255) DEFAULT NULL,
  `us_id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nombre`, `us_usuario`, `us_contrasena`, `us_id_rol`) VALUES
(1, 'Marco Antonio', 'Marco', '$2y$10$UeYPyUUyvWwAsG9hK1ddn.vW1dxJgxjdcMg2/SEfe07eVPXZaianm', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`gale_id`),
  ADD KEY `gale_id_portafolio` (`gale_id_portafolio`);

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
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `gale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `portafolio_tecnologias`
--
ALTER TABLE `portafolio_tecnologias`
  MODIFY `portec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`gale_id_portafolio`) REFERENCES `portafolio` (`port_id`);

--
-- Filtros para la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD CONSTRAINT `portafolio_ibfk_1` FOREIGN KEY (`port_id_tipo`) REFERENCES `tipo_portafolio` (`tp_id`),
  ADD CONSTRAINT `portafolio_ibfk_2` FOREIGN KEY (`port_id_usuario`) REFERENCES `usuarios` (`us_id`),
  ADD CONSTRAINT `portafolio_ibfk_3` FOREIGN KEY (`port_id_estado`) REFERENCES `estados` (`est_id`);

--
-- Filtros para la tabla `portafolio_tecnologias`
--
ALTER TABLE `portafolio_tecnologias`
  ADD CONSTRAINT `portafolio_tecnologias_ibfk_1` FOREIGN KEY (`portec_id_portafolio`) REFERENCES `portafolio` (`port_id`),
  ADD CONSTRAINT `portafolio_tecnologias_ibfk_2` FOREIGN KEY (`portec_id_tecnologia`) REFERENCES `tecnologias` (`tec_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`us_id_rol`) REFERENCES `roles` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
