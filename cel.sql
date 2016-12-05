-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2016 a las 03:54:25
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CI` int(10) NOT NULL,
  `nombre` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CI`, `nombre`, `apellidos`, `telefono`, `estado`) VALUES
(132456, 'jose', 'ramirez', 123456, 1),
(546546, 'mario', 'gomez', 1321, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `coddet` int(11) NOT NULL,
  `ci_cli` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `punit` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`coddet`, `ci_cli`, `codpro`, `punit`, `cantidad`, `imei`) VALUES
(0, 546546, 2, '1200', 1, '355319073558422'),
(1, 123456, 1, '900', 1, '355319073558423');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_ref` decimal(11,0) NOT NULL,
  `cantidad` int(11) DEFAULT '0',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `modelo`, `precio_ref`, `cantidad`, `estado`, `descripcion`) VALUES
(1, 'Samsung Galaxy J3', '900', 10, 1, NULL),
(2, 'Samsung Galaxy J5', '1200', 30, 1, NULL),
(3, 'Samsung Galaxy J7', '1700', 21, 1, NULL),
(4, 'Sony Xperia Z3', '1300', 20, 1, NULL),
(5, 'Sony Xperia Z4', '1800', 10, 1, NULL),
(6, 'Sony Xperia M4 Aqua', '2000', 22, 1, NULL),
(7, 'Sony Xperia Z3+ Dual ', '1400', 11, 1, NULL),
(8, '‎LG L70 Fino D290AR', '900', 5, 1, NULL),
(9, '‎LG L80 D375AR', '5', 0, 1, NULL),
(10, '‎LG G PRO Lite D681', '1200', 1, 1, NULL),
(11, 'Nexus 5', '2000', 5, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CI` int(10) NOT NULL,
  `nombre` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `telefono` int(20) DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CI`, `nombre`, `apellidos`, `telefono`, `password`, `estado`) VALUES
(0, 'aqsdqwe', 'qweqwe', 2147483647, '$2y$07$gr3x9wrli8nn68shfvwn9eUAd/xH4tq9tP/3qUiEZxSj45Bv8ZruO', 1),
(1, '1', '1', 0, '$2y$07$yp5wxul9utzh9fvsgox0pe3YKP65c9A8NmWn/KQ6HCvDf2l5NrU9a', 1),
(5, '5', '5', 0, '$2y$07$njq0yrqtn1j4ws4hqy9i0uUZ7wvHINad/3BYWGC/mFsFJI5.wvVYq', 1),
(10, '10', '10', 0, '$2y$07$yzw2yihgg3mk1yx39jogxeDHQ9is5hXVXJDCmUtfg.5ehbSJyzsvi', 1),
(11, '11', '11', 0, '$2y$07$mi7m42q0xl3fnop66l0sfuuIlkERYIF8f5m3pltK8qP4X3u9x7iZe', 1),
(22, '22', '22', 0, '$2y$07$k5hgtho7usvqk5qk537xne9hcfV0yvwePXp/ehhd0iXPMkGX.V3SG', 1),
(33, '33', '33', 0, '$2y$07$g9pzo6r4l8f36r0u69zwoudB6SamzSvg9NrtQefswuKMmxERLmVTW', 1),
(44, '44', '44', 0, '$2y$07$8w2k6r7w3qt679vokg1x7e23DTmGBdhusFdjZJRmnl4YuFEzZzTve', 1),
(55, '55', '55', 0, '$2y$07$np3g3m3f6is5hzjfxh2u8ejCGMGlsv0gxlf1kitKf03ESYzNxbbRq', 1),
(66, '66', '66', 0, '$2y$07$v0uvfrklgtkvvkio49f2yu80zr3QbP8j0SNfeGXzlQHIjdhblxEY2', 1),
(77, '77', '77', 0, '$2y$07$mt67iyyz0f25760qu6435eblUbRBhbJGrHRQLy.ykApL0emIFfy16', 1),
(88, '88', '88', 0, '$2y$07$mk5tvyixx3j23g0g5tmnjebpzHimtYKvG3ZadSfZGhgesr5qCrDQe', 1),
(99, '99', '99', 0, '$2y$07$8l3l3pxnus931ojjtifsqukMWEqtO6t3J8HTtKDVeKQFlQfB2dOpy', 1),
(111, 'Jorge', 'Ramos', 111, '$2y$07$mgt3qyjp38vxiph11y2lkeU4Fpp1xpTJuxXkftYBj/wcmDEulPNmq', 1),
(189, '189', '189', 0, '$2y$07$w9kixvy85gsnfum6wqh6nunbX7W//KoZJLawT4x5m1o10/YE7fhn2', 1),
(322, '322', '322', 0, '$2y$07$70m26vggkjvz9iwu2ivhzeLDDZGC.J8yu/LDNh5B3nuqs2WU8WDNe', 1),
(387, '378', '378', 0, '$2y$07$upr3xpmk1rfo82ui7ghhzuAPBSMBO3mH6JAiGZvI5MX1/XPV1WDly', 1),
(777, '777', '777', 0, '$2y$07$znzsyrg82ivnm5l2iv19xuGRGPRdTl6nzAOkn29v8bnX4lpcHO9pC', 1),
(7777, '2355626', '62564', 0, '$2y$07$4h77isfl0y88kzk2i976xu5vdVv3lO8Wi1Noz8m2Y/WecfE5I5Yz6', 1),
(12345, 'JosÃ©', 'Rodriguez', 1235561, '$2y$07$nyu11pkyxyu7kqsgl6tl7uvd1PkPjRnQjKIcu8JipArW9XvOyqk4m', 1),
(77833, '453453', '0453.3', 0, '$2y$07$m7g026l7kqgpsqki5ozrleXqt4884tCW2UO9NQwWkv9W1bEI82Xym', 1),
(123123, 'Raul', 'Miranda', 123123, '$2y$07$yy6wt2l141xovj12kj361eyWvuR1n8XeveNj7EKtd6x6kQCalQLom', 1),
(123456, 'Juan', 'Ramirez', 123456, '$2y$07$olq8rp49rsro6xu5ys36nec2QFWLhDVNQPbCM/AMrfNiby/Dl000m', 1),
(185949, '78378378', '4815948', 0, '$2y$07$53lj54o4klt71foj2z84jeKR25juG5/S2LNDaL6Gt008V5RKwbt1K', 1),
(189189, '1859819', '189189', 0, '$2y$07$j2p38pfzo1838vrv7go72epXkm.GVsxvoxnnAshj1Nx3eCBMQSuV2', 1),
(345512, '12e1dd12d12', '1231233123', 2147483647, '$2y$07$13h49u0p0gvp7xw3n7shleVkprlBliGbIV2xign7oSDREfF5Sas46', 1),
(512233, '123154156', '1234341234b v', 11125, '$2y$07$ju9fvzy3yqjf0q4l38sqtuXpZ0fi4uEr88PGrkmMNUGWTc/XbTkge', 1),
(1231237, '190238459027369', '123123', 1123, '$2y$07$zhj2jjtoy7r019njty96vuXYzvTrteYUZCGmAKMEOVo0EHFYkR0nO', 1),
(1234567, 'Pedro', 'Martinez', 1234567, '$2y$07$olznqtqg9jnsofrgjvj01ebrfEklQr.ZgH7FNY3ycRvWGkqG.SOga', 1),
(6786757, '48898', '71787', 0, '$2y$07$0kiflrsijt88i7zx8yn79eSyAkUeQAH02l/NY3URYBawDlyMNDz8C', 1),
(7216903, 'Cristian', 'Mamani Cardozo', 76191403, '$2y$07$kmkl92zrp6upixlzzt9y6efplFD1bu2C1lBA850Oow4FYA1P2Fe4G', 1),
(9854312, '57', '754567', 0, '$2y$07$g8o4twsfni65x5qlfqpxzusk9wpa8uoZwuuaRk9hPtqtJ0IEWqpo2', 1),
(9876589, '12345678', '987654321', 123123123, '$2y$07$u1xois8m6g1l424kulvxiu55X21dIvcNm5Y9v4.swI1ZIxu3RbOpe', 1),
(12312691, 'asc4t5234', 'c5 2345c2c3', 123123, '$2y$07$w7y0p6120kxh4msm1h590ewSxo2mOEqlRKoj7p2YBj9mOeuTqwL.S', 1),
(78167867, '7516786+', '7816786', 0, '$2y$07$xglwv9u63wm58x26im696eS4RDMWEcCRVGklVn/GYewFCz/xmIN0i', 1),
(78941327, '459783', '789459', 0, '$2y$07$z2uvli58tulswgvihwiqhej6C9hXbzILz7j/tYB4WYiOXSRJ5AuK6', 1),
(456788994, '568908543', '12342568654', 123456678, '$2y$07$lx9gmku80gvinjwqt027reyLK/YDYU1EHTfnLRs8B6sFqnxmhauh6', 1),
(2147483647, '5378378', '378378378', 0, '$2y$07$s6xxwjw9k7fhxvgi2gl66uTNUr7da8SDr/bjbKike133FuTeoY462', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `ci_usu` int(11) NOT NULL,
  `ci_cli` int(11) NOT NULL,
  `coddet` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `ci_usu`, `ci_cli`, `coddet`, `total`, `fecha`, `estado`) VALUES
(1, 7216903, 132456, 0, '900', '2016-07-23', 1),
(2, 7216903, 546546, 1, '1200', '2016-07-23', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`coddet`,`ci_cli`),
  ADD UNIQUE KEY `imei` (`imei`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modelo` (`modelo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CI`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coddet` (`coddet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
