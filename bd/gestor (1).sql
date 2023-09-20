-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 05:39:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caso`
--

CREATE TABLE `tb_caso` (
  `CASO_ID` int(11) NOT NULL,
  `NUMERO_CASO` varchar(10) NOT NULL,
  `PROPIETARIO_ID` int(11) DEFAULT NULL,
  `ORGANIZACION` varchar(50) DEFAULT NULL,
  `FECHA_INICIO_CASO` date DEFAULT NULL,
  `FECHA_CIERRE_CASO` date DEFAULT NULL,
  `ESTADO` varchar(50) NOT NULL,
  `DIRECCION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_caso`
--

INSERT INTO `tb_caso` (`CASO_ID`, `NUMERO_CASO`, `PROPIETARIO_ID`, `ORGANIZACION`, `FECHA_INICIO_CASO`, `FECHA_CIERRE_CASO`, `ESTADO`, `DIRECCION_ID`) VALUES
(21, '4544', NULL, 'prueba', '2023-09-14', '2023-10-05', 'ACTIVO', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `DEPARTAMENTO_ID` int(11) NOT NULL,
  `CODIGO_DEPARTAMENTO` int(11) DEFAULT NULL,
  `DEPARTAMENTO_NOMBRE` varchar(25) NOT NULL,
  `PAIS_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_departamento`
--

INSERT INTO `tb_departamento` (`DEPARTAMENTO_ID`, `CODIGO_DEPARTAMENTO`, `DEPARTAMENTO_NOMBRE`, `PAIS_ID`) VALUES
(3, 20, 'ESCUINTLA', 6),
(6, 20, 'Petén', 6),
(13, 633, 'el adelanto', 8),
(14, 26, 'prueba', 9),
(15, 22, 'ESCUINTLA', 5),
(16, 2, 'ESCUINTLA', 6),
(17, 20, 'Jutiapa', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_direcciones`
--

CREATE TABLE `tb_direcciones` (
  `DIRECCION_ID` int(11) NOT NULL,
  `NUMERO_CASO` varchar(15) NOT NULL,
  `NUMERO_OFICIO` varchar(12) NOT NULL,
  `CALLE` varchar(10) DEFAULT NULL,
  `AVENIDA` varchar(10) DEFAULT NULL,
  `NUMERO_CASA` varchar(10) DEFAULT NULL,
  `LUGARPOBLADO_ID` int(11) DEFAULT NULL,
  `ZONA` varchar(10) DEFAULT NULL,
  `MUNICIPIO_ID` int(11) DEFAULT NULL,
  `DEPARTAMENTO_ID` int(11) DEFAULT NULL,
  `PAIS_ID` int(11) DEFAULT NULL,
  `LATITUD` varchar(25) DEFAULT NULL,
  `LONGITUD` varchar(25) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `RUTA_IMAGEN` varchar(100) DEFAULT NULL,
  `MEDIDOR_ID` int(11) DEFAULT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_direcciones`
--

INSERT INTO `tb_direcciones` (`DIRECCION_ID`, `NUMERO_CASO`, `NUMERO_OFICIO`, `CALLE`, `AVENIDA`, `NUMERO_CASA`, `LUGARPOBLADO_ID`, `ZONA`, `MUNICIPIO_ID`, `DEPARTAMENTO_ID`, `PAIS_ID`, `LATITUD`, `LONGITUD`, `OBSERVACIONES`, `RUTA_IMAGEN`, `MEDIDOR_ID`, `USUARIO`, `FECHA_HORA`) VALUES
(12, '4544', '4446', '18 CALLE', '23 AVENIDA', '20 CASA', 1, 'ZONA 12', 1, 3, 5, '1200', '3000', '500', '../fotosDirecciones/defaultdireciones.png', 2, '14', '2023-09-19 05:57:58'),
(16, '4544', '5665', 's', 's', 's', 1, 's', 1, 3, 5, 'ss', 's', 'sss', '../fotosDirecciones/Logo Mastercell Negro.png', 2, '14', '2023-09-19 05:53:57'),
(17, '4544', '454', 'sdfas', 'dfads', 'adfas', 7, 'adfa', 1, 15, 7, 'adsfa', 'asfdas', 'adsfa', '../fotosDirecciones/LAPTOP.png', 2, '14', '2023-09-20 02:29:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_lugarespoblados`
--

CREATE TABLE `tb_lugarespoblados` (
  `LUGARPOBLADO_ID` int(11) NOT NULL,
  `LUGARPOBLADO_NOMBRE` varchar(25) NOT NULL,
  `TIPO_LUGARPOBLADO` varchar(50) NOT NULL,
  `RURALIDADES_LUGARPOBLADO` varchar(50) DEFAULT NULL,
  `MUNICIPIO_ID` int(11) NOT NULL,
  `LUGARPOBLADO_ZONAYCALLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_lugarespoblados`
--

INSERT INTO `tb_lugarespoblados` (`LUGARPOBLADO_ID`, `LUGARPOBLADO_NOMBRE`, `TIPO_LUGARPOBLADO`, `RURALIDADES_LUGARPOBLADO`, `MUNICIPIO_ID`, `LUGARPOBLADO_ZONAYCALLE`) VALUES
(1, 'Atescatempa', 'las delicias', 'area boscosa', 2, NULL),
(2, 'Atescatempa', 'las delicias', 'area boscosa', 2, ''),
(3, 'Atescatempa', 'las delicias', 'area boscosa', 2, NULL),
(4, 'Atescatempa', 'las delicias', 'area boscosa', 2, 'Zona 5 23 calle 2 avenida'),
(5, 'El cujito', 'rural', 'ninguna', 1, '0'),
(7, 's', 's', 's', 1, 's'),
(8, 's', 's', 's', 1, 's'),
(9, 's', 's', 's', 1, 's'),
(10, 's', 's', 's', 1, 's'),
(11, 's', 's', 's', 1, 's'),
(12, 's', 's', 's', 1, 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_medidorelectronico`
--

CREATE TABLE `tb_medidorelectronico` (
  `MEDIDOR_ID` int(11) NOT NULL,
  `NUMERO_CASO` varchar(15) NOT NULL,
  `MEDIDOR_NUMERO` varchar(20) NOT NULL,
  `EMPRESAELECTRICA` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_medidorelectronico`
--

INSERT INTO `tb_medidorelectronico` (`MEDIDOR_ID`, `NUMERO_CASO`, `MEDIDOR_NUMERO`, `EMPRESAELECTRICA`) VALUES
(2, '4544', 'AD-4523', 'DEGUATE'),
(3, '4444', '44', 'orsa'),
(4, '2222554545', 'ess', 'asdfa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipio`
--

CREATE TABLE `tb_municipio` (
  `MUNICIPIO_ID` int(11) NOT NULL,
  `CODIGOMUNICIPIO` int(11) NOT NULL,
  `MUNICIPIO_NOMBRE` varchar(50) NOT NULL,
  `DEPARTAMENTO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_municipio`
--

INSERT INTO `tb_municipio` (`MUNICIPIO_ID`, `CODIGOMUNICIPIO`, `MUNICIPIO_NOMBRE`, `DEPARTAMENTO_ID`) VALUES
(1, 11, 'san Jose acatempa', 13),
(2, 16, 'Quesada', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pais`
--

CREATE TABLE `tb_pais` (
  `PAIS_ID` int(11) NOT NULL,
  `CODIGO_PAIS` int(25) NOT NULL,
  `NOMBRE_PAIS` varchar(25) NOT NULL,
  `FECHA_CREACION` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_pais`
--

INSERT INTO `tb_pais` (`PAIS_ID`, `CODIGO_PAIS`, `NOMBRE_PAIS`, `FECHA_CREACION`) VALUES
(5, 502, 'Guatemala', '2023-07-31 04:56:11'),
(6, 503, 'El Salvador', '2023-07-31 04:56:45'),
(7, 504, 'El Honduras', '2023-07-31 04:56:54'),
(8, 505, 'Nicaragua', '2023-07-31 04:57:06'),
(9, 506, 'Costa Rica', '2023-07-31 04:57:15'),
(10, 507, 'Panamá', '2023-07-31 04:57:23'),
(15, 0, '5033', '2023-09-06 18:37:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_propietario`
--

CREATE TABLE `tb_propietario` (
  `PROPIETARIO_ID` int(11) NOT NULL,
  `NUMERO_CASO` varchar(15) NOT NULL,
  `NUMERO_OFICIO` varchar(12) NOT NULL,
  `NOMBRE1` varchar(25) NOT NULL,
  `NOMBRE2` varchar(25) DEFAULT NULL,
  `NOMBRE3` varchar(25) DEFAULT NULL,
  `APELLIDO1` varchar(25) NOT NULL,
  `APELLIDO2` varchar(25) DEFAULT NULL,
  `APELLIDO3` varchar(25) DEFAULT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `LUGAR_NACIMIENTO` varchar(25) NOT NULL,
  `TIPO_DOCUMENTO` varchar(30) DEFAULT NULL,
  `NUMERO_DOCUMENTO` varchar(50) DEFAULT NULL,
  `GENERO` varchar(1) NOT NULL,
  `NACIONALIDAD` varchar(25) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL,
  `NOMBRE_PADRE` varchar(50) NOT NULL,
  `NOMBRE_MADRE` varchar(50) NOT NULL,
  `NUMERO_CELULAR` varchar(15) DEFAULT NULL,
  `ALIAS` varchar(50) DEFAULT NULL,
  `RUTA_FOTO` varchar(100) DEFAULT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_propietario`
--

INSERT INTO `tb_propietario` (`PROPIETARIO_ID`, `NUMERO_CASO`, `NUMERO_OFICIO`, `NOMBRE1`, `NOMBRE2`, `NOMBRE3`, `APELLIDO1`, `APELLIDO2`, `APELLIDO3`, `FECHA_NACIMIENTO`, `LUGAR_NACIMIENTO`, `TIPO_DOCUMENTO`, `NUMERO_DOCUMENTO`, `GENERO`, `NACIONALIDAD`, `DIRECCION`, `NOMBRE_PADRE`, `NOMBRE_MADRE`, `NUMERO_CELULAR`, `ALIAS`, `RUTA_FOTO`, `FECHA_HORA`) VALUES
(75, '4544', '4444', 'Juan', 'Alberto', '', 'Orozco', 'Barrera', '', '1999-02-16', '452487', 'DPI', '64871234', 'M', 'Guatemalteca', 'San José Acatempa', 'Jacinto', 'Maria Odilia', '12345678', 's', '../fotosPersonas/NOTEBOOK.png', '2023-09-20 02:37:33'),
(76, '4544', '4555', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '2023-09-11', 's', 'DPI', 's', 'M', 's', 's', 's', 's', 's', 's', '../fotosPersonas/contactanos.webp', '2023-09-19 06:00:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vehiculo`
--

CREATE TABLE `tb_vehiculo` (
  `ID_VEHICULO` int(11) NOT NULL,
  `PROPIETARIO_ID` int(11) NOT NULL,
  `NUMERO_CASO` varchar(15) NOT NULL,
  `NUMERO_OFICIO` varchar(12) NOT NULL,
  `PLACA` varchar(10) NOT NULL,
  `TIPO_VEHICULO` varchar(50) NOT NULL,
  `MARCA_VEHICULO` varchar(50) NOT NULL,
  `LINEA_VEHICULO` varchar(50) NOT NULL,
  `MODELO_VEHICULO` varchar(50) NOT NULL,
  `COLOR_VEHICULO` varchar(50) NOT NULL,
  `NUMERO_CHASIS` varchar(15) NOT NULL,
  `NUMERO_MOTOR` varchar(15) NOT NULL,
  `FOTO_VEHICULO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_vehiculo`
--

INSERT INTO `tb_vehiculo` (`ID_VEHICULO`, `PROPIETARIO_ID`, `NUMERO_CASO`, `NUMERO_OFICIO`, `PLACA`, `TIPO_VEHICULO`, `MARCA_VEHICULO`, `LINEA_VEHICULO`, `MODELO_VEHICULO`, `COLOR_VEHICULO`, `NUMERO_CHASIS`, `NUMERO_MOTOR`, `FOTO_VEHICULO`) VALUES
(16, 75, '4544', '453', 'ADFASD', 'ADFA', 'ASDFA', 'ASDFA', 'ASDFA', 'ADSFA', 'ASDFA', 'ADFA', '../fotosVehiculos/carrito envio.jpg'),
(18, 75, '4544', '2222', 's', 's', 's', 's', 's', 's', '', '', '../fotosVehiculos/IPHONE.png'),
(19, 75, '4544', '1', 'a', 'd', 'd', 'd', 'd', 'd', '', '', '../fotosVehiculos/defaultvehiculo.png'),
(20, 75, '4544', '7777', 'EEE', 'EEE', 'EEE', 'EEE', 'EEE', 'EEE', '', '', '../fotosVehiculos/QUIENES SOMOS.png'),
(21, 75, '4544', '55', '5', '5', '5', '5', '5', '5', '', '', '../fotosVehiculos/contactanos.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `NUMERO_CASO` varchar(15) DEFAULT NULL,
  `NUMERO_OFICIO` int(12) NOT NULL,
  `ASUNTO` varchar(100) NOT NULL,
  `FECHA_OFICIO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id_archivo`, `id_usuario`, `nombre`, `tipo`, `ruta`, `fecha`, `NUMERO_CASO`, `NUMERO_OFICIO`, `ASUNTO`, `FECHA_OFICIO`) VALUES
(28, 14, 'contactanos.webp', 'webp', '../../archivos/14/contactanos.webp', '2023-09-06 12:04:54', '4544', 0, 'SSS', '2023-09-27'),
(29, 14, 'Logo PNC.jpeg', 'jpeg', '../../archivos/14/Logo PNC.jpeg', '2023-09-06 12:06:36', '4544', 0, 'S', '2023-09-12'),
(30, 14, 'IPHONE.png', 'png', '../../archivos/14/IPHONE.png', '2023-09-06 12:07:56', '4544', 0, 'R', '2023-09-28'),
(31, 14, 'Untitled.pdf', 'pdf', '../../archivos/14/Untitled.pdf', '2023-09-10 20:20:43', '45443', 785547, 'Prueba', '2023-09-23'),
(32, 14, 'BORRADOR DE MARCO TEÓRICO.pdf', 'pdf', '../../archivos/14/BORRADOR DE MARCO TEÓRICO.pdf', '2023-09-10 20:24:30', '4544', 48875, 'Prueba', '2023-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--
-- Error leyendo la estructura de la tabla gestor.t_categorias: #1932 - Table &#039;gestor.t_categorias&#039; doesn&#039;t exist in engine
-- Error leyendo datos de la tabla gestor.t_categorias: #1064 - Algo está equivocado en su sintax cerca &#039;FROM `gestor`.`t_categorias`&#039; en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `usuario` varchar(245) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `ROL` varchar(25) NOT NULL,
  `insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombre`, `fechaNacimiento`, `email`, `usuario`, `password`, `ROL`, `insert`) VALUES
(12, 'Facultad Autodidacta', '2019-12-05', 'facultad@gmail.com', 'facultad', 'f3773f4f53e9647ec64aafd8d2e606a6649882cf', '', '2019-12-05 15:29:04'),
(14, 'eduardo', '2023-07-10', 'eduardo@gmail.com', 'eduardo', 'ecfea8ce65b8930beba8867811fc144beb1a2a5d', 'ADMINISTRADOR', '2023-07-24 00:13:15'),
(15, 'pascual', '2023-08-17', 'pascual@gmail.com', 'pascual123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ADMINISTRADOR', '2023-08-29 14:59:41'),
(16, 'ojala', '2023-08-30', 'ojala@gmail.com', 'ojala123', 'ecfea8ce65b8930beba8867811fc144beb1a2a5d', 'USUARIOESTANDAR', '2023-08-29 15:02:00'),
(17, 'pruebita', '2023-08-17', 'pruebita@gmail.com', 'pruebita', 'c4cbda593a2e5b5fd9d09a25b40e708e3d3a9ecd', 'ADMINISTRADOR', '2023-08-29 19:52:31'),
(18, 'jaja', '2023-09-21', 'jaja@gmail.com', 'ja', '85bb31bc82b81b5ee5af60f6ef135ab1428132b4', 'ADMINISTRADOR', '2023-09-04 11:13:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_caso`
--
ALTER TABLE `tb_caso`
  ADD PRIMARY KEY (`CASO_ID`),
  ADD KEY `FK_PROPIETARIOCASO` (`PROPIETARIO_ID`),
  ADD KEY `FK_DIRECCIONES` (`DIRECCION_ID`);

--
-- Indices de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`DEPARTAMENTO_ID`),
  ADD KEY `TB_DEPARTAMENTO` (`PAIS_ID`);

--
-- Indices de la tabla `tb_direcciones`
--
ALTER TABLE `tb_direcciones`
  ADD PRIMARY KEY (`DIRECCION_ID`),
  ADD KEY `FK_LUGPOBLADO` (`LUGARPOBLADO_ID`),
  ADD KEY `FK_MUNICIPIOS` (`MUNICIPIO_ID`),
  ADD KEY `FK_DEPARTAMENTOS` (`DEPARTAMENTO_ID`),
  ADD KEY `FK_PAIS` (`PAIS_ID`),
  ADD KEY `FK_MEDIDOR` (`MEDIDOR_ID`);

--
-- Indices de la tabla `tb_lugarespoblados`
--
ALTER TABLE `tb_lugarespoblados`
  ADD PRIMARY KEY (`LUGARPOBLADO_ID`),
  ADD KEY `TB_LUGARESPOBLADOS` (`MUNICIPIO_ID`);

--
-- Indices de la tabla `tb_medidorelectronico`
--
ALTER TABLE `tb_medidorelectronico`
  ADD PRIMARY KEY (`MEDIDOR_ID`);

--
-- Indices de la tabla `tb_municipio`
--
ALTER TABLE `tb_municipio`
  ADD PRIMARY KEY (`MUNICIPIO_ID`),
  ADD KEY `TB_MUNICIPIO` (`DEPARTAMENTO_ID`);

--
-- Indices de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  ADD PRIMARY KEY (`PAIS_ID`);

--
-- Indices de la tabla `tb_propietario`
--
ALTER TABLE `tb_propietario`
  ADD PRIMARY KEY (`PROPIETARIO_ID`);

--
-- Indices de la tabla `tb_vehiculo`
--
ALTER TABLE `tb_vehiculo`
  ADD PRIMARY KEY (`ID_VEHICULO`);

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_caso`
--
ALTER TABLE `tb_caso`
  MODIFY `CASO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `DEPARTAMENTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_direcciones`
--
ALTER TABLE `tb_direcciones`
  MODIFY `DIRECCION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_lugarespoblados`
--
ALTER TABLE `tb_lugarespoblados`
  MODIFY `LUGARPOBLADO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_medidorelectronico`
--
ALTER TABLE `tb_medidorelectronico`
  MODIFY `MEDIDOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_municipio`
--
ALTER TABLE `tb_municipio`
  MODIFY `MUNICIPIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  MODIFY `PAIS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_propietario`
--
ALTER TABLE `tb_propietario`
  MODIFY `PROPIETARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `tb_vehiculo`
--
ALTER TABLE `tb_vehiculo`
  MODIFY `ID_VEHICULO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_caso`
--
ALTER TABLE `tb_caso`
  ADD CONSTRAINT `FK_DIRECCIONES` FOREIGN KEY (`DIRECCION_ID`) REFERENCES `tb_direcciones` (`DIRECCION_ID`),
  ADD CONSTRAINT `FK_PROPIETARIOCASO` FOREIGN KEY (`PROPIETARIO_ID`) REFERENCES `tb_propietario` (`PROPIETARIO_ID`);

--
-- Filtros para la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD CONSTRAINT `TB_DEPARTAMENTO` FOREIGN KEY (`PAIS_ID`) REFERENCES `tb_pais` (`PAIS_ID`);

--
-- Filtros para la tabla `tb_direcciones`
--
ALTER TABLE `tb_direcciones`
  ADD CONSTRAINT `FK_LUGPOBLADO` FOREIGN KEY (`LUGARPOBLADO_ID`) REFERENCES `tb_lugarespoblados` (`LUGARPOBLADO_ID`),
  ADD CONSTRAINT `FK_MEDIDOR` FOREIGN KEY (`MEDIDOR_ID`) REFERENCES `tb_medidorelectronico` (`MEDIDOR_ID`),
  ADD CONSTRAINT `FK_PAIS` FOREIGN KEY (`PAIS_ID`) REFERENCES `tb_pais` (`PAIS_ID`);

--
-- Filtros para la tabla `tb_lugarespoblados`
--
ALTER TABLE `tb_lugarespoblados`
  ADD CONSTRAINT `TB_LUGARESPOBLADOS` FOREIGN KEY (`MUNICIPIO_ID`) REFERENCES `tb_municipio` (`MUNICIPIO_ID`);

--
-- Filtros para la tabla `tb_municipio`
--
ALTER TABLE `tb_municipio`
  ADD CONSTRAINT `TB_MUNICIPIO` FOREIGN KEY (`DEPARTAMENTO_ID`) REFERENCES `tb_departamento` (`DEPARTAMENTO_ID`);

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
