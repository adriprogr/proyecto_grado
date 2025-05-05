-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2025 a las 15:34:02
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
CREATE DATABASE proyecto_grado;
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

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentarios`, `titular`, `descripcion`, `id_usuario`) VALUES
(9, 'Rendimiento del madrid de la champions', 'Me gustaria que se pudiera hablar del rendimiento que ha tenido el madrid durante la champions', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_1` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `contenido_1` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo_2` varchar(150) NOT NULL,
  `contenido_2` text NOT NULL,
  `contenido_3` text NOT NULL,
  `imagen_2` varchar(255) NOT NULL,
  `titulo_3` text NOT NULL,
  `contenido_4` text NOT NULL,
  `contenido_5` text NOT NULL,
  `id_titular` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_1`, `fecha`, `contenido_1`, `imagen`, `titulo_2`, `contenido_2`, `contenido_3`, `imagen_2`, `titulo_3`, `contenido_4`, `contenido_5`, `id_titular`, `id_categoria`) VALUES
(1, 'Fecha y hora del fallecimiento', '2025-04-29', 'El papa Francisco ha fallecido este lunes 21 de abril a los 88 años. Su muerte se producía en torno a las 7:35 de la mañana en su residencia de la Casa Santa Marta, tal y como ha expresado el cardenal Kevin Joseph Farrel a través de un mensaje. Así, se po', '../../assets/img_noticias/Muere-Papa-Francisco-2-web-1080x675.webp', 'Muere el papa Francisco a los 88 años', ' A las 7:35 de esta mañana el obispo de Roma, Francisco, regresó a la casa del Padre. Toda su vida estuvo dedicada al servicio del Señor y de su Iglesia. Nos enseñó a vivir los valores del Evangelio con fidelidad, valentía y amor universal, especialmente ', 'El papa Francisco ha fallecido este lunes 21 de abril a los 88 años. Su muerte se producía en torno a las 7:35 de la mañana en su residencia de la Casa Santa Marta, tal y como ha expresado el cardenal Kevin Joseph Farrel a través de un mensaje. Así, se po', '../../assets/img_noticias/Muere-Papa-Francisco-2-web-1080x675.webp', 'Un documental y una entrevista con Évole', 'Durante sus 11 años de papado, Jorge Mario Bergoglio se ha caracterizado por luchar contra problemáticas que arrastraba la Iglesia, como su dedicación a los marginados, combatir los escándalos sexuales y frenar la corrupción en la Curia.', 'El papa protagonizó una película documental para Disney+ que codirigía Évole y que se titulaba Amén: Francisco responde. En ella, reunía a diez jóvenes de todo el mundo con los que charlaba sobre las preocupaciones de la juventud. ', 1, 2),
(2, 'Joaquín Prat se ve obligado a terminar Vamos a ver media hora antes: ', '2025-04-29', 'Joaquín Prat ha terminado un poco antes la emisión de Vamos a ver tras una decisión de Telecinco respecto a su programación de este martes', '../../assets/img_noticias/joaquin.webp', 'Joaquín Prat se ve obligado a terminar antes su programa', 'El  28 de abril de 2025 pasará a la historia como el día en que España entera quedó paralizada. A las 12:30, un apagón eléctrico dejaba sin suministro a España, Portugal y partes de Francia quedó totalmente cortado. Los ciudadanos se quedaban sin luz, agu', 'Las informativos radiofónicos se convirtieron en la mayor fuente de información, junto con las cadenas que pudieron seguir emitiendo. Telecinco era una de ellas, que reprogramó toda su escaleta para poder informar de las últimas noticias sobre el apagón y', '../../assets/img_noticias/vamos_a_ver.webp', 'Los presentadores hablan del apagón', 'Joaquín Prat no ha sido el único que se ha visto afectado por el apagón. Ana Rosa Quintana daba la vuelta a El programa de AR. Con el plató a oscuras, la presentadora ha realizado una editorial al respecto de esta crisis.', 'No solo ha contado su experiencia, sino que también ha hecho una mención al presidente del Gobierno que se ha hecho viral. Lo que nos queda, ¿No? Después de un volcán, una pandemia, una Filomena, la DANA, un apagón', 2, 1),
(3, 'La desgracia familiar que ha unido a los hermanos Francisco y Cayetano Rivera', '2025-04-29', 'Los hijos de Paquirri y Carmina Ordóñez acudieron, por separado, al tanatorio SE-30 de Sevilla para despedir a uno de sus seres queridos', '../../assets/img_noticias/fran_caye.jpg', 'Sale a la luz la desgracia que ha unido a los hermanos Francisco y Cayetano Rivera', 'los hijos de Paquirri y Carmina Ordóñez acaba de perder a Alfonso Ordóñez, hermano de su abuelo Antonio Ordóñez y tío de su madre. Poco antes del apagón que azotó la Península Ibérica, Fran, que acaba de ser padre de nuevo tras el nacimiento de su hijo Ni', 'Francisco y Cayetano, que hace unos días visitó la casa de su hermano para conocer a su nuevo sobrino, llegaron al tanatorio de la SE-30 por separado. Ambos lucían trajes oscuros, corbatas negras y gafas de sol y mientras que el marido de Lourdes Montes, ', '../../assets/img_noticias/caye_triste.webp', 'Francisco y Cayetano Rivera, muy afectados por la muerte de su tío abuelo Alfonso Ordóñez', 'Curiosamente, en esa faena en Sevilla a la que acudieron Fran Rivera y Lourdes Montes hace solo unos días fue donde Alfonso Ordóñez, su tío abuelo fallecido, se despidió del mundo del toro tras más de 30 años dedicado a esta arriesgada profesión que adora', ' Francisco y Cayetano Rivera se han mostrado muy afectados tras la pérdida de su tío abuelo Alfonso Ordóñez y no han querido hacer declaraciones a su llegada al último adiós a su familiar. Descanse en paz.', 3, 1),
(4, 'Los reyes Felipe VI y Letizia comparten fotos inéditas de su hija, Sofía de Borbón, para celebrar sus 18 años', '2025-04-29', 'La hermana menor de Leonor de Borbón cumple su mayoría de edad este 29 de abril y Casa Real ha distribuido cinco nuevas imágenes de la joven, que está a punto de finalizar el 2º curso de Bachillerato Internacional en el UWC Atlantic College de Gales, posa', '../../assets/img_noticias/infanta-sofia-casa-real.jpeg', 'Nuevas fotos de la sofia de borbon', 'Sofía de Borbón, la hija menor de los reyes Felipe VI y Letizia cumple 18 años y Casa Real lo celebra compartiendo imágenes inéditas de la hermana de Leonor de Borbón. La infanta Sofía cuenta los días para finalizar sus estudios de Segundo de Bachillerato', 'De momento, la Casa Real no ha anunciado cuál será el futuro inmediato de la infanta Sofía. Si ha confirmado que la joven no seguirá una formación militar como si está haciendo su hermana mayor y que, de cara al curso que viene, todavía estaba barajando v', '../../assets/img_noticias/infanta_sofia.webp', 'Sofía de Borbón elige un look sobrio y elegante en color azul para las fotos de su 18 cumpleaños', 'En los jardines del Palacio de La Zarzuela de Madrid, Sofía de Borbón posa en solitario en diferentes localizaciones al aire libre, una imágenes que recuerdan al posado de los reyes Felipe y Letizia con sus hijas para celebrar su 20 aniversario de boda en', 'La Infanta posó para estas fotos antes de regresar al internado de Gales y ha escogido un look sobrio y elegante en tonos azules, uno de sus colores favoritos de su hermana y también suyo como demostró con el conjunto de Cayro Woman que lució en la gradua', 4, 1),
(5, 'La familia Flores se reúne al completo: así ha sido el bautizo de Nala, la hija de Elena Furiase', '2025-05-04', 'Un bautizo. Esa ha sido la excusa perfecta para reunir a toda la familia. Elena Furiase ha celebrado el de su segunda hija, Nala, fruto de su relación con Gonzalo Serra, cuatro meses después de su nacimiento. Una merecida ocasión para que todo el clan Flores se haya desplazado al completo hasta La Moraleja, en Madrid. Tanto es así que Lolita y Rosario se han reencontrado con su tía Carmen y con la gran estrella internacional del momento en la familia: Alba Flores. Ha sido complicado por las agendas de cada una de ellas, pero Elena Furiase, que se inspiró en El rey león para ponerle nombre a su hija, ha conseguido la celebración que quería; rodeada de todos sus seres queridos.', '../../assets/img_noticias/nala.webp', 'La reunión de Lolita y Rosario Flores con su tía Carmen', 'La pequeña Nala ha recibido aguas bautismales en la localidad madrileña de La Moraleja, donde reside la familia desde hace años. Los primeros en acudir al evento eran los orgullosos padres, Elena Furiase y Gonzalo Serra, tanto con Nala como con su hermano mayor, Noah, de cuatro años, quien llegó de la mano de su padre y protagonizó la anécdota del día: quiso tener el protagonismo durante la ceremonia interrumpiendo para ir al baño. Por lo demás todo el evento fue muy bien y la familia entraba con mucha alegría: Con muchas ganas de bautizo e ilusión, que es un día muy importante, dice Lolita Flores antes de entrar a la iglesia.', 'Pero si ha habido alguien que haya destacado en el evento esa ha sido Carmen Flores, que no conocía todavía a su sobrina: No me quería perder el bautizo por conocerla y por ver a mis sobrinas, asegura. Una ocasión única en la que hemos podido ver a Lolita y a Rosario junto a su tía.', '../../assets/img_noticias/esmeralda.jpg', 'El gramy de rosario y los padrinos de nala', ' Rosario Flores acababa de aterrizar en Madrid después de recibir un premio Grammy por su carrera musical. Ella y su mánager, Mariola Orellana llegan tras haber estado en la reboda de Eugenia Martínez de Irujo en Las Vegas: Estoy contentísima. Mi niña Nala... Estamos todos radiantes. No paramos, estoy agotada, ha contado frente a las cámaras.', 'Los padrinos de Nala han sido la hija de Rosario, Lola, y el hijo de Lolita y hermano de Elena, Guillermo, ambos muy felices de ocupar ese pedazo de puesto como han dicho. Además de todos sus seres queridos, también han asistido varios amigos que ha convertido este evento familiar en todo un desfile de los rostros conocidos que no se han querido perder el bautizo de Nala, como Esmeralda Moya, gran amiga de Furiase. Porque si hay algo que gusta a la familia Flores es reunirse y celebrar las ocasiones especiales.', 5, 1);

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
  `fecha` datetime NOT NULL,
  `Imagen` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `titulares`
--

INSERT INTO `titulares` (`id_titular`, `nombre_titular`, `introduccion`, `fecha`, `Imagen`, `id_categoria`) VALUES
(1, 'Muere el papa Francisco a los 88 años', 'El soberano del Vaticano llevaba varios meses arrastrando graves problemas de salud.', '2025-04-29 18:43:41', '../../assets/img_noticias/Muere-Papa-Francisco-2-web-1080x675.webp', 1),
(2, 'Joaquín Prat se ve obligado a terminar Vamos a ver media hora antes', 'Joaquín Prat ha terminado un poco antes la emisión de Vamos a ver tras una decisión de Telecinco', '2025-04-29 18:48:50', '../../assets/img_noticias/joaquin.webp', 1),
(3, 'La desgracia familiar que ha unido a los hermanos Francisco y Cayetano Rivera', 'Los hijos de Paquirri y Carmina Ordóñez acudieron, por separado, al tanatorio SE-30 de Sevilla para despedir a uno de sus seres queridos', '2025-04-29 19:00:00', '../../assets/img_noticias/fran_caye.webp', 1),
(4, 'Los reyes Felipe VI y Letizia comparten fotos inéditas de su hija, Sofía de Borbón, para celebrar sus 18 años', 'La hermana menor de Leonor de Borbón cumple su mayoría de edad este 29 de abril y Casa Real ha distribuido cinco nuevas imágenes de la joven, que está', '2025-04-29 19:20:00', '../../assets/img_noticias/infanta-sofia-casa-real.webp', 1),
(5, 'Reunión de la familia flores y bautizo de Nala, hija de Elena Furiase', 'En poco más de tres meses en la Casa Blanca, Trump ha dado un vuelco a algunas de las practicas diplomáticas de su país', '2025-05-04 15:54:00', '../../assets/img_noticias/rosario_completo.webp', 1);

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
(16, 'admin_1@gmail.com', 'admin_1', '$2y$10$TgoU2YlQ1JCQWRYNntoMX.zxgGE7zuUCjy5MtWJMEKwWfM8qeO4CW', 1),
(38, 'admin_2@gmail.com', 'admin_2', '$2y$10$J5Be9IDKBClWKEvcDIuV9e4YvPmLlQZPqC.4qnGJEVFP0VeyLaX5K', 1),
(39, 'adrielite@gmail.com', 'adrielite', '$2y$10$1kn67pmxa7G19upslL8l.ul8BjiON9rVVEy4QtpvDJzlAbMDmCR26', 2);

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
  MODIFY `id_comentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
