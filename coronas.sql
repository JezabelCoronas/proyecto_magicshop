-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2024 a las 03:36:06
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coronas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion`, `activo`) VALUES
(1, 'Auriculares', 1),
(2, 'Fundas', 1),
(3, 'Parlantes', 1),
(4, 'Cargadores', 1),
(5, 'Smartwatch (Reloj)', 1),
(6, 'Otros Accesorios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `consulta_nombre` varchar(50) NOT NULL,
  `consulta_apellido` varchar(50) NOT NULL,
  `consulta_email` varchar(200) NOT NULL,
  `consulta_telefono` int(10) NOT NULL,
  `consulta_mensaje` varchar(300) NOT NULL,
  `respondida` varchar(11) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `consulta_nombre`, `consulta_apellido`, `consulta_email`, `consulta_telefono`, `consulta_mensaje`, `respondida`) VALUES
(1, 'Luciana', 'Fernandez', 'holasoyluci@mail.com', 2147483647, 'Hola quisiera información sobre los aros de luz gracias', 'SI'),
(3, 'Jose Maria', 'Perez', 'chema@hotmail.com', 2147483647, 'Necesito información sobre los envios internacionales gracias', 'NO'),
(4, 'Martina', 'Stoessel', 'tini@gmail.com', 231231231, 'Hola necesito informacion', 'SI'),
(5, 'Bruce', 'Wayne', 'brucebatman@mail.com', 232323, 'Buenas tardes solicito información sobre la venta mayorista', 'NO'),
(6, 'Gustavo', 'Coronas', 'guscoro@gmail.com', 23213123, 'Hola necesito información', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(1, 'Funda Rosa E22', '1716604344_f6300e7f1359fa665eea.jpg', 2, 5000.00, 5656.00, 300, 300, 'SI'),
(5, 'Powerbank Samsung', '1717893314_ed5eaf61d4f9efdc2ff6.jpg', 6, 30000.00, 30000.00, 5, 3, 'NO'),
(6, 'Powerbank Samsung', '1717893314_ed5eaf61d4f9efdc2ff6.jpg', 6, 30000.00, 30000.00, 5, 3, 'SI'),
(7, 'Powerbank Samsung', '1717893301_420e9eccdebc87c33a0d.png', 2, 30000.00, 30000.00, 5, 2, 'NO'),
(8, 'Funda iPhone6', '1717783880_131ae3d5b3ac3e206e3d.jpg', 2, 3000.00, 3000.00, 10, 2, 'NO'),
(9, 'Funda Motoe22', '1717784035_f4e0cfdd3d2e856b7715.jpg', 2, 3000.00, 3000.00, 300, 500, 'NO'),
(10, 'Funda iPhone5', '1717784457_510d1c76a55b1f2654ff.jpg', 2, 2500.00, 3000.00, 3344, 3434, 'NO'),
(11, 'Funda iPhone5', '1717784547_cacd860159deff8cf39c.jpg', 2, 2500.00, 3000.00, 3344, 3434, 'NO'),
(12, 'Auriculares AIWA', '1717784632_3343bad9cba7230164fc.jpg', 1, 40000.00, 40000.00, 300, 200, 'SI'),
(13, 'Auriculares AIWA', '1717784703_0fcdbeea0bfa34ae55f3.jpg', 1, 40000.00, 40000.00, 300, 200, 'SI'),
(14, 'Auriculares AIWA', '1717784938_c8bb0011effc49ee8d26.jpg', 1, 40000.00, 40000.00, 300, 200, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `perfil_id` int(2) NOT NULL DEFAULT 2,
  `baja` text NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Luci', 'Fernandez', 'holasoyluci@mail.com', 'lucifer1', '$2y$10$084pHVOeAZ7yM9sSHNNcsuVD6epmoCT/qo9qO0fTdiNuABJhAyzVm', 2, 'NO'),
(2, 'Mark', 'Hoffman', 'holasoymark@gmail.com', 'markthehoff', '$2y$10$mJ86/RLV.klK8MDxsh/2Ve4sFcv3L45CYYIFYX80xatu2fCKMwT.G', 2, 'NO'),
(4, 'Amanda', 'Young', 'amandatheyoung@mail.com', 'amanda_y', '$2y$10$eJMpVafMFaPOaBS192mGJeqpOCOY2bJrVpSv9LCX8CNRtcUNOoRPi', 2, 'NO'),
(5, 'John', 'Kramer', 'iamjigsaw@gmail.com', 'thejigsaw1', '$2y$10$xQMzz4QdtazfvkOHzRXyTupdPMprfQnB9XdISFi82H2bkAn3yEJHu', 1, 'SI'),
(7, 'Jezabel', 'Coronas', 'hola@mail.com', 'jez', '$2y$10$x1gfXZZd3vgVQCN8dx9KjOLV8jPnzYUyoTTZ2l/19fesVosUlIf3a', 1, 'SI'),
(8, 'Daniel', 'Dyer', 'soyeldan@hotmail.com', 'texas', '$2y$10$wmsZx4C4in3LGWu36/66COU9cSv6YCbPnhD2LWFArgEFWyG4x1wg2', 2, 'NO'),
(9, 'Jose Maria', 'Brut', 'elchema@mail.com', 'chema', '$2y$10$x12n12OW8or2Oe7qLm/bTe0w1i6/iCE9SfJ2nVF1hj26fZw035BVG', 2, 'NO'),
(10, 'Timmy', 'Turner', 'timmyturner@mail.com', 'timmy', '$2y$10$N8b46WuzKNpqdOd/zr2GQ.VRVkZHE9JqW3svhhwvsaUeNRps.YXKy', 2, 'NO'),
(11, 'lucita', 'salaz', 'lucita@gmail.com', 'lucita', '$2y$10$wqTx0e2fCE8J5w7j3mFJ6eLBPPN/Oal0sLZj030EOT4BctiGUC6Zu', 1, 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
