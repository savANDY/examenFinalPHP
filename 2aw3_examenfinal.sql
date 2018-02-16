-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2018 a las 12:24:42
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2aw3_examenfinal`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarArticulo` (IN `pArticulo` VARCHAR(30), IN `pPrecio` INT(11), IN `pCategoria` INT(11))  NO SQL
INSERT INTO articulos (articulo, precio, idCategoria)
	VALUES (pArticulo, pPrecio, pCategoria)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCategoria` (IN `pCategoria` VARCHAR(30))  NO SQL
INSERT INTO categorias (categoria) VALUES (pCategoria)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCliente` (IN `pnombre` VARCHAR(30), IN `pApellido` VARCHAR(50), IN `pTelefono` VARCHAR(20))  NO SQL
BEGIN
INSERT INTO clientes (nombre, apellidos, telefono) VALUES (pnombre, pApellido, pTelefono);    
SELECT max(IdCliente) ultimoId FROM clientes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarClienteArticulo` (IN `pIdCliente` INT, IN `pIdArticulo` INT)  NO SQL
INSERT INTO clientes_articulos (idCliente, idArticulo) VALUES (pIdCliente, pIdArticulo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarArticulos` ()  NO SQL
SELECT idArticulo, articulo AS Articulo, precio AS Precio,
	   categoria AS Categoria,
       CONCAT(articulo, ' - ',precio, '€ - ', categoria) AS ArticuloDetalle
	FROM articulos
    	INNER JOIN categorias ON categorias.idCategoria
        = articulos.idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarCategorias` ()  NO SQL
Select idCategoria, categoria AS Categoria
	FROM categorias$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarClientes` ()  NO SQL
SELECT * FROM Clientes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarClientesArticulos` ()  NO SQL
SELECT c.IdCliente, c.Nombre, c.Apellidos, c.Telefono, GROUP_CONCAT(a.articulo) Articulos FROM clientes_articulos ca

LEFT JOIN articulos a on ca.idArticulo = a.idArticulo
LEFT JOIN clientes c on ca.idCliente = c.IdCliente

GROUP BY c.IdCliente$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fComprobarUsuario` (`pUsuario` VARCHAR(20), `pPassword` VARCHAR(50)) RETURNS TINYINT(1) NO SQL
BEGIN

DECLARE existeUsuario INT;

SET existeUsuario = 0;

SET existeUsuario = (SELECT COUNT(*) FROM usuarios where pUsuario = usuario AND pPassword = password);

RETURN existeUsuario;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `articulo` varchar(30) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `articulo`, `precio`, `idCategoria`) VALUES
(1, 'Portátil', 600, 4),
(2, 'Tablet', 200, 4),
(8, 'USB', 20, 4),
(9, 'Impresora', 60, 4),
(10, 'Pantalla', 150, 4),
(11, 'Adaptador', 4, 4),
(12, 'Ratón', 14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES
(1, 'Bebé'),
(2, 'Belleza'),
(3, 'Electrónica'),
(4, 'Informática'),
(5, 'Motor'),
(13, 'Hogar'),
(14, 'Ocio'),
(15, 'Outdoor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Apellidos`, `Telefono`) VALUES
(1, 'Xabier', 'Atutxa', '666 44 33 22'),
(2, 'Michael', 'Lasa', NULL),
(3, 'Unai', 'Etxebarria', '666 11 33 55'),
(4, 'Jon Ander', 'Pereda', '667 77 66 55'),
(5, 'aa', 'bb', 'cc'),
(6, 'Iñigo', 'Carrasco', '555 44 33 22'),
(8, 'Anabel', 'Sante', '444 333 222'),
(9, 'Borja', 'Manzano', '888777888'),
(10, 'Mikel', 'Marquez', '777 666 555'),
(11, 'test', 'test', '44455'),
(12, 'lll', 'lll', 'lll'),
(17, 'Mikel', 'Fernandez', '645636737'),
(18, 'Josu', 'Garai', '667891312'),
(19, 'Fernando', 'Goui', '222222222'),
(20, 'Iker', 'Tainta', '333333333'),
(21, 'Jon', 'Jaunarena', '444444444'),
(22, 'Andoni', 'Cedron', '999887744'),
(23, 'Oskar', 'Lasa', '111111111'),
(24, 'Prueba', 'TEST', '1232123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_articulos`
--

CREATE TABLE `clientes_articulos` (
  `idCliente` int(11) NOT NULL DEFAULT '0',
  `idArticulo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes_articulos`
--

INSERT INTO `clientes_articulos` (`idCliente`, `idArticulo`) VALUES
(10, 10),
(10, 11),
(12, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('xugarte', 'xugarte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `clientes_articulos`
--
ALTER TABLE `clientes_articulos`
  ADD PRIMARY KEY (`idCliente`,`idArticulo`),
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`,`password`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `clientes_articulos`
--
ALTER TABLE `clientes_articulos`
  ADD CONSTRAINT `clientes_articulos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_articulos_ibfk_2` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
