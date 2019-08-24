-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2017 às 21:00
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `voo`
--

CREATE TABLE `voo` (
  `id` int(11) NOT NULL,
  `eixo_x` float NOT NULL,
  `eixo_y` float NOT NULL,
  `raio` int(11) NOT NULL,
  `angulo` int(11) NOT NULL,
  `velocidade` float NOT NULL,
  `direcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `voo`
--

INSERT INTO `voo` (`id`, `eixo_x`, `eixo_y`, `raio`, `angulo`, `velocidade`, `direcao`) VALUES
(8, 2, 1, 2, 27, 0, 0),
(9, 2, 3, 4, 56, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voo`
--
ALTER TABLE `voo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voo`
--
ALTER TABLE `voo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
