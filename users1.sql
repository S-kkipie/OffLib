-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2023 a las 23:35:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `offlib`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users1`
--

INSERT INTO `users1` (`id`, `telefono`, `nombre`, `email`, `password`, `created_at`) VALUES
(19, '123121', 'hola', 'juan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-05-06 02:21:52'),
(20, '951112520', 'Skkippie Juan Rodriguez', 'adrianybrenda@gmail.com', '653e5cca6dce24aa68b26c59646272b6', '2023-05-06 03:55:18'),
(25, '379546852', 'Roberto Mamani Huanca', 'ksfguahgrfawuhfaw@gmail.com', '45a23f8eb5bad4b28daaac60e798ab12', '2023-06-10 22:38:51'),
(26, '951112520', 'Skkippie', 'skkippie@gmail.com', '653e5cca6dce24aa68b26c59646272b6', '2023-07-31 04:25:45'),
(27, '159753', 'Rogeiro', 'rogeiro@gmail.com', '7b3ab43ab1596e18ea880d17396dc864', '2023-08-31 00:55:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nombre`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
