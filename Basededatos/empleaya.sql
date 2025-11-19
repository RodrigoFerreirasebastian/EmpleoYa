-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 07:24:08
-- Versión del servidor: 9.4.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratar_personal`
--

CREATE TABLE `contratar_personal` (
  `id_contrato` int NOT NULL,
  `id_empresa` int DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `tipo_trabajo` varchar(50) DEFAULT NULL,
  `email_contacto` varchar(100) DEFAULT NULL,
  `tel_contacto` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `estado` enum('Pendiente','Preparado','Entregado') DEFAULT 'Pendiente',
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contratar_personal`
--

INSERT INTO `contratar_personal` (`id_contrato`, `id_empresa`, `titulo`, `salario`, `tipo_trabajo`, `email_contacto`, `tel_contacto`, `descripcion`, `estado`, `nombre`) VALUES
(2, NULL, 'ejemplo personas', 25000.00, 'limpieza patio', 'rodrigoferreirautu@gmail.com', NULL, 'prueba', 'Pendiente', NULL),
(3, NULL, 'ejemplo 2', 25000.00, 'empleado carniceria', 'rodrigoferreirautu@gmail.com', NULL, 'prueba 2\\r\\n', 'Pendiente', NULL),
(4, NULL, 'ejemplo 3', 25000.00, 'empleado panaderia', 'rodrigoferreirautu@gmail.com', NULL, 'prueba 3\\r\\n', 'Pendiente', NULL),
(5, NULL, 'Se busca cortador de pasto ', 4500.00, 'Corta pasto', 'rodrigoferreirautu@gmail.com', NULL, 'Se busca persona que corte pasto en el fondo de casa', 'Pendiente', 'rodrigo ferreira'),
(6, NULL, 'pop', 99999.00, 'afkagaeg', 'asd@gmail.com', NULL, 'sla;sgkpoga', 'Pendiente', 'Jhon gonzalez'),
(8, NULL, 'pop', 99999.00, 'afkagaeg', 'asd@gmail.com', NULL, 'sla;sgkpoga', 'Pendiente', 'Jhon gonzalez'),
(9, NULL, 'pop', 99999.00, 'afkagaeg', 'asd@gmail.com', NULL, 'sla;sgkpoga', 'Pendiente', 'Jhon gonzalez'),
(10, NULL, 'pop', 99999.00, 'afkagaeg', 'asd@gmail.com', NULL, 'sla;sgkpoga', 'Pendiente', 'Jhon gonzalez'),
(11, NULL, 'gw;gwg', 20400.00, 'repartidor', 'asd@gmail.com', NULL, 'asgagag', 'Pendiente', 'Jhon gonzalez'),
(12, NULL, 'ejemplo 89', 1040195.00, 'jardinero', 'goat@gmial.com', NULL, 'asakghgjag', 'Pendiente', 'pepe rodriguez'),
(13, NULL, 'Busco peon para changa', 6500.00, 'Albañil', 'rodrigoferreirautu@gmail.com', NULL, 'prueba ', 'Pendiente', 'Juan Darias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv`
--

CREATE TABLE `cv` (
  `id_cv` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `edad` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `resumen` text,
  `experiencia` text,
  `educacion` text,
  `habilidades` text,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cv`
--

INSERT INTO `cv` (`id_cv`, `nombre`, `cedula`, `edad`, `email`, `telefono`, `localidad`, `id_usuario`, `titulo`, `resumen`, `experiencia`, `educacion`, `habilidades`, `fecha_creacion`) VALUES
(1, 'rodrigo', '56888939', 18, 'rodrigoferreirautu@gmail.com', '092279567', 'treinta y tres', NULL, NULL, NULL, 'ninguna', '', NULL, '2025-10-14 03:58:28'),
(3, 'Jhon gonzalez', '56888939', 25, 'rodrigoferreirautu@gmail.com', '092279567', 'treinta y tres', NULL, NULL, NULL, 'no tengo', '', NULL, '2025-11-18 22:53:09'),
(4, 'pepe rodriguez', '54578919', 18, 'holaquetal@gmail.com', '092279567', 'treinta y tres', NULL, NULL, NULL, 'no tengo soy vago', '', NULL, '2025-11-19 03:20:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `rut` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `rut`, `email`, `telefono`, `localidad`, `descripcion`) VALUES
(1, 'Arrosur', NULL, NULL, NULL, NULL, NULL),
(2, 'Montes del Plata', NULL, NULL, NULL, NULL, NULL),
(15, 'Intendencia', NULL, NULL, NULL, NULL, NULL),
(16, 'ConstruccionVeraz', NULL, NULL, NULL, NULL, NULL),
(17, 'ManPowerGroup', NULL, NULL, NULL, NULL, NULL),
(554626, 'Tata', NULL, NULL, NULL, NULL, NULL),
(554627, 'TurEste', NULL, NULL, NULL, NULL, NULL),
(554629, 'rodrigo ferreira barreto ', NULL, NULL, NULL, NULL, NULL),
(554630, 'Dorado', NULL, NULL, NULL, NULL, NULL),
(554631, 'CrazyHouse', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacione_persona`
--

CREATE TABLE `evaluacione_persona` (
  `id_evaluacion` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `calificacion` int NOT NULL,
  `comentario` text,
  `fecha_evaluacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_contrato` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evaluacione_persona`
--

INSERT INTO `evaluacione_persona` (`id_evaluacion`, `id_usuario`, `calificacion`, `comentario`, `fecha_evaluacion`, `id_contrato`) VALUES
(5, NULL, 5, 'un capo', '2025-11-19 05:16:26', 5),
(6, NULL, 5, 'un genio', '2025-11-19 05:16:38', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_empresa`
--

CREATE TABLE `evaluacion_empresa` (
  `id_evaluacion` int NOT NULL,
  `id_empresa` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `comentario` text,
  `calificacion` int DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Volcado de datos para la tabla `evaluacion_empresa`
--

INSERT INTO `evaluacion_empresa` (`id_evaluacion`, `id_empresa`, `id_usuario`, `comentario`, `calificacion`, `fecha`) VALUES
(1, 1, NULL, 'muy buena', 4, '2025-10-14 03:46:18'),
(2, 1, NULL, 'muy buena', 4, '2025-10-14 03:46:31'),
(3, 1, NULL, 'muy buena', 4, '2025-10-14 03:48:23'),
(4, 1, NULL, 'no me pago', 5, '2025-10-15 20:02:41'),
(5, 554627, NULL, 'muy buena', 5, '2025-11-19 01:16:11'),
(6, 554627, NULL, 'muy buena', 5, '2025-11-19 01:17:43'),
(7, 554627, NULL, 'muy buena', 5, '2025-11-19 01:18:09'),
(8, 554627, NULL, 'muy buena', 5, '2025-11-19 01:18:23'),
(9, 554627, NULL, 'muy buena empresa', 5, '2025-11-19 01:21:00'),
(10, 554627, NULL, 'mala experiencia', 2, '2025-11-19 01:51:44'),
(11, 554626, NULL, 'muy bueno', 4, '2025-11-19 02:04:09'),
(12, 554629, NULL, 'un genio', 5, '2025-11-19 03:20:21'),
(13, 15, NULL, 'media hora para hacer un tramite', 1, '2025-11-19 03:20:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` int NOT NULL,
  `id_empresa` int DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `tipo_trabajo` varchar(50) DEFAULT NULL,
  `email_contacto` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `id_empresa`, `titulo`, `salario`, `tipo_trabajo`, `email_contacto`, `descripcion`, `nombre`) VALUES
(14, 1, 'ejemplo', 25000.00, 'cajero', 'rodrigoferreirautu@gmail.com', 'prueba', 'Arrosur'),
(22, 16, 'ejemplo 2', 35000.00, 'Albañil', 'rodrigoferreirautu@gmail.com', 'prueba2', 'ConstruccionVeraz'),
(23, 17, 'ejemplo 3', 65000.00, 'Modelador 3d', 'rodrigoferreirautu@gmail.com', 'prueba 3', 'ManPowerGroup'),
(24, 2, 'ejemplo 4', 12000.00, 'Forestacion', 'rodrigoferreirautu@gmail.com', 'prueba 4', 'Montes del Plata'),
(25, 15, 'ejemplo 5', 20000.00, 'Chofer', 'rodrigoferreirautu@gmail.com', 'prueba 5', 'Intendencia'),
(26, 554626, 'Ejemplo 6', 1200.00, 'Atencion al cliente', 'rodrigoferreirautu@gmail.com', 'Cajero', 'Tata'),
(32, NULL, 'Se busca chofer capacitado ', 60000.00, 'Chofer', 'rodrigoferreirautu@gmail.com', 'se pide tener licencia de conducir al dia y un minimo de 3 años de experiencia previa en el rubro', 'TurEste'),
(33, NULL, 'ejemplo', 250000.00, 'cajero', 'goat@gmial.com', 'hola', 'rodrigo ferreira barreto '),
(34, NULL, 'ejemplo 6', 20000.00, 'aksfka', 'goat@gmial.com', 'hola', 'rodrigo ferreira barreto '),
(35, NULL, 'hola', 20000.00, 'cajero', 'asd@gmail.com', 'aagiwhg', 'Dorado'),
(36, NULL, 'Busca de trabajadores', 25000.00, 'Atencion al cliente', 'rodrigoferreirautu@gmail.com', 'prueba', 'CrazyHouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `id_postulacion` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_contrato` int DEFAULT NULL,
  `fecha_postulacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('En revisión','Aceptado','Rechazado') DEFAULT 'En revisión',
  `mensaje` text,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `id_empresa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `postulacion`
--

INSERT INTO `postulacion` (`id_postulacion`, `id_usuario`, `id_contrato`, `fecha_postulacion`, `estado`, `mensaje`, `nombre`, `email`, `telefono`, `cv`, `id_empresa`) VALUES
(1, NULL, 4, '2025-11-15 14:23:02', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763227382_prueba final filosofia rodrigo ferreira.pdf', NULL),
(2, NULL, 4, '2025-11-15 14:25:04', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763227504_prueba final filosofia rodrigo ferreira.pdf', NULL),
(3, NULL, 4, '2025-11-15 14:26:25', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763227585_prueba final filosofia rodrigo ferreira.pdf', NULL),
(4, NULL, 4, '2025-11-15 14:27:02', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763227622_prueba final filosofia rodrigo ferreira.pdf', NULL),
(5, NULL, 4, '2025-11-15 19:11:58', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763244718_prueba final filosofia rodrigo ferreira.pdf', NULL),
(6, NULL, 4, '2025-11-15 20:14:03', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763248443_prueba final filosofia rodrigo ferreira.pdf', NULL),
(7, NULL, 2, '2025-11-15 23:52:08', 'En revisión', NULL, 'rodrigo', 'rodrigoferreirautu@gmail.com', '092279567', '1763261528_prueba final filosofia rodrigo ferreira.pdf', NULL),
(8, NULL, 5, '2025-11-16 01:22:06', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '092279567', '1763266926_prueba final filosofia rodrigo ferreira.pdf', NULL),
(9, NULL, NULL, '2025-11-16 01:32:32', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'fraame23@gmail.com', '092279567', '1763267552_prueba final filosofia rodrigo ferreira.pdf', 32),
(12, NULL, NULL, '2025-11-16 01:38:16', 'En revisión', NULL, 'pepe rodriguez', 'holaquetal@gmail.com', '092279567', '1763267896_prueba final filosofia rodrigo ferreira.pdf', 32),
(13, NULL, 5, '2025-11-17 17:42:22', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'bastitulon1@gmail.com', '092279567', '1763412142_prueba final filosofia rodrigo ferreira.pdf', NULL),
(14, NULL, 2, '2025-11-18 21:04:14', 'En revisión', NULL, 'Jhon gonzalez', 'holaquetal@gmail.com', '123456789', NULL, NULL),
(15, NULL, 2, '2025-11-18 21:06:31', 'En revisión', NULL, 'Jhon gonzalez', 'holaquetal@gmail.com', '123456789', NULL, NULL),
(16, NULL, 2, '2025-11-18 21:07:24', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'holaquetal@gmail.com', '092279567', NULL, NULL),
(17, NULL, 2, '2025-11-18 21:12:15', 'En revisión', NULL, 'ajsdhlakshd ahjdsad asd', 'asdads@gmail.com', '098889887', NULL, NULL),
(18, NULL, 2, '2025-11-18 21:13:40', 'En revisión', NULL, 'ajsdhlakshd ahjdsad asd', 'asdads@gmail.com', '098889887', NULL, NULL),
(19, NULL, 11, '2025-11-18 22:18:49', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '09252962', NULL, NULL),
(20, NULL, 6, '2025-11-18 22:19:19', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'fraame23@gmail.com', '09252962', NULL, NULL),
(21, NULL, NULL, '2025-11-18 22:47:05', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'fraame23@gmail.com', '09252962', '1763516825_prueba final filosofia rodrigo ferreira.pdf', 34),
(22, NULL, NULL, '2025-11-18 22:48:21', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '09252962', '1763516901_prueba final filosofia rodrigo ferreira.pdf', 34),
(23, NULL, 2, '2025-11-18 22:48:44', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'holaquetal@gmail.com', '09252962', NULL, NULL),
(24, NULL, 2, '2025-11-18 22:50:11', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'holaquetal@gmail.com', '09252962', NULL, NULL),
(25, NULL, NULL, '2025-11-19 00:51:32', 'En revisión', NULL, 'rodrigo', 'fraame23@gmail.com', '09252962', '1763524292_prueba final filosofia rodrigo ferreira.pdf', 35),
(26, NULL, NULL, '2025-11-19 02:17:10', 'En revisión', NULL, 'rodrigo', 'holaquetal@gmail.com', '09252962', '1763529430_prueba final filosofia rodrigo ferreira.pdf', 35),
(27, NULL, 2, '2025-11-19 02:17:30', 'En revisión', NULL, 'rodrigo', 'claudiabarreto333@hotmail.com', '09252962', NULL, NULL),
(28, NULL, 2, '2025-11-19 03:18:13', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'rodrigoferreirautu@gmail.com', '09252962', NULL, NULL),
(29, NULL, NULL, '2025-11-19 03:18:32', 'En revisión', NULL, 'rodrigo ferreira barreto ', 'fraame23@gmail.com', '09252962', '1763533112_prueba final filosofia rodrigo ferreira.pdf', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `sexo` enum('M','F','Otro') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `localidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contratar_personal`
--
ALTER TABLE `contratar_personal`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_cv`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `nombre_2` (`nombre`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `evaluacione_persona`
--
ALTER TABLE `evaluacione_persona`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_contrato` (`id_contrato`);

--
-- Indices de la tabla `evaluacion_empresa`
--
ALTER TABLE `evaluacion_empresa`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `fk_oferta_empresa_nombre` (`nombre`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`id_postulacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_contrato` (`id_contrato`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contratar_personal`
--
ALTER TABLE `contratar_personal`
  MODIFY `id_contrato` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cv`
--
ALTER TABLE `cv`
  MODIFY `id_cv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554632;

--
-- AUTO_INCREMENT de la tabla `evaluacione_persona`
--
ALTER TABLE `evaluacione_persona`
  MODIFY `id_evaluacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `evaluacion_empresa`
--
ALTER TABLE `evaluacion_empresa`
  MODIFY `id_evaluacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  MODIFY `id_postulacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratar_personal`
--
ALTER TABLE `contratar_personal`
  ADD CONSTRAINT `contratar_personal_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evaluacione_persona`
--
ALTER TABLE `evaluacione_persona`
  ADD CONSTRAINT `evaluacione_persona_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contratar_personal` (`id_contrato`);

--
-- Filtros para la tabla `evaluacion_empresa`
--
ALTER TABLE `evaluacion_empresa`
  ADD CONSTRAINT `evaluacion_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `evaluacion_empresa_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_oferta_empresa_nombre` FOREIGN KEY (`nombre`) REFERENCES `empresa` (`nombre`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `postulacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `postulacion_ibfk_2` FOREIGN KEY (`id_contrato`) REFERENCES `contratar_personal` (`id_contrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
