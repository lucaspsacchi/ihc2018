-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09-Dez-2018 às 02:23
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prod`
--

INSERT INTO `prod` (`id`, `id_org`, `nome`, `descr`, `preco`, `img`, `qt_votos`, `aval`, `mes`, `ano`) VALUES
(18, 2, 'Camiseta de Computação', 'Feita com carinho!', 19.99, '15441994895c0a9d41af73e.jpg', 69, 4.26, 0, 0),
(19, 2, 'Caneca de Computação', 'Uma bela caneca!', 5.15, '15442031285c0aab78f2d75.jpg', 69, 2.5, 0, 0),
(20, 2, 'Caneca de Engenharia Florestal', 'Uma bela caneca!', 5.5, '15442031555c0aab93993f0.jpg', 194, 3.5, 0, 0),
(21, 2, 'Caneca de Produção', 'Uma bela caneca!', 5.35, '15442031755c0aaba7a7bcf.jpg', 17, 4.44, 0, 0),
(22, 2, 'Kit Bixo - Ciências Biológicas', 'Caneca, chaveiro, tirante e adesivo.', 25, '15442045375c0ab0f9c6381.jpg', 76, 4.38, 0, 0),
(23, 18, 'Caneca de Computação', 'Caneca do curso de Computação. 350 ml.', 15, '15442085495c0ac0a548610.jpg', 200, 4.84, 0, 0),
(24, 2, 'Samba', 'Tamanhos P M G\r\nFeminina e Masculina', 30, '15442092325c0ac3507b0a7.jpg', 298, 4.75, 0, 0),
(25, 2, 'linguiça toscana sadia', 'diretamente da fabrica', 0, '15442095885c0ac4b4700ae.jpg', 111, 4.14, 0, 0),
(26, 2, 'Jogo do Gamedev', 'Joguinho top', 10, '15442101905c0ac70e9ac22.jpg', 89, 4.33, 0, 0),
(27, 2, 'Brenão', 'Menino comportado', 100, '15442140355c0ad61316aef.jpg', 60, 4.15, 0, 0),
(28, 15, 'Camisetas Share', 'Temos tamanho P, M, G.', 25, '15442160775c0ade0d30e33.jpg', 13, 4.11, 0, 0),
(31, 2, 'atchim', 'opa', 12.92, '15443025005c0c2fa4af34d.jpg', 138, 4.52, 12, 2018),
(32, 5, 'asdasda', 'asdasda', 23.65, '15443207625c0c76fa4e0b1.jpg', 135, 1.96, 12, 2018),
(33, 5, 'dddddddd', 'dsadsa', 12, '15443207715c0c7703ce8f9.jpg', 50, 1.98, 12, 2018);

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
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `id_org`, `tel`) VALUES
(3, 'Jorge', 'Silva', 'jorge@hotmail.com', 'd67326a22642a324aa1b0745f2f17abb', 1, '(01) 1234-5678'),
(4, 'Valentina', 'Silva', 'valentina@hotmail.com', 'ab3ab964804dc9ae20de3b02d379b1bd', 2, '(15) 11111-2222'),
(24, 'Gustavo', 'Barbosa', 'contato.gustavobarbosa@outlook.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, ''),
(25, 'Igsson', 'tamanho', 'guaxinimassassino@ig.com', 'e10adc3949ba59abbe56e057f20f883e', 1, ''),
(26, 'Gabriel Eiji', 'Uema Marti', 'eijiuema@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 1, ''),
(27, 'Thiago', 'Uehara', 'thiago.uehara@dcomp.sor.ufscar.br', 'e13dd027be0f2152ce387ac0ea83d863', 1, ''),
(28, 'Thaina ', 'Almeida', 'thainasantana390@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 18, '(12) 12345-0666'),
(29, 'Artur', 'Ribeiro', 'artur.felipe.ribeiro2010@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 2, '(11) 45896-7328'),
(30, 'Giuliano ', 'Crespe', 'gcrespe3@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 2, '(11)97627-9861'),
(31, 'Anderson', 'Garrote', 'ander.user@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 2, '(15)9999-9888'),
(32, 'Michael', 'Santos', 'michael-santos@outlook.com.br', 'ac97e760fc9cd6505aab43199427bd32', 1, ''),
(33, 'Michael', 'Santos', 'michael-santos12@outlook.com.br', 'd41d8cd98f00b204e9800998ecf8427e', 2, '(15) 1234-4321'),
(34, 'Breno Vinicius ', 'Viana de Oliveira', 'brenu97@gmail.com', '73e3f8a177fedb64f0c256a228e4eac9', 1, ''),
(35, 'Vinicius', 'Silva Salinas', 'vinicius@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 15, '(15) 98805-8886');

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
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(28, 23),
(29, 24),
(30, 25),
(31, 26),
(33, 27),
(35, 28),
(4, 31);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
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
