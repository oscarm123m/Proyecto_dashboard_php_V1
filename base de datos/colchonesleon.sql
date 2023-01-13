-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 20:47:16
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colchonesleon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `IdBodega` int(11) NOT NULL,
  `NombreB` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`IdBodega`, `NombreB`, `Direccion`) VALUES
(1, 'Bodega N°1', 'Bogota'),
(2, 'Bodega N°2', 'Tunja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IdCargo` int(11) NOT NULL,
  `NombreC` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`IdCargo`, `NombreC`) VALUES
(1, 'Gerente'),
(2, 'Secretaria'),
(3, 'Cliente'),
(4, 'Ingeniero'),
(5, 'Teniente11'),
(6, 'Teniente11'),
(7, 'Teniente11'),
(8, 'Teniente11'),
(9, 'Teniente11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratacion`
--

CREATE TABLE `contratacion` (
  `IdContratacion` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `FechaPago` date NOT NULL,
  `ValorTotal` float NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contratacion`
--

INSERT INTO `contratacion` (`IdContratacion`, `IdPersona`, `FechaPago`, `ValorTotal`, `Descripcion`) VALUES
(1, 1, '2018-10-06', 1000000, 'Pago del salario de 1 octubre hasta 6 de octubre 2018'),
(2, 2, '2018-10-06', 600000, 'Pago del salario de 1 octubre hasta 6 de octubre 2018'),
(17, 5, '2018-11-26', 2000000, 'jaskjhasfjh                  '),
(18, 5, '2018-11-26', 200, 'jaskjhasfjh                  '),
(19, 5, '2018-11-08', 1232340, 'dfsb ssd rg sg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `IdDetallePedido` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `Articulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `UnidadMedida` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ValorUnitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`IdDetallePedido`, `IdPedido`, `Articulo`, `Cantidad`, `UnidadMedida`, `ValorUnitario`) VALUES
(1, 1, 'Metanol', 20, 'Barriles de 50 litros', 250000),
(2, 2, 'Tela pilly', 50, 'paquete de 10 m2', 50000),
(3, 2, 'Alambre', 25, 'kilogramos', 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `IdDetalleVenta` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ValorUnitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`IdDetalleVenta`, `IdProducto`, `IdVenta`, `Cantidad`, `ValorUnitario`) VALUES
(1, 1, 1, 3, 410000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `IdEgresos` int(11) NOT NULL,
  `IdBodega` int(11) DEFAULT NULL,
  `NombreE` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `ValorTotal` float NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`IdEgresos`, `IdBodega`, `NombreE`, `Fecha`, `ValorTotal`, `Descripcion`) VALUES
(1, 1, 'Pago de arriendo', '2018-10-03', 500000, 'pago arriendo del 1 de septiembre a 1 de octubre 2018'),
(2, 2, 'Camara y comercio', '2018-10-03', 150000, 'pago de camara y comercio'),
(3, 1, 'agua', '2018-10-02', 60000, 'onces'),
(4, 1, 'agua', '2018-10-02', 60000, 'pago de ayer'),
(5, 1, 'dsavdvv', '2018-11-20', 758697, 'null'),
(6, 2, 'dsavdvvduyf', '2018-11-06', 119, 'null'),
(7, 1, 'dsavdvvduyf', '2018-11-04', 1664, 'nueva'),
(11, 2, 'Camara y Comercio', '2018-11-13', 135, 'pago de camara y comercio del aÃ±o 2018'),
(12, NULL, 'nada', '2018-11-15', 100, 'geifwuvbblaa'),
(13, NULL, 'PillowTop Resorte11', '2018-11-01', 6, 'gcwuhundoqwi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricacion`
--

CREATE TABLE `fabricacion` (
  `IdFabricacion` int(11) NOT NULL,
  `IdPro` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `fabricacion`
--

INSERT INTO `fabricacion` (`IdFabricacion`, `IdPro`, `Fecha`, `Cantidad`) VALUES
(1, 1, '2018-10-03', 10),
(2, 3, '2018-10-05', 5),
(3, 1, '2018-12-11', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `IdMantenimiento` int(11) NOT NULL,
  `IdVehiculo` int(11) DEFAULT NULL,
  `IdMaquinaria` int(11) DEFAULT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `ValorTotal` float NOT NULL,
  `Recurso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`IdMantenimiento`, `IdVehiculo`, `IdMaquinaria`, `Nombre`, `Descripcion`, `Fecha`, `ValorTotal`, `Recurso`) VALUES
(1, 1, NULL, 'Pago de impuesto', 'Pago de impuesto del año 2018', '2018-10-05', 520000, 'Vehiculo'),
(2, NULL, 2, 'Reparacion', 'cambio de motor ', '2018-10-09', 360000, 'Maquinaria'),
(3, NULL, 1, 'Cambio de rodamientos', 'se cambiaron los rodamientos de la destiladora', '2018-11-27', 120000, 'Maquinaria'),
(4, 1, NULL, 'Cambio de llantas', 'Cambio de todas las llantas', '2018-11-27', 2100000, 'Vehiculo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `IdMaquinaria` int(11) NOT NULL,
  `NombreMaq` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Marca` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`IdMaquinaria`, `NombreMaq`, `Marca`) VALUES
(1, 'Destiladora Industrial', 'Dewalt'),
(2, 'Taladro', 'Boss'),
(3, 'Podadora', 'Suzuki');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IdPago` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Abono` float NOT NULL,
  `Saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`IdPago`, `IdVenta`, `Fecha`, `Abono`, `Saldo`) VALUES
(1, 1, '2018-10-06', 1230000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IdPedido` int(11) NOT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `ValorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`IdPedido`, `IdProveedor`, `Fecha`, `ValorTotal`) VALUES
(1, 1, '2018-10-09', 5000000),
(2, 2, '2018-10-11', 3000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `IdPersona` int(11) NOT NULL,
  `IdCargo` int(11) NOT NULL,
  `NombreP` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Documento` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Contrasena` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estado` varchar(8) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`IdPersona`, `IdCargo`, `NombreP`, `Apellido`, `Documento`, `Telefono`, `Direccion`, `Usuario`, `Contrasena`, `Estado`) VALUES
(1, 1, 'Oscar Mauricio', 'Sanabria Mendoza', '1052359200', '3124801455', 'Tunja', 'oscar@gmail.com', '123', 'Activo'),
(2, 2, 'Sara', 'Sotelo', '1234567890', '3124576807', 'Tunja', 'SaraS@gmail.com', '123', 'Activo'),
(3, 3, 'Cristian', 'Zapata', '193492309', NULL, NULL, NULL, NULL, 'Activo'),
(5, 4, 'GegF', 'DVDFVD', '124324', '1213', 'gdavdvdv', 'dsfbv@dsd.b', 'dsfvaes', 'Activo'),
(6, 2, 'GegF', 'DVDFVD', '124324', '2341234', 'gdavdvdv', 'dsfbv@dsd.b', 'dsfvaes', 'Activo'),
(7, 5, 'hola', 'hola', '123', '123', 'hola', 'hola', 'hola', 'Inactivo'),
(8, 3, 'Rodrigo', 'Castro', '12', '2341234', '1', '', NULL, 'Activo'),
(9, 3, 'Juan David', 'Camargo', '65746', '32142', '', '', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombrePro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `IdTipo` int(11) NOT NULL,
  `Caracteristicas` text COLLATE utf8_spanish2_ci NOT NULL,
  `Medida` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `Altura` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `Garantia` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Existencias` int(11) NOT NULL,
  `ValorUnitario` float NOT NULL,
  `Ruta_Imagen` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombrePro`, `IdTipo`, `Caracteristicas`, `Medida`, `Altura`, `Garantia`, `Existencias`, `ValorUnitario`, `Ruta_Imagen`) VALUES
(1, 'PillowTop Cassata1', 1, 'Cassata 10 cm, 2 suavizantes 5 cm, 2 suavizantes 4 cm en tela yackard', '100cm', '32cm', '6 Años', 30, 410000, NULL),
(2, 'PillowTop Cassata1', 1, 'Cassata 10 cm, 2 suavizantes 5 cm, 2 suavizantes 4 cm en tela yackard', '120cm', '32cm', '6 Años', 160, 440000, NULL),
(3, 'PillowTop Cassata1', 1, 'Cassata 10 cm, 2 suavizantes 5 cm, 2 suavizantes 4 cm en tela yackard', '140cm', '32cm', '6 Años', 10, 460000, NULL),
(4, 'PillowTop Resorte1', 1, 'Base resortada, 2 suavisantes 5cm, 2 suavisantes 4cm en tela saltin', '100cm', '34cm', '3 Años', 30, 340000, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Telefono1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono2` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Regimen` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `Nombre`, `Nit`, `Direccion`, `Email`, `Telefono1`, `Telefono2`, `Regimen`) VALUES
(1, 'G&J', '156955601', 'Bucaramanga', NULL, '3125458596', '018000123414', 'Comun'),
(2, 'Efrain Velez', '121553', 'Bogota', 'EfrainVelez@gmail.com', '3145680230', '', 'Comun'),
(3, 'DIACO', '12', 'Paz del Rio', 'www.Diaco.com', '3020394', '', 'Comun'),
(4, 'General Electric', '12', 'Cali', 'general@gmail.com', '124', '53425', 'Simplificado'),
(5, 'General Electric', '154920391210', 'Cali', 'general@gmail.com', '124', '53425', 'Comun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `IdTipo` int(11) NOT NULL,
  `NombreT` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`IdTipo`, `NombreT`) VALUES
(1, 'Colchones'),
(2, 'Basecamas'),
(3, 'Espaldar1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `IdVehiculo` int(11) NOT NULL,
  `Marca` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Placa` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `Color` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`IdVehiculo`, `Marca`, `Placa`, `Color`, `Tipo`) VALUES
(1, 'Dodge', 'HGD340', 'Azul', 'Camioneta'),
(2, 'Toyota', 'KKL021', 'Blanco', 'Camion'),
(3, 'Chevrolet', 'DFQ350', 'Rojo', 'Automovil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ValorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdPersona`, `Fecha`, `ValorTotal`) VALUES
(1, 3, '2018-10-06', 1230000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`IdBodega`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`IdCargo`);

--
-- Indices de la tabla `contratacion`
--
ALTER TABLE `contratacion`
  ADD PRIMARY KEY (`IdContratacion`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`IdDetallePedido`),
  ADD KEY `IdPedido` (`IdPedido`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`IdDetalleVenta`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdVenta` (`IdVenta`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`IdEgresos`),
  ADD KEY `IdBodega` (`IdBodega`);

--
-- Indices de la tabla `fabricacion`
--
ALTER TABLE `fabricacion`
  ADD PRIMARY KEY (`IdFabricacion`),
  ADD KEY `IdProducto` (`IdPro`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`IdMantenimiento`),
  ADD KEY `IdVehiculo` (`IdVehiculo`),
  ADD KEY `IdMaquinaria` (`IdMaquinaria`);

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`IdMaquinaria`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IdPago`),
  ADD KEY `IdVenta` (`IdVenta`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `IdProveedor` (`IdProveedor`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IdPersona`),
  ADD KEY `IdCargo` (`IdCargo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdTipo` (`IdTipo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`IdTipo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`IdVehiculo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdPersona` (`IdPersona`),
  ADD KEY `IdPersona_2` (`IdPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `IdBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IdCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contratacion`
--
ALTER TABLE `contratacion`
  MODIFY `IdContratacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `IdDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `IdEgresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fabricacion`
--
ALTER TABLE `fabricacion`
  MODIFY `IdFabricacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `IdMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  MODIFY `IdMaquinaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `IdVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratacion`
--
ALTER TABLE `contratacion`
  ADD CONSTRAINT `contratacion_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `egresos_ibfk_1` FOREIGN KEY (`IdBodega`) REFERENCES `bodega` (`IdBodega`);

--
-- Filtros para la tabla `fabricacion`
--
ALTER TABLE `fabricacion`
  ADD CONSTRAINT `fabricacion_ibfk_1` FOREIGN KEY (`IdPro`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`IdMaquinaria`) REFERENCES `maquinaria` (`IdMaquinaria`),
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculo` (`IdVehiculo`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`IdCargo`) REFERENCES `cargo` (`IdCargo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdTipo`) REFERENCES `tipo` (`IdTipo`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
