-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_nuevo
-- Generation Time: Aug 30, 2024 at 04:30 AM
-- Server version: 8.0.38
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PokExamen`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemones`
--

CREATE TABLE `pokemones` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int NOT NULL,
  `puntos_de_salud` int NOT NULL,
  `ataque` int NOT NULL,
  `defensa` int NOT NULL,
  `velocidad` int NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemones`
--

INSERT INTO `pokemones` (`id`, `nombre`, `tipo`, `nivel`, `puntos_de_salud`, `ataque`, `defensa`, `velocidad`, `eliminado`, `url`, `created_at`, `updated_at`) VALUES
(6, 'Charmander', 'fuego', 10, 35, 55, 40, 90, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/5/56/latest/20200307023245/Charmander.png/300px-Charmander.png', '2024-08-29 21:07:09', '2024-08-30 03:13:18'),
(7, 'Bulbasaur', 'planta', 40, 11, 11, 40, 90, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/4/43/latest/20190406170624/Bulbasaur.png/300px-Bulbasaur.png', '2024-08-29 21:09:23', '2024-08-30 03:13:42'),
(9, 'Squirtle', 'agua', 29, 5, 4, 3, 6, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/e/e3/latest/20160309230820/Squirtle.png/300px-Squirtle.png', '2024-08-29 22:43:40', '2024-08-30 03:13:49'),
(12, 'Jigglypuff', 'normal', 98, 65, 43, 56, 90, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/a/af/latest/20150110232910/Jigglypuff.png/300px-Jigglypuff.png', '2024-08-30 02:26:10', '2024-08-30 03:13:59'),
(13, 'Meowth', 'normal', 56, 54, 34, 78, 64, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/9/99/latest/20160904210550/Meowth.png/300px-Meowth.png', '2024-08-30 02:27:40', '2024-08-30 03:14:08'),
(14, 'Psyduck', 'normal', 87, 65, 43, 67, 87, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/3/32/latest/20230614194705/Psyduck.png/300px-Psyduck.png', '2024-08-30 02:28:36', '2024-08-30 03:14:19'),
(15, 'Machop', 'lucha', 87, 65, 46, 89, 98, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/2/2b/latest/20230327203924/Machop.png/300px-Machop.png', '2024-08-30 02:28:57', '2024-08-30 03:14:33'),
(16, 'Geodude', 'roca', 67, 99, 45, 78, 98, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/1/12/latest/20230620061559/Geodude.png/300px-Geodude.png', '2024-08-30 02:29:22', '2024-08-30 03:14:45'),
(17, 'Magnemite', 'acero', 98, 65, 78, 90, 65, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/8/80/latest/20220228205623/Magnemite.png/300px-Magnemite.png', '2024-08-30 02:30:26', '2024-08-30 03:14:57'),
(18, 'Gastly', 'fantasma', 87, 66, 56, 98, 98, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/c/c1/latest/20230716212132/Gastly.png/300px-Gastly.png', '2024-08-30 02:30:48', '2024-08-30 03:15:17'),
(19, 'Eevee', 'normal', 56, 98, 65, 78, 65, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/f/f2/latest/20150621181400/Eevee.png/300px-Eevee.png', '2024-08-30 02:31:07', '2024-08-30 03:15:31'),
(20, 'Dratini', 'dragon', 87, 89, 89, 77, 87, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/9/99/latest/20230717180423/Dratini.png/300px-Dratini.png', '2024-08-30 02:31:28', '2024-08-30 03:16:09'),
(21, 'Pidgey', 'volador', 99, 89, 56, 23, 65, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/b/b7/latest/20200307022723/Pidgey.png/300px-Pidgey.png', '2024-08-30 02:31:48', '2024-08-30 03:15:41'),
(22, 'Zubat', 'siniestro', 65, 89, 78, 65, 32, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/6/67/latest/20230617053751/Zubat.png/300px-Zubat.png', '2024-08-30 02:32:15', '2024-08-30 03:18:38'),
(23, 'Oddish', 'planta', 89, 56, 45, 32, 12, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/d/d9/latest/20230617054434/Oddish.png/300px-Oddish.png', '2024-08-30 02:32:34', '2024-08-30 03:15:55'),
(24, 'Abra', 'psiquico', 89, 56, 54, 56, 89, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/f/f6/latest/20200411223435/Abra.png/300px-Abra.png', '2024-08-30 02:32:50', '2024-08-30 03:16:23'),
(25, 'Cubone', 'normal', 102, 89, 78, 89, 89, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/6/65/latest/20230716212229/Cubone.png/300px-Cubone.png', '2024-08-30 02:33:15', '2024-08-30 03:16:36'),
(26, 'Rhyhorn', 'roca', 99, 889, 89, 89, 89, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/3/36/latest/20230627050814/Rhyhorn.png/300px-Rhyhorn.png', '2024-08-30 02:33:35', '2024-08-30 03:17:03'),
(27, 'Magikarp', 'agua', 999, 89, 78, 1000, 89, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/0/01/latest/20230617053302/Magikarp.png/300px-Magikarp.png', '2024-08-30 02:33:52', '2024-08-30 03:16:45'),
(28, 'Arcanine', 'normal', 89, 65, 54, 65, 32, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/5/50/latest/20150621185018/Arcanine.png/300px-Arcanine.png', '2024-08-30 02:34:05', '2024-08-30 03:17:13'),
(29, 'Ditto', 'veneno', 65, 65, 89, 78, 57, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/0/03/latest/20230717180418/Ditto.png/300px-Ditto.png', '2024-08-30 02:34:27', '2024-08-30 03:18:10'),
(30, 'Yanma', 'bicho', 78, 54, 65, 31, 52, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/c/c4/latest/20140207190408/Yanma.png', '2024-08-30 02:34:48', '2024-08-30 03:17:46'),
(31, 'Umbreon', 'psiquico', 89, 65, 65, 64, 65, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/9/9f/latest/20230521191655/Umbreon.png/300px-Umbreon.png', '2024-08-30 02:35:04', '2024-08-30 03:17:33'),
(34, 'Pikachu', 'electrico', 89, 48, 787, 654, 54, 0, 'https://images.wikidexcdn.net/mwuploads/wikidex/thumb/7/77/latest/20150621181250/Pikachu.png/300px-Pikachu.png', '2024-08-30 03:13:09', '2024-08-30 03:13:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemones`
--
ALTER TABLE `pokemones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemones`
--
ALTER TABLE `pokemones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
