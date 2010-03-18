-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-03-2010 a las 00:24:58
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `meresidencio`
--

--
-- Volcar la base de datos para la tabla `alertas`
--


--
-- Volcar la base de datos para la tabla `calificaciones`
--


--
-- Volcar la base de datos para la tabla `cercanias`
--

INSERT INTO `cercanias` (`id`, `nombre`) VALUES
(1, 'Supermercado'),
(2, 'Centro Comercial'),
(3, 'Farmacia'),
(4, 'Parada de Bus'),
(6, 'Universidad'),
(7, 'Parada Bus Universitario'),
(8, 'Cyber Cafe');

--
-- Volcar la base de datos para la tabla `cercanias_publicaciones`
--


--
-- Volcar la base de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `estado_id`) VALUES
(1, 'San Juan de los Morros', 1),
(2, 'Chaguaramas', 1),
(3, 'El Socorro', 1),
(4, 'Guayabal', 1),
(5, 'Valle de la Pascua', 1),
(6, 'Las Mercedes', 1),
(7, 'El Sombrero', 1),
(8, 'Calabozo', 1),
(9, 'Altagracia de Orituco', 1),
(10, 'Ortiz', 1),
(11, 'Tucupido', 1),
(12, 'San José de Guaribe', 1),
(13, 'Santa María de Ipire', 1),
(14, 'Zaraza', 1);

--
-- Volcar la base de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Guarico');

--
-- Volcar la base de datos para la tabla `imagenes`
--


--
-- Volcar la base de datos para la tabla `publicaciones`
--


--
-- Volcar la base de datos para la tabla `publicaciones_servicios`
--


--
-- Volcar la base de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'Microonda'),
(2, 'Cocina'),
(3, 'Nevera'),
(4, 'TV por Cable'),
(5, 'Internet'),
(6, 'Baño'),
(7, 'Cama'),
(8, 'Estacionamiento'),
(9, 'A/Acondicionado'),
(10, 'Entrada independiente');

--
-- Volcar la base de datos para la tabla `tipoinmuebles`
--

INSERT INTO `tipoinmuebles` (`id`, `nombre`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Habitacion'),
(4, 'Apartamento Tipo Estudio'),
(5, 'Anexo');

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `clave`, `correo`, `nombre`, `apellido`, `fecha_nac`, `telefono`, `tipo`, `activo`, `estado_id`, `ciudad_id`, `zona_id`) VALUES
(1, 'admin', '1234', 'erickcion@gmail.com', 'Erick', 'Birbe', '1987-12-12', '04128663381', 1, 1, NULL, NULL, NULL);

--
-- Volcar la base de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `ciudad_id`, `nombre`) VALUES
(5, 1, 'Centro'),
(6, 1, 'Las Mercedes'),
(7, 1, 'Las Palmas'),
(8, 1, 'Valle Verde'),
(9, 1, 'Bella Vista'),
(10, 1, 'Vista El Morro'),
(11, 1, 'Puerto Rico'),
(12, 1, 'Puerta Negra'),
(13, 1, 'Felipe Acosta Carles'),
(15, 1, 'Deportivo'),
(16, 1, 'Los Morros'),
(17, 1, 'Los Placeres'),
(18, 1, 'Los Puentes'),
(19, 1, 'Urdaneta'),
(20, 1, 'El Delirio'),
(21, 1, 'Pueblo Nuevo'),
(22, 1, 'Antonio M. Martinez'),
(23, 1, 'La Morita'),
(24, 1, 'Teobaldo Mijares'),
(25, 1, 'Pasaje Los Baños'),
(26, 1, 'Los Baños'),
(27, 1, 'El Paraiso'),
(28, 1, 'Alejandro Tovar'),
(29, 1, 'Las Majaguas'),
(30, 1, 'Loma Linda'),
(31, 1, 'Ricardo Montilla'),
(32, 1, 'La Tropical'),
(33, 1, 'Romulo Gallegos, Urb.'),
(34, 1, 'Los Naranjos'),
(35, 1, 'Las Teresas'),
(36, 1, 'Fermin Toro'),
(37, 1, 'Manadero'),
(38, 1, 'Las Tejerias'),
(39, 1, 'Bicentenario'),
(40, 1, 'Los Telegrafistas'),
(41, 1, 'Pinto Salinas'),
(42, 1, 'Santa Rosa'),
(43, 1, 'Pedro Zaraza'),
(44, 1, 'Brisas del Pariapan'),
(45, 1, 'Brisas del Valle'),
(46, 1, '1ro de Mayo'),
(47, 1, 'Colinas del Pariapan'),
(48, 1, 'Santa Isabel'),
(49, 1, 'El Mahoma'),
(50, 1, 'Los Aguacates'),
(51, 1, 'San Jose'),
(52, 1, 'Los Astros'),
(53, 1, 'Los Maestros'),
(54, 1, '4 de Marzo'),
(55, 1, 'Junin'),
(56, 1, 'Barrialote'),
(57, 1, 'Jesus Bandres'),
(58, 1, 'San Nicolas'),
(59, 1, 'Isaias Medina Angarita'),
(60, 1, 'Los Laureles'),
(61, 1, 'El Jobo'),
(62, 1, 'La Victoria'),
(63, 1, 'Ma. de Los Angeles'),
(64, 1, 'El Aeropuerto'),
(65, 1, 'Campo Alegra'),
(66, 1, 'Loma Colorada'),
(67, 1, 'Loma Las Casitas');
