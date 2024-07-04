-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2024 a las 05:29:37
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
-- Base de datos: `proyectouniversidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(15,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Yamaha MT 09', 'La Yamaha MT-09 (FZ-09 en América del Norte) es un motocicleta estándar de motor en línea tricilíndrica de 847 cc (51.7 cu en). Tiene el nuevo motor tipo \"desaxé\", un marco de aleación de aluminio, y horquilla invertida.', 59000000.00, '../img/mt09.webp'),
(2, 'Suzuki GSX-R750\r\n', 'La GSX-R750 es una motocicleta de la marca Suzuki, dentro de su serie de motos deportivas GSX-R. Fue la primera motocicleta de producción en serie que estuvo dotada de un chasis de doble cuna de aluminio en vez de los tradicionales de acero. Fue presentada en 1985, y puede ser considerada como una de las primeras réplicas de motos de competición, contando no solo con un aspecto similar a las motos de resistencia de Suzuki, sino también con parte de su tecnología, y todo ello a un precio asequible para el gran público.', 43000000.00, '../img/750.jpg'),
(3, 'Kawasaki H2R\r\n', 'La Kawasaki Ninja H2 es una motocicleta de clase \" superdeportiva sobrealimentada \" de la serie de motos deportivas Ninja fabricada por Kawasaki , que cuenta con un sobrealimentador centrífugo de velocidad variable .\r\n\r\nSu homónimo es la Kawasaki H2 Mach IV de 750 cc , una triple en línea que fue introducida por Kawasaki en 1972 para \"interrumpir lo que veía como un mercado de motocicletas dormido\".', 102000000.00, '../img/h2r.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE `sellers` (
  `idAdmin` int(15) DEFAULT NULL,
  `nameAdmin` varchar(50) DEFAULT NULL,
  `emailAdmin` varchar(30) DEFAULT NULL,
  `passwordAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sellers`
--

INSERT INTO `sellers` (`idAdmin`, `nameAdmin`, `emailAdmin`, `passwordAdmin`) VALUES
(NULL, NULL, 'admin@gmail.com', '$2y$10$OjUwtnnLz9KFApiUBS3y0OaX6lwhR49YY3j2fUTIDT.bbxhuyvG8S'),
(1013, 'Duvan', 'a@gmail.com', '$2y$10$scLus8OOPZbt4GC0LQYBYupn6sV1YCrFgD7fs4rMdHL7PjJfIWTyO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `cellPhoneNumber` varchar(10) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userDetails` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`cellPhoneNumber`, `userName`, `userEmail`, `userDetails`) VALUES
('2147483647', 'Duvan', 'v@gmail.com', 'Quiero comprar una moto ultima generacion'),
('2147483647', 's', 'v@gmail.com', 'ssss'),
('3144545940', 's', 'v@gmail.com', 'vwfreeeee'),
('3144545940', 'felipe', 'a@gmail.com', 'hola!! estoy interesado en comprar una moto, contactenme por favor'),
('', 'clientes', 'clientes@gmail.com', 'clientesprueabskanl jfnldaf'),
('3223', 'dsds', 'qedq@dfmf', 'adsads'),
('21212', 'sasa', 'wqwq@gmanosq', 'adsdadsd'),
('', 're', '9@gmail.com', 'r');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
