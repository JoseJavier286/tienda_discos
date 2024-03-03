-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2024 a las 20:36:05
-- Versión del servidor: 11.3.0-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pagos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pago_detalles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `id_usuario`, `id_pago_detalles`) VALUES
(8, 9, 31),
(9, 5, 32),
(10, 5, 33),
(11, 5, 34),
(12, 5, 35),
(13, 10, 36),
(14, 5, 37),
(15, 5, 38),
(16, 5, 39),
(17, 5, 40),
(18, 5, 41),
(19, 9, 42),
(20, 9, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_detalle`
--

CREATE TABLE `pago_detalle` (
  `id_pago_detalles` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `mes_expiracion` varchar(2) NOT NULL,
  `year_expiracion` varchar(4) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `pago_detalle`
--

INSERT INTO `pago_detalle` (`id_pago_detalles`, `numero`, `nombre`, `mes_expiracion`, `year_expiracion`, `cvv`, `total`) VALUES
(31, '5676 4433 2267 9987', 'Patricia barranco', '9', '2022', '994', 41.90),
(32, '5432 4234 2342 3432', 'SERGIO CORREAS RAYO', '9', '2024', '433', 38.80),
(33, '4324 5325 2345 4235', 'Sergio CORREAS RAYO', '10', '2026', '433', 59.85),
(34, '5434 2453 4534 5345', 'SERGIO CORREAS RAYO', '8', '2025', '433', 14.95),
(35, '5432 4235 3453 4543', 'SERGIO CORREAS RAYO', '7', '2025', '433', 16.95),
(36, '5489 2315 6484 6516', 'Benito martinez', '8', '2025', '433', 19.95),
(37, '4543 5435 3453 4543', 'Sergio Correas rayo', '9', '2026', '433', 65.65),
(38, '5435 3453 4534 5345', 'SERGIO CORREAS RAYO', '10', '2026', '433', 66.75),
(39, '4324 3242 3423 4234', 'Sergio Correas Rayo', '8', '2025', '433', 66.75),
(40, '4324 2342 3423 4234', 'SERGIO CORREAS RAYO', '7', '2022', '433', 66.75),
(41, '5434 3434 5345 3453', 'Sergio Correas', '8', '2027', '433', 66.75),
(42, '5435 2432 5435 3535', 'PATRICIA BARRANCO', '8', '2025', '433', 29.70),
(43, '5234 2343 2423 4234', 'PATRICIA', '9', '2025', '433', 4.95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `numero_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_usuario`, `numero_pedido`) VALUES
(2, 9, 1),
(3, 5, 2),
(4, 5, 3),
(5, 5, 4),
(6, 5, 5),
(7, 10, 6),
(8, 5, 7),
(9, 5, 8),
(10, 5, 9),
(11, 5, 10),
(12, 5, 11),
(13, 9, 12),
(14, 9, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `id_pedido_detalle` int(11) NOT NULL,
  `numero_pedido` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido_detalle`
--

INSERT INTO `pedido_detalle` (`id_pedido_detalle`, `numero_pedido`, `id_productos`) VALUES
(22, 1, 25),
(23, 1, 39),
(24, 2, 8),
(25, 2, 11),
(26, 2, 13),
(27, 2, 9),
(28, 3, 46),
(29, 3, 52),
(30, 3, 29),
(31, 4, 15),
(32, 5, 21),
(33, 6, 48),
(34, 7, 9),
(35, 7, 8),
(36, 7, 8),
(37, 7, 9),
(38, 7, 9),
(39, 7, 9),
(40, 7, 11),
(41, 8, 25),
(42, 8, 25),
(43, 8, 32),
(45, 8, 27),
(46, 9, 25),
(47, 9, 25),
(48, 9, 32),
(50, 9, 27),
(51, 10, 25),
(52, 10, 25),
(53, 10, 32),
(55, 10, 27),
(56, 11, 25),
(57, 11, 25),
(58, 11, 32),
(60, 11, 27),
(61, 12, 8),
(62, 12, 8),
(63, 12, 8),
(64, 12, 8),
(65, 12, 8),
(66, 12, 8),
(67, 13, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sello` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre`, `seccion`, `artista`, `precio`, `sello`, `formato`, `estado`, `cantidad`, `imagen`) VALUES
(8, 'Long Bad Dayyyyy', '50', 'Jukebox Racket', 4.95, 'El Beasto Recordings', 'Vinilo 7 Single', 'Nuevo', 0, 'Jukebox-Racket-Long-Bad-Day-510x519.jpg'),
(9, 'Obsesión En El Muelle', '50', 'Lobos Negros', 19.95, 'Pscho Records', 'Vinilo 7 Single', 'Nuevo', 7, 'Lobos-Negros-Obsesion-En-El-Muelle-510x511.jpg'),
(10, 'Toca Blues', '50', 'Los Coronados', 3.95, 'KM 444', 'Vinilo, 7\\&quot;, Single', 'Nuevo', 7, 'Los-Coronados-Toca-Blues.jpg'),
(11, 'Arkestra', '50', 'Los Mambo Jambo', 15.95, 'Buenritmo Records', 'Vinilo, LP', 'Nuevo', 7, 'Los-Mambo-Jambo-Arkestra-510x510.jpg'),
(12, 'Ride This Train', '50', 'Johnny Cash', 17.95, 'Doxy Music', 'Vinilo, LP', 'Nuevo', 7, 'Johnny-Cash-Ride-This-Train.jpg'),
(13, 'This Is It!', '50', 'King Pleasure And The Biscuit Boys', 7.95, 'Big Bear Records', 'Vinilo, LP', 'Nuevo', 7, 'King-Pleasure-And-The-Biscuit-Boys-This-Is-It-510x503.jpg'),
(14, ' Hi-Fi Honey Revisited', '50', 'The Frantic Flattops', 15.95, 'Get Hip Recordings', 'Vinilo, LP', 'Nuevo', 7, 'The-Frantic-Flattops-Hi-Fi-Honey-Revisited.jpg'),
(15, 'Burnin&rsquo; Daylight with Mario Cobo and his guitar posse', '50', 'Mario Cobo', 14.95, 'Sleazy Records', 'Vinilo, LP', 'Nuevo', 7, 'Mario-Cobo-Burnin-Daylight-With-Mario-Cobo-And-His-Guitar-Posse.jpg'),
(17, 'Now, There Was A Song!', '50', 'Johnny Cash', 17.95, 'Doxy Music', 'Vinilo, LP', 'Nuevo', 7, 'Johnny-Cash-Now-There-Was-A-Song.jpg'),
(18, 'Been Up To The Devil&rsquo;s Busines', '50', 'Highway 13', 15.95, 'Get Hip Recordings', 'Vinilo, LP', 'Nuevo', 7, 'Highway-13-Been-Up-To-The-Devils-Business.jpg'),
(19, 'Buddy Holly', '50', 'Buddy Holly', 15.95, 'Black Rooster', 'Vinilo, LP, 45 RPM', 'Nuevo', 7, 'buddy-holly-buddy-holly-510x535.jpg'),
(20, 'Robbie &amp; The Savoy Rumblers', '50', 'Robbie &amp; The Savoy Rumblers', 12.95, 'Folc Records', 'Vinilo, 12\\&quot;, 45 RPM, EP', 'Nuevo', 7, 'Robbie-The-Savoy-Rumblers-Robbie-The-Savoy-Rumblers-510x547.jpg'),
(21, 'American II: Unchained', '50', 'Johnny Cash', 16.95, 'American Recordings', 'Vinilo, LP', 'Nuevo', 7, 'Johnny-Cash-American-II-Unchained-510x509.jpg'),
(22, 'Calypso Is Like So&hellip;', '50', 'Robert Mitchum', 13.95, 'B-Coconut', 'Vinilo, LP', 'Nuevo', 7, 'Robert-Mitchum-Calypso-Is-Like-So-510x510.jpg'),
(23, 'The Times They Are A-Changin&rsquo;', '60', 'The Byrds', 11.95, 'Sundazed Music, Columbia &lrm;', 'Vinilo, 7\\&quot;, 45 RPM', 'Nuevo', 7, 'The-Byrds-The-Times-They-Are-A-Changin-510x510.jpg'),
(24, 'Summer Is Here', '60', 'The Outsiders', 8.95, 'Sundazed Music, Columbia &lrm;', 'Vinilo, 7\\&quot;, 45 RPM', 'Nuevo', 7, 'Outsiders-Summer-Is-Here-510x506.jpg'),
(25, 'Thinking About Today', '60', 'The Outsiders', 7.95, 'Relax', 'Vinilo, 7\\&quot;, 45 RPM', 'Nuevo', 3, 'Outsiders-Thinking-About-Today-510x510.jpg'),
(26, 'Felt Like I Wanted To Cry', '60', 'The Outsiders', 8.95, 'Muziek Expres', 'Vinilo, 7\\&quot;, 45 RPM, Single', 'Nuevo', 7, 'The-Outsiders-Felt-Like-I-Wanted-To-Cry-I-Love-Her-Still-I-Always-Will.jpg'),
(27, 'Eight Miles High', '60', 'The Byrds', 13.95, 'Sundazed Music', 'Vinilo, 7\\&quot;, Single, 45 RPM', 'Nuevo', 5, 'The-Byrds-Eight-Miles-High-Why-510x511.jpg'),
(28, 'Da Capo', '60', 'Love ', 21.95, 'Music On Vinyl, Elektra', 'Vinilo, LP', 'Nuevo', 7, 'Love-Da-Capo-510x517.jpg'),
(29, 'Volume 3', '60', 'The Easybeats', 17.95, 'Music On Vinyl', 'Vinilo, LP', 'Nuevo', 7, 'The-Easybeats-Volume-3-510x510.jpg'),
(30, 'Kick Out The Jams', '60', 'MC5', 19.95, 'Elektra, Rhino Records', 'Vinilo, LP', 'Nuevo', 7, 'MC5-Kick-Out-The-Jams-e1610471451995-510x509.jpg'),
(31, 'Waiting For The Sun', '60', 'The Doors', 15.95, 'Elektra', 'Vinilo, LP', 'Nuevo', 7, 'The-Doors-Waiting-For-The-Sun-510x502.jpg'),
(32, 'The Kinks Are The Village Green Preservation Society', '60', 'The Kinks', 21.95, 'Sanctuary Records', 'Vinilo, LP', 'Nuevo', 5, 'The-Kinks-The-Kinks-Are-The-Village-Green-Preservation-Society.jpg'),
(33, 'Bert Jansch', '60', 'Bert Jansch', 23.95, 'Transatlantic Records', 'Vinilo, LP', 'Nuevo', 7, 'bert-jansch-debut-album-510x510.jpg'),
(34, 'Forever Changes', '60', 'Love', 23.95, 'Elektra, Rhino Records', 'Vinilo, LP', 'Nuevo', 7, 'Love-Forever-Changes-510x505.jpg'),
(35, 'The Ultimate Action', '60', 'The Action', 18.95, 'Demon Records', 'Vinilo, LP', 'Nuevo', 7, 'theaction-scaled-e1609604241631-510x506.jpg'),
(36, 'Raw And Unreleased', '60', 'The Bubbles', 11.95, 'Groovie Records', 'Vinilo, LP', 'Nuevo', 7, 'The-Bubbles-Raw-And-Unreleased-510x510.jpg'),
(37, 'B.B.', '60', 'Brigitte Bardot', 22.95, 'Mercury', 'Vinilo, LP', 'Nuevo', 7, 'Brigitte-Bardot-BB.jpg'),
(38, 'Goodbye', '60', 'Cream', 15.95, 'Vinyl Lovers', 'Vinilo, LP', 'Nuevo', 7, 'cream-goodbye.jpg'),
(39, 'U218 Singles', '70', 'U2', 33.95, 'Island Records, Mercury Music Group', 'Doble Vinilo, LP', 'Nuevo', 7, 'U2-U218-Singles-510x510.jpg'),
(40, 'The Philadelphia Interviews', '70', 'U2', 14.95, 'Baktabak', 'Vinilo, LP', 'Nuevo', 7, 'U2-The-Philadelphia-Interviews-Volume-Two.jpg'),
(41, 'Pack Up The Plantation Live!', '70', 'Tom Petty And The Heartbreakers', 24.95, 'Geffen Records, MCA Records', 'Doble Vinilo, LP', 'Nuevo', 7, 'Tom-Petty-And-The-Heartbreakers-Pack-Up-The-Plantation-Live-510x510.jpg'),
(42, 'This Is Slim Forsythe', '70', 'Slim Forsythe', 15.95, 'Get Hip Folk Series', 'Vinilo, LP', 'Nuevo', 7, 'Slim-Forsythe-This-Is-Slim-Forsythe-510x510.jpg'),
(43, 'Just Like The River And Other Songs With Guitar', '70', 'Robin Williamson', 15.95, 'Quadrant Records', 'Vinilo, LP', 'Nuevo', 7, 'Robin-Williamson-Just-Like-The-River-And-Other-Songs-With-Guitar.jpg'),
(44, 'Heaven Was Blue', '70', 'Rick Saucedo', 21.95, 'Guerssen', 'Doble Vinilo, LP', 'Nuevo', 7, 'Rick-Saucedo-Heaven-Was-Blue-510x510.jpg'),
(46, 'Castro Marin', '70', 'Paco De Lucia', 19.95, 'Philips, Universal Music Group', 'Vinilo, LP', 'Nuevo', 7, 'Paco-De-Lucia-Castro-Marin-510x506.jpg'),
(47, 'Solo Fue Un Sue&ntilde;o', '70', 'Omni', 11.95, 'Pat Records', 'Vinilo, LP', 'Nuevo', 7, 'omni-solo-fue-un-sueno.jpg'),
(48, 'El Duende Flamenco De Paco De Luc&amp;iacute;a', '70', 'Paco De Luc&amp;iacute;a', 19.95, 'Philips, Universal Music Spain', 'Vinilo, LP', 'Nuevo', 7, 'Paco-De-Lucia-El-Duende-Flamenco-De-Paco-De-Lucia-510x505.jpg'),
(49, 'Omphalos', '70', 'Kotebel', 14.95, 'Pat Records', 'Doble Vinilo, LP', 'Nuevo', 7, 'Kotebel-Omphalos.jpg'),
(50, 'Moths', '70', 'Jethro Tull', 17.95, 'Chrysalis', 'Vinilo, EP', 'Nuevo', 7, 'jethro-tull-moths-510x520.jpg'),
(51, 'Iggy &amp; Ziggy Cleveland', '70', 'Iggy Pop', 19.95, 'Cleopatra', 'Vinilo, LP', 'Nuevo', 7, 'Iggy-Pop-Iggy-Ziggy-Cleveland-77-510x524.jpg'),
(52, 'Free', '70', 'Free', 21.95, 'Island Records, Music On Vinyl', 'Vinilo, LP', 'Nuevo', 7, 'Free-debut-album-510x507.jpg'),
(53, 'Pronto Viviremos Un Mundo Mucho Mejor', '70', 'Los Flippers', 19.95, 'Guerssen', 'Vinilo, LP', 'Nuevo', 7, 'Los-Flippers-Pronto-Viviremos-Un-Mundo-Mucho-Mejor-510x506.jpg'),
(54, 'Faust', '70', 'Faust', 21.95, 'Lilith', 'Vinilo, LP', 'Nuevo', 7, 'Faust-Faust-vinilo-510x506.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigo_postal` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `direccion`, `email`, `telefono`, `codigo_postal`, `password`, `rol`) VALUES
(4, 'Administrador', 'El administrador', 'Calle El Admin', 'admin@gmail.com', '623928416', '25610', '$2y$10$XUGV4SYPSfU3NI76A7rYReyN0aLcAwr4gkpr12R.I1/kHYb9hoq0u', 'admin'),
(5, 'Sergio', 'Correas Rayo', 'C/Pizarro N&ordm;25 1&ordm;B', 'sergiocorreas18@gmail.com', '629327575', '28911', '$2y$10$9fbVWvkOVHC8I7ci5qK0nuQGEorDmtaC945aLzO5EsThGl1PtLYJe', 'user'),
(6, 'Marcos', 'Alonso Mohedano', 'Avenida La Paz N2 4C', 'marquitos17@gmail.com', '654214589', '28932', '$2y$10$nuY9QpgPxPt/VDSGKZk0E.YWzdML1FI3SNASANARTnegxXjzEybYa', 'user'),
(8, 'Marta', 'Lopez Sanchez', 'Calle Indias N27 1D', 'martalopez@gmail.com', '629584652', '28498', '$2y$10$dC6ZK.iH.2zfzP7vNk.JF.vrFYKOdMS5MbjF9mOYr2F3PoLunWQia', 'user'),
(9, 'Patricia', 'Barranco Perez', 'Avenida Lopez de Hoyos N120 3F', '3cpatriciabarranco@gmail.com', '622456552', '28145', '$2y$10$t3cnhIQyucaKytQFSrxwbOcbt25JjaF9BKKar84cBn2ScBOoyGLRW', 'user'),
(10, 'Benito', 'Martinez Pereira', 'Plaza Norte N25', 'pereiramartinez@hotmail.com', '625452156', '28955', '$2y$10$/msicWHAr9OYn12DLdyoQOhCBYPmNf5T0fZI6FskfBwk.QNd1lw9m', 'user'),
(68, 'jose javier', 'alonso', 'calle portolagos numero 5 bajo a escalera izquierda', 'josejavier@hotmail.com', '690263201', '28924', '$2y$10$muqeQ866oryustCNDD035eR9YOgZOdSmzdDP1PU.vP2E30VxJcczC', 'user'),
(69, 'Cristiano', 'Ronaldo', 'calle calle calle calle portugal', 'cristianoadmin@gmail.com', '1111111122', '1111', '$2y$10$ZfeDMW.azu0yzwgIpZ/PCuWdBXrgmgl6H8UlriYeJO3PvoCmJI7Om', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pagos`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pago_detalles` (`id_pago_detalles`);

--
-- Indices de la tabla `pago_detalle`
--
ALTER TABLE `pago_detalle`
  ADD PRIMARY KEY (`id_pago_detalles`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Indices de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD PRIMARY KEY (`id_pedido_detalle`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pago_detalle`
--
ALTER TABLE `pago_detalle`
  MODIFY `id_pago_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `id_pedido_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_pago_detalles`) REFERENCES `pago_detalle` (`id_pago_detalles`);

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `pedido_detalle_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
