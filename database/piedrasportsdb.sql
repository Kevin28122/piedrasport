-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 21:47:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
-- Estructura de tabla para la tabla `distribucion`
--

CREATE TABLE `distribucion` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `PRECIO` float NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `NOMBRE` varchar(20) NOT NULL,
  `CONTRASENA` varchar(12) NOT NULL,
  `ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `ID` int(11) NOT NULL,
  `NUMERO` double NOT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL,
  `PEDIDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `PRECIO_TOTAL` float NOT NULL,
  `PRECIO_UNITARIO` float NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `FORMA_DE_PAGO` varchar(30) NOT NULL,
  `FECHA` datetime NOT NULL,
  `PEDIDO` int(11) NOT NULL,
  `EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PEDIDO` (`PEDIDO`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USUARIO` (`USUARIO`);

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
  ADD PRIMARY KEY (`ID`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`NOMBRE`),
  ADD KEY `ROL` (`ROL`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PEDIDO` (`PEDIDO`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PEDIDO` (`PEDIDO`),
  ADD KEY `EMPLEADO` (`EMPLEADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD CONSTRAINT `distribucion_ibfk_1` FOREIGN KEY (`PEDIDO`) REFERENCES `pedidos` (`ID`);

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

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`PEDIDO`) REFERENCES `pedidos` (`ID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`PEDIDO`) REFERENCES `pedidos` (`ID`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`EMPLEADO`) REFERENCES `empleados` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
