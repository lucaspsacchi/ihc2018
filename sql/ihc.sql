-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09-Dez-2018 às 23:47
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
(1, 'Sem organização', ''),
(2, 'Atlética Raça Brisão', 'Atlética Ciência da Computação BCC Ciência de Computação Ciências da Computação Ciências de Computação'),
(3, 'CA Toca da Onça', 'Centro Acadêmico Engenharia Florestal CA EF'),
(4, 'Cageos', 'Centro Acadêmico Geografia CA GEO'),
(5, 'Caeps', 'Centro Acadêmico Engenharia de Produção CA EP'),
(6, 'Caped', 'Centro Acadêmico Pedagogia CA pedago'),
(7, 'CAEF', 'Centro Acadêmico Engenharia Florestal CA EF'),
(8, 'CACTUS', 'Centro Acadêmico Turismo CA TUR'),
(9, 'Atlética ECAD', 'Administração Economia Ciências Econômicas ADM ECO'),
(10, 'Atlética UFSCar Sorocaba', 'Atlética Geral'),
(11, 'Atlética XXV de Maio', 'Turismo TUR'),
(13, 'Atlética DFQM', 'Fisíca Química Matemática DFQM'),
(14, 'Atlética Lumberjack', 'Engenharia Florestal EF'),
(15, 'Share', 'Entidade'),
(16, 'Enactus', 'Entidade'),
(17, 'ABU', 'Entidade'),
(18, 'CA Pata do Bisão', 'Centro Acadêmico Ciência da Computação CA BCC CACCS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod`
--

CREATE TABLE IF NOT EXISTS `prod` (
  `id` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `preco` float NOT NULL,
  `img` varchar(150) NOT NULL,
  `qt_votos` int(11) NOT NULL,
  `aval` float NOT NULL,
  `mes` int(3) NOT NULL,
  `ano` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prod`
--

INSERT INTO `prod` (`id`, `id_org`, `nome`, `descr`, `preco`, `img`, `qt_votos`, `aval`, `mes`, `ano`) VALUES
(34, 2, 'Adesivo BCC', 'Um belo adesivo!', 5, '15443867645c0d78cc85030.jpg', 127, 3.48, 12, 2018),
(35, 2, 'Caneca e tirante BCC', 'Kit incrível', 15, '15443869045c0d79585536b.png', 41, 2.35, 12, 2018),
(36, 2, 'Boné Computação', 'Temos tamanho M, G e GG.', 29.99, '15443871595c0d7a57bca30.jpg', 185, 2.97, 12, 2018),
(37, 2, 'Camisa Atlética para Intercursos', 'Disponível em P, M, G e GG.', 24.99, '15443873285c0d7b0037c79.jpg', 63, 4.39, 12, 2018),
(38, 2, 'Camiseta BCC 2018', 'Disponível em P, M, G e GG.', 24.99, '15443879165c0d7d4c20f37.jpg', 173, 2.31, 12, 2018),
(39, 2, 'Camiseta Meninas de Computação', 'Disponivel em PP, P, M, G e GG.', 24.99, '15443884585c0d7f6a2f33c.jpg', 188, 2.36, 12, 2018),
(40, 2, 'Moletom Preto BCC', 'Disponível em P, M, G e GG.', 120, '15443885745c0d7fde6c25c.jpg', 130, 4.93, 12, 2018);

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
  `tel` varchar(15) NOT NULL,
  `mes` int(3) NOT NULL,
  `ano` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `id_org`, `tel`, `mes`, `ano`) VALUES
(36, 'Júlia', 'Farias', 'ju_farias@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', 12, 2018),
(37, 'Felipe', 'Souzaa', 'jorgebcc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '(11) 81224-5460', 10, 2018),
(38, 'Valentina', 'Ferreira', 'val12@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '(15) 99882-5315', 11, 2018),
(39, 'Raquel', 'Gomes', 'gomes.raquel@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '(16) 99812-7892', 12, 2018),
(40, 'Gustavo', 'Silva', 'gugalima@outlook.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '(11) 98173-5670', 12, 2018),
(41, 'Pedro', 'Carvalho', 'pedrocarvalho@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '(15) 99874-1250', 11, 2018);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_prod`
--

CREATE TABLE IF NOT EXISTS `usu_prod` (
  `id_usu` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usu_prod`
--

INSERT INTO `usu_prod` (`id_usu`, `id_prod`) VALUES
(37, 34),
(37, 35),
(38, 36),
(39, 37),
(40, 38),
(41, 39),
(41, 40);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orgP` (`id_org`) USING BTREE;

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orgU` (`id_org`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `id_org_fk_p` FOREIGN KEY (`id_org`) REFERENCES `org` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_org_fk_u` FOREIGN KEY (`id_org`) REFERENCES `org` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usu_prod`
--
ALTER TABLE `usu_prod`
  ADD CONSTRAINT `id_prod_fk` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id`),
  ADD CONSTRAINT `id_usu_fk` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
