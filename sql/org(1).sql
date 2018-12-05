-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Dez-2018 às 22:13
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `org`
--

CREATE TABLE IF NOT EXISTS `org` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `alias` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `org`
--

INSERT INTO `org` (`id`, `nome`, `alias`) VALUES
(1, 'ADMIN', ''),
(2, 'Atlética Raça Brisão', 'Atlética Ciência da Computação BCC'),
(3, 'CA Toca da Onça', 'Centro Acadêmico Engenharia Florestal CA EF'),
(4, 'Cageos', 'Centro Acadêmico Geografia CA GEO'),
(5, 'Caeps', 'Centro Acadêmico Engenharia de Produção CA EP'),
(6, 'Caped', 'Centro Acadêmico Pedagogia CA pedago'),
(7, 'CAEF', 'Centro Acadêmico Engenharia Florestal CA EF'),
(8, 'CACTUS', 'Centro Acadêmico Turismo CA TUR'),
(9, 'Atlética ECAD', 'Administração Economia Ciências Econômicas ADM ECO'),
(10, 'Atlética UFSCar Sorocaba', 'Atlética Geral'),
(11, 'Atlética XXV de Maio', 'Turismo TUR'),
(12, 'Atlética Raça Brisão', 'Ciência da Computação BCC'),
(13, 'Atlética DFQM', 'Fisíca Química Matemática DFQM'),
(14, 'Atlética Lumberjack', 'Engenharia Florestal EF'),
(15, 'Share', 'Entidade'),
(16, 'Enactus', 'Entidade'),
(17, 'ABU', 'Entidade'),
(18, 'CACCS', 'Centro Acadêmico Ciência da Computação CA BCC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `org`
--
ALTER TABLE `org`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `org`
--
ALTER TABLE `org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
