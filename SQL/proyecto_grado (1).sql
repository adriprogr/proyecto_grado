-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2025 a las 15:26:28
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
-- Base de datos: `proyecto_grado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

create database proyecto_grado;
use proyecto_grado;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'corazon'),
(2, 'informativos'),
(3, 'delicias'),
(4, 'gaming'),
(5, 'élite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentarios` int(11) NOT NULL,
  `titular` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_1` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `contenido_1` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo_2` varchar(150) NOT NULL,
  `contenido_2` varchar(255) NOT NULL,
  `contenido_3` varchar(255) NOT NULL,
  `imagen_2` varchar(255) NOT NULL,
  `titulo_3` varchar(150) NOT NULL,
  `contenido_4` varchar(255) NOT NULL,
  `contenido_5` varchar(255) NOT NULL,
  `id_titular` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_1`, `fecha`, `contenido_1`, `imagen`, `titulo_2`, `contenido_2`, `contenido_3`, `imagen_2`, `titulo_3`, `contenido_4`, `contenido_5`, `id_titular`, `id_categoria`) VALUES
(1, 'Fecha y hora del fallecimiento', '2025-04-29', 'El papa Francisco ha fallecido este lunes 21 de abril a los 88 años. Su muerte se producía en torno a las 7:35 de la mañana en su residencia de la Casa Santa Marta, tal y como ha expresado el cardenal Kevin Joseph Farrel a través de un mensaje. Así, se po', 'imagenes/descarga.jpg', 'Muere el papa Francisco a los 88 años', ' A las 7:35 de esta mañana el obispo de Roma, Francisco, regresó a la casa del Padre. Toda su vida estuvo dedicada al servicio del Señor y de su Iglesia. Nos enseñó a vivir los valores del Evangelio con fidelidad, valentía y amor universal, especialmente ', 'El papa Francisco ha fallecido este lunes 21 de abril a los 88 años. Su muerte se producía en torno a las 7:35 de la mañana en su residencia de la Casa Santa Marta, tal y como ha expresado el cardenal Kevin Joseph Farrel a través de un mensaje. Así, se po', 'imagenes/Muere-Papa-Francisco-2-web-1080x675.jpg', 'Un documental y una entrevista con Évole', 'Durante sus 11 años de papado, Jorge Mario Bergoglio se ha caracterizado por luchar contra problemáticas que arrastraba la Iglesia, como su dedicación a los marginados, combatir los escándalos sexuales y frenar la corrupción en la Curia.', 'El papa protagonizó una película documental para Disney+ que codirigía Évole y que se titulaba Amén: Francisco responde. En ella, reunía a diez jóvenes de todo el mundo con los que charlaba sobre las preocupaciones de la juventud. ', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Élite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulares`
--

CREATE TABLE `titulares` (
  `id_titular` int(11) NOT NULL,
  `nombre_titular` varchar(150) NOT NULL,
  `introduccion` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `Imagen` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `titulares`
--

INSERT INTO `titulares` (`id_titular`, `nombre_titular`, `introduccion`, `fecha`, `Imagen`, `id_categoria`) VALUES
(1, 'Muere el papa Francisco a los 88 años', 'El soberano del Vaticano llevaba varios meses arrastrando graves problemas de salud.', '2025-04-29', 'imagenes/descarga.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nombre_usuario` varchar(30) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nombre_usuario`, `contraseña`, `id_rol`) VALUES
(16, 'admin_1@gmail.com', 'admin_1', '$2y$10$TgoU2YlQ1JCQWRYNntoMX.zxgGE7zuUCjy5MtWJMEKwWfM8qeO4CW', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentarios`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `id_titular` (`id_titular`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `titulares`
--
ALTER TABLE `titulares`
  ADD PRIMARY KEY (`id_titular`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_titular`) REFERENCES `titulares` (`id_titular`),
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `titulares`
--
ALTER TABLE `titulares`
  ADD CONSTRAINT `titulares_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
