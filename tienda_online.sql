-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 21:12:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--
CREATE DATABASE IF NOT EXISTS `tienda_online` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tienda_online`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Teclado Gamer'),
(2, 'Mouse Gamer'),
(3, 'Case'),
(4, 'Memorias Ram'),
(5, 'UPS'),
(6, 'CPU'),
(7, 'Tarjeta Graficas'),
(8, 'Monitores'),
(9, 'Cooler'),
(10, 'Motherboard Gamer'),
(11, 'Sillas Gamer'),
(12, 'Audifonos '),
(13, 'Accesorios de mantenimiento'),
(14, 'Software'),
(15, 'Fuentes de poder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `rainting` int(11) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta_producto`
--

CREATE TABLE `detalle_venta_producto` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_details`
--

CREATE TABLE `imagen_details` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagen_details`
--

INSERT INTO `imagen_details` (`id`, `producto_id`, `imagen`) VALUES
(1, 1, '3546.png'),
(2, 1, '4254.png'),
(3, 1, '4835.png'),
(4, 2, '0339.jpg'),
(5, 2, '5667.png'),
(6, 2, '1222.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre_marca`) VALUES
(1, 'HP'),
(2, 'LEONOVO'),
(3, 'Acer 200'),
(4, 'AMD'),
(5, 'AORUS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca_producto` int(11) NOT NULL,
  `NombreProducto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` decimal(8,5) NOT NULL,
  `precioCompra` decimal(8,5) NOT NULL,
  `detalles` text COLLATE utf8_unicode_ci NOT NULL,
  `fechaCompra` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_marca_producto`, `NombreProducto`, `imagen`, `cantidad`, `precioVenta`, `precioCompra`, `detalles`, `fechaCompra`) VALUES
(1, 10, 5, 'Z490 AORUS XTREME WATERFORCE (rev. 1.x)', '2433.png', 15, '650.00000', '500.00000', '                                                                                                                        <h4><span lang=\"EN-US\"><b>Intel® Z490\r\nAORUS Motherboard with 16+1 Phases Digital VRM, AORUS All-In-One Monoblock ,NanoCarbon\r\nBaseplate, Intel® Thunderbolt 3, ESSential USB DAC, Intel® WiFi 6 802.11ax,\r\nAQUANTIA® 10GbE LAN, Intel® 2.5GbE LAN, RGB FAN COMMANDER</b></span></h4><h4><span lang=\"EN-US\"><b><br></b></span></h4><ul><li><span lang=\"EN-US\">Supports\r\n10th Gen Intel® Core™ Processors and 11th Gen Intel® Core™ Processors*</span></li><li><span style=\"font-size: 1rem;\">Dual\r\nChannel Non-ECC Unbuffered DDR4, 4 DIMMs</span></li><li><span lang=\"EN-US\">Intel®\r\nOptane™ Memory Ready<o:p></o:p></span></li><li><span lang=\"EN-US\">16+1 Phases\r\nDigital VRM Solution with 90A Smart Power Stage and Tantalum Polymer Capacitors\r\nArray<o:p></o:p></span></li><li><span lang=\"EN-US\">XTREME\r\nMEMORY with SMT DIMM and Shielded Memory Routing<o:p></o:p></span></li><li><span lang=\"EN-US\">AORUS\r\nAll-In-One Monoblock for CPU, VRM, SSD and PCH</span></li><li>Intel®\r\nThunderbolt™ 3 Onboard</li><li>Exclusive\r\nESSential USB DAC</li><li>Exclusive\r\nRGB FAN COMMANDER for Professional Casemodders</li><li>Onboard\r\nIntel® WiFi 6 802.11ax 2T2R &amp; BT 5 with 2X AORUS Antenna</li><li>127dB SNR\r\nAMP-UP Audio with High-End ESS SABRE 9018K2M DAC, LME 49720 and OPA1622 OP-AMP,\r\nWIMA Audio Capacitors</li><li>AQUANTIA®\r\n10GbE BASE-T LAN and Intel® 2.5GbE LAN with cFosSpeed</li><li>Triple\r\nUltra-Fast NVMe PCIe 3.0 x4 M.2 with Thermal Guards II</li><li>USB\r\nTurboCharger for Mobile Device Fast Charge Support</li><li>RGB FUSION\r\n2.0 with Multi-Zone Addressable LED Light Show Design, Support Addressable LED\r\n&amp; RGB LED Strips</li><li>Smart Fan 5\r\nFeatures Multiple Temperature Sensors , Hybrid Fan Headers with FAN STOP and\r\nNoise Detection</li><li>Q-Flash\r\nPlus Update BIOS without Installing the CPU, Memory and Graphics Card</li></ul><h3><br></h3>                                                                                                            ', '2020-11-30 01:09:33'),
(2, 6, 4, 'Ryze 5 3600', '0074.png', 3, '955.00000', '250.00000', '                                                                                                                                                                <ul><li>WQEQWEQWEQW</li><li>dato globito</li></ul>                                                                                                                                                ', '2020-11-30 01:49:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles_usuario`
--

INSERT INTO `roles_usuario` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Root', 'El usuario tendrá el control total del sistema'),
(2, 'Admin', 'Para el dueño de la tienda.'),
(3, 'Empleado', 'Solo puede ver los pedidos que los clientes realicen en la tienda virtual y sacar los reportes de ventas.'),
(4, 'Cliente', 'Este usuario es para los cliente que se registren en la tienda.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `direccion`, `email`, `usuario`, `pass`, `sexo`, `telefono`, `imagen`, `roles_id`) VALUES
(1, 'Kelvin Adonay', 'Vásquez Domínguez', 'Santiago Nonualco, Depto. La Paz', 'kelvin@gmail.com', 'kelvin', '$2y$10$GDgfXpVku3DH9bDKIiqGUOdiCEx3WyQDYS2WSYF439oJx6COcYWrO', 1, 5555555, '1447.jpg', 1),
(2, 'Emerson Noel', 'Saravia Lopez', '', 'emerson@gmail.com', 'emersonsaravia27', '$2y$10$ngGYu5nCoHmh8tAxME7LyeBAdxIVRwzJHxjnJf.VV5xptQ0rWAl6u', 0, 0, '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `detalle_venta_producto`
--
ALTER TABLE `detalle_venta_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `imagen_details`
--
ALTER TABLE `imagen_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagen_details_FK` (`producto_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca_producto` (`id_marca_producto`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`usuario`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta_producto`
--
ALTER TABLE `detalle_venta_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_details`
--
ALTER TABLE `imagen_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_venta_producto`
--
ALTER TABLE `detalle_venta_producto`
  ADD CONSTRAINT `detalle_venta_producto_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_producto_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `imagen_details`
--
ALTER TABLE `imagen_details`
  ADD CONSTRAINT `imagen_details_FK` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_marca_producto`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles_usuario` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
