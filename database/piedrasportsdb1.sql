-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2024 a las 04:06:57
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
-- Base de datos: `piedrasportsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `DIRECCION` varchar(150) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `EMAIL`, `USUARIO`) VALUES
(2, 'martin', 'mora', 'Carrera 56 # 10', 'MartinM@gmail.com', 'martin'),
(16, 'kevin', 'quintero', 'Calle 21 sur N 69 c 46', 'kesantilozano05@gmail.com', 'martin'),
(18, 'kevin', 'lozano', 'Calle 21 sur N 69 c 46', 'kesantilozano05@gmail.com', 'kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID` int(11) NOT NULL,
  `PRECIO` float NOT NULL,
  `FECHA` datetime NOT NULL,
  `ESTADO` varchar(20) NOT NULL,
  `PROVEEDOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID`, `PRECIO`, `FECHA`, `ESTADO`, `PROVEEDOR`) VALUES
(1, 10000, '2024-02-29 00:00:00', 'activo', 1),
(2, 10000, '2024-03-06 00:00:00', 'activo', 1),
(4, 530000, '2024-03-12 00:00:00', 'activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `COMPRA_ID` int(11) NOT NULL,
  `PRODUCTO_ID` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `PRECIO_UNITARIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `PEDIDO_ID` int(11) NOT NULL,
  `PRODUCTO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

CREATE TABLE `detalle_producto` (
  `EMPLEADO_ID` int(11) NOT NULL,
  `PRODUCTO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuciones`
--

CREATE TABLE `distribuciones` (
  `ID` int(11) NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` datetime NOT NULL,
  `PEDIDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FECHA_INGRESO` datetime NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MOVIL` varchar(15) NOT NULL,
  `DIRECCION` varchar(150) NOT NULL,
  `USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID`, `NOMBRE`, `FECHA_INGRESO`, `EMAIL`, `MOVIL`, `DIRECCION`, `USUARIO`) VALUES
(1, 'kevin', '2024-02-20 17:21:59', 'Kevin@gmail.com', '3222144545', 'Calle 21 # 32', 'kevin'),
(2, 'martin', '2024-03-07 00:00:00', 'samuel@gmila.com', '3126548484', 'Calle 21 sur N 69 c 46', 'martin'),
(5, 'Laura ', '2024-03-08 00:00:00', 'laura@gmail.com', '3126548484', 'Calle 21 sur N 69 c 46', 'martin'),
(6, 'kevin', '2024-03-12 00:00:00', 'kesantilozano05@gmail.com', '3126548484', 'Calle 21 sur N 69 c 46', 'kevin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `pais`, `direccion`, `estado`, `cp`, `id_venta`) VALUES
(26, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 27),
(29, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 30),
(30, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 31),
(49, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 50),
(50, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 51),
(51, '8', 'Calle 21 sur N 69 c 46', 'Bogotá D.C.', '111111', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `metodo`, `id_venta`) VALUES
(3, 'paypal', 50),
(4, 'paypal', 51),
(5, 'paypal', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL,
  `FECHA_ENTREGA` datetime DEFAULT NULL,
  `FORMA_DE_PAGO` varchar(30) NOT NULL,
  `CLIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID`, `FECHA`, `CANTIDAD`, `DESCRIPCION`, `FECHA_ENTREGA`, `FORMA_DE_PAGO`, `CLIENTE`) VALUES
(1, '2024-02-20 17:24:51', 10, 'pedido exitoso', '2024-02-22 11:24:51', 'efectivo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `color`) VALUES
(4, 'zapatillas', 'melo puma', 125, 'melo.jpg', 50, 'Morado'),
(7, 'guayos', 'Nike mercurial', 110, 'guay.jpg.jpeg', 50, 'Rosado'),
(12, 'zapatillas', 'para corre larga duracion', 40, 'zapatillas.jpeg', 50, 'Negro y rojo'),
(16, 'Guantes de boxeo', 'Marca venom ', 52, 'box1.jpg', 50, 'Negro y Dorado'),
(25, 'Balon de Voley bool ', 'Echo de cuero de buen matrial ', 15, 'voly.jpg', 50, 'blanco con pintas verdes'),
(26, 'balon de basket golty ', 'echo en cuero de biuena  alidad', 65, 'balofiba.png', 50, 'cafe'),
(28, 'pesas', '4 libras', 8, 'mancuarna.jpeg', 50, 'negra'),
(29, 'mancuerna', '10 libras', 30, '4-LIBRAS.jpg', 50, 'rojo'),
(30, 'bate', 'Bate de beisbol', 26, 'bat.jpeg', 50, 'Plateado'),
(31, 'Balon de futbol', 'Marca Golty ', 50, 'balon.jpeg', 50, 'Blanco y verde'),
(32, 'Gafas natacion', 'Hydropulse Mirror Lente Dorado', 59, 'gafas.jpg', 50, 'negras lente dorado'),
(33, 'balon de basket ', 'Marca Wilson', 41, 'images.jpeg', 50, 'Naranja'),
(34, 'Balon futbol americano', 'Marca wilson NFL', 77, 'nfl.jpeg', 50, 'Cafe oscuro'),
(35, 'Raqueta', 'Raqueta de tenis ligera y versatil ', 64, 'raqueta.jpeg', 49, 'Negra y Azul'),
(36, 'Uniforme basketball', 'Equipo bulls', 100, 'bulls.jpeg', 50, 'Rojo y Blanco'),
(37, 'Uniforme basketball', 'Equipo de Lakers', 120, 'lakers.jpeg', 50, 'Amarillo y morado'),
(38, 'Uniforme Futbol', 'Uniiforme del Real Madrid', 110, 'real.jpg', 50, 'Blanco y dorado'),
(39, 'Uniforme Futbol', 'Uniiforme del manchester city', 140, 'city.jpg', 50, 'Azul'),
(40, 'Uniforme Futbol', 'Uniiforme del Millonarios', 90, 'millos.jpeg', 70, 'Azul y dorado'),
(41, 'Uniforme Futbol', 'Uniiforme del Nacional', 60, 'nacional.jpeg', 40, 'Verde y Blanco'),
(42, 'casco', 'casco para bicicleta', 50, 'casco.jpeg', 50, 'Gris'),
(43, 'bicicleta', 'Rin 28 marco talla M', 280, 'bici-azul.jpg', 14, 'Azul y Negro'),
(44, 'Canilleras', 'Proteccion para las canillas futbol', 30, 'canillera.jpeg', 49, 'Verde, Rojo, Amarillo'),
(45, 'Rodillera', 'Rodilleras para basketball', 60, 'rodillera.jpeg', 49, 'Negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 2, 55, 1, 230000, 230000),
(2, 2, 54, 1, 230000, 230000),
(3, 2, 1, 2, 200000, 400000),
(4, 3, 10, 1, 10000, 10000),
(5, 3, 27, 1, 530000, 530000),
(6, 4, 28, 1, 20000, 20000),
(7, 5, 24, 1, 250000, 250000),
(8, 6, 27, 1, 530000, 530000),
(9, 7, 27, 1, 530000, 530000),
(10, 7, 28, 1, 20000, 20000),
(11, 8, 28, 1, 20000, 20000),
(12, 9, 27, 1, 530000, 530000),
(13, 10, 25, 1, 50000, 50000),
(14, 11, 27, 1, 530000, 530000),
(15, 12, 27, 1, 530000, 530000),
(16, 13, 27, 1, 530000, 530000),
(17, 13, 25, 1, 50000, 50000),
(18, 14, 27, 1, 530000, 530000),
(19, 14, 22, 1, 53453, 53453),
(20, 15, 26, 1, 250000, 250000),
(21, 15, 25, 1, 50000, 50000),
(22, 16, 29, 1, 120000, 120000),
(23, 16, 26, 1, 250000, 250000),
(24, 17, 29, 1, 120000, 120000),
(25, 18, 27, 1, 530000, 530000),
(26, 19, 29, 1, 120000, 120000),
(27, 20, 26, 1, 250000, 250000),
(28, 21, 27, 1, 530000, 530000),
(29, 22, 29, 1, 120000, 120000),
(30, 23, 29, 1, 120000, 120000),
(31, 24, 20, 1, 10000, 10000),
(32, 25, 29, 1, 120000, 120000),
(33, 26, 27, 1, 530000, 530000),
(34, 27, 29, 1, 120000, 120000),
(35, 27, 27, 1, 530000, 530000),
(36, 28, 29, 1, 120000, 120000),
(37, 29, 29, 1, 120000, 120000),
(38, 30, 27, 1, 530000, 530000),
(39, 31, 26, 1, 250000, 250000),
(40, 32, 27, 1, 530000, 530000),
(41, 33, 24, 1, 250000, 250000),
(42, 34, 26, 1, 250000, 250000),
(43, 35, 27, 1, 530000, 530000),
(44, 36, 26, 1, 250000, 250000),
(45, 37, 27, 1, 530000, 530000),
(46, 38, 27, 2, 530000, 1060000),
(47, 39, 26, 1, 250000, 250000),
(48, 40, 29, 1, 120000, 120000),
(49, 41, 26, 1, 250000, 250000),
(50, 42, 26, 1, 250000, 250000),
(51, 43, 25, 1, 50000, 50000),
(52, 44, 26, 1, 250000, 250000),
(53, 45, 25, 1, 50000, 50000),
(54, 46, 25, 1, 50000, 50000),
(55, 47, 26, 1, 250000, 250000),
(56, 48, 26, 1, 250000, 250000),
(57, 49, 27, 1, 2568, 2568),
(58, 50, 35, 1, 64, 64),
(59, 51, 45, 1, 60, 60),
(60, 51, 44, 1, 30, 30),
(61, 52, 43, 1, 280, 280);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MOVIL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID`, `NOMBRE`, `EMAIL`, `MOVIL`) VALUES
(1, 'martin', 'martin@gmail.com', '3222144545'),
(2, 'kevin', 'kesantilozano05@gmail.com', '3126548484'),
(3, 'juan', 'juan@gmail.com', '3125486565');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID`, `NOMBRE`) VALUES
(1, 'administrador'),
(5, 'vendedor'),
(6, 'Cliente'),
(8, 'admin'),
(9, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `password`) VALUES
(50, 'kevinlozano', '3222141516', 'kesantilozano05@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(51, 'kevinlozano', '3222141516', 'kesantilozano05@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(52, 'kevinlozano', '3222141516', 'kesantilozano05@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `NOMBRE` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTRASENA` varchar(12) NOT NULL,
  `ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`NOMBRE`, `EMAIL`, `CONTRASENA`, `ROL`) VALUES
('admin', 'kesantilozano05@gmail.com', 'Kevin123.', 6),
('admin1', 'kesantilozano05@gmail.com', '$2y$10$Y1cly', 6),
('david', 'david@gmail.com', 'dav123', 1),
('em', 'em@gmail.com', '123456', 6),
('juan', 'juan@gmail.com', 'Juan1236.', 6),
('kevin', 'kesantilozano05@gmail.com', 'Kevin2812', 1),
('kevin1', 'kesantilozano05@gmail.com', 'kevin', 1),
('kevin111', 'kesantilozano05@gmail.com', '$2y$10$QVKCh', 6),
('kevin1111', 'kesantilozano05@gmail.com', '$2y$10$vKZl7', 6),
('kevin7', 'kesantilozano05@gmail.com', '$2y$10$rDDAL', 6),
('kevin78', 'kesantilozano05@gmail.com', '$2y$10$NLabY', 6),
('Laura ', 'laura@gmail.com', 'Laura1245.', 6),
('ma', 'ma@gmial.com', '$2y$10$MqIG7', 6),
('martin', '0', 'Martin45', 6),
('martin45', 'martin@gmail.com', '$2y$10$2MU1t', 6),
('proveedor', 'kesantilozano05@gmail.com', '$2y$10$kIoyg', 6),
('proveedor1', 'kesantilozano05@gmail.com', 'prov123', 6),
('qw', 'qw@gmail.com', '$2y$10$/Zlbx', 6),
('qwe', 'kesantilozano05@gmail.com', '$2y$10$F3Lwa', 6),
('samuel', 'samuel@gmila.com', 'samuel789', 1),
('sandra', 'kesantilozano05@gmail.com', '$2y$10$3ULmp', 6),
('sandra12', 'kesantilozano05@gmail.com', 'sandra123', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`, `status`) VALUES
(50, 50, 64, '2024-03-17 03:03:24', ''),
(51, 51, 90, '2024-03-17 03:03:46', ''),
(52, 52, 280, '2024-03-17 04:03:32', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USUARIO` (`USUARIO`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PROVEEDOR` (`PROVEEDOR`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`COMPRA_ID`,`PRODUCTO_ID`),
  ADD KEY `PRODUCTO_ID` (`PRODUCTO_ID`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD KEY `PEDIDO_ID` (`PEDIDO_ID`),
  ADD KEY `PRODUCTO_ID` (`PRODUCTO_ID`);

--
-- Indices de la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD KEY `EMPLEADO_ID` (`EMPLEADO_ID`),
  ADD KEY `PRODUCTO_ID` (`PRODUCTO_ID`);

--
-- Indices de la tabla `distribuciones`
--
ALTER TABLE `distribuciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PEDIDO` (`PEDIDO`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USUARIO` (`USUARIO`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CLIENTE` (`CLIENTE`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`NOMBRE`),
  ADD KEY `ROL` (`ROL`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `distribuciones`
--
ALTER TABLE `distribuciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuarios` (`NOMBRE`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`PROVEEDOR`) REFERENCES `proveedores` (`ID`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`COMPRA_ID`) REFERENCES `compras` (`ID`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`PEDIDO_ID`) REFERENCES `pedidos` (`ID`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD CONSTRAINT `detalle_producto_ibfk_1` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `empleados` (`ID`),
  ADD CONSTRAINT `detalle_producto_ibfk_2` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `distribuciones`
--
ALTER TABLE `distribuciones`
  ADD CONSTRAINT `distribuciones_ibfk_1` FOREIGN KEY (`PEDIDO`) REFERENCES `pedidos` (`ID`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuarios` (`NOMBRE`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`CLIENTE`) REFERENCES `clientes` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ROL`) REFERENCES `roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
