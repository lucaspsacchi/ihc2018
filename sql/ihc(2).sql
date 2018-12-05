-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Dez-2018 às 17:32
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
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `org`
--

INSERT INTO `org` (`id`, `nome`) VALUES
(1, 'ADMIN'),
(2, 'ATBCC'),
(3, 'CA Toca da Onça'),
(4, 'Cageos'),
(5, 'Caeps'),
(6, 'Caped'),
(7, 'CAEF'),
(8, 'CACTUS'),
(9, 'ATECAD'),
(10, 'AT Geral'),
(11, 'AT XXV de Maio'),
(12, 'AT Raça Brisão'),
(13, 'ATDFQM'),
(14, 'AT Lumberjack'),
(15, 'Share'),
(16, 'Enactus'),
(17, 'ABU'),
(18, 'CABCC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod`
--

CREATE TABLE IF NOT EXISTS `prod` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `preco` float NOT NULL,
  `img` varchar(150) NOT NULL,
  `qt_votos` int(11) NOT NULL,
  `aval` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prod`
--

INSERT INTO `prod` (`id`, `nome`, `descr`, `preco`, `img`, `qt_votos`, `aval`) VALUES
(1, 'Camisetas do Jorge', 'Bela camiseta', 10, 'example.jpg', 5, 5.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id_org` int(11) NOT NULL,
  `tel` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `id_org`, `tel`) VALUES
(3, 'Jorge', 'da Silva', 'jorge@hotmail.com', 'd67326a22642a324aa1b0745f2f17abb', 1, '1234-5678'),
(4, 'Valentina', 'da Silva', 'valentina@hotmail.com', 'ab3ab964804dc9ae20de3b02d379b1bd', 2, '54321-9876');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_prod`
--

CREATE TABLE IF NOT EXISTS `usu_prod` (
  `id_usu` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `org`
--
ALTER TABLE `org`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_org` (`id_org`);

--
-- Indexes for table `usu_prod`
--
ALTER TABLE `usu_prod`
  ADD PRIMARY KEY (`id_usu`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_usu` (`id_usu`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `org`
--
ALTER TABLE `org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_org_fk` FOREIGN KEY (`id_org`) REFERENCES `org` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usu_prod`
--
ALTER TABLE `usu_prod`
  ADD CONSTRAINT `id_prod_fk` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id`),
  ADD CONSTRAINT `id_usu_fk` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
