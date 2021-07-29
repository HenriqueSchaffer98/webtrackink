-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jul-2021 às 04:28
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webtrackink`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hist_link`
--

CREATE TABLE `hist_link` (
  `id` int(11) NOT NULL,
  `cod_http` varchar(100) DEFAULT NULL,
  `rest` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `link_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `url` varchar(300) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `link`
--

INSERT INTO `link` (`id`, `url`, `status`, `user_id`) VALUES
(1, 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=webtrackink&table=usuarios&pos=0', 1, 1),
(2, 'https://github.com/HenriqueSchaffer98/webtrackink', 0, 1),
(3, 'https://github.com/HenriqueSchaffer98/webtrackink', 1, 3),
(4, 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=webtrackink&table=usuarios&pos=0', 0, 3),
(5, 'https://www.google.com/search?q=google&oq=google&aqs=chrome.0.69i59j0i271j69i60l3j69i65j69i60.688j0j7&sourceid=chrome&ie=UTF-8', 1, 3),
(6, 'http://teste.com', 1, 3),
(7, 'https://mail.google.com/', 1, 3),
(10, 'https://www.google.com/search?q=google&oq=google&aqs=chrome.0.69i59j0i271j69i60l3j69i65j69i60.688j0j7&sourceid=chrome&ie=UTF-8', 1, 1),
(11, 'http://teste.com', 0, 1),
(12, 'https://mail.google.com/', 0, 1),
(13, 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=webtrackink&table=usuarios&pos=0', 1, 1),
(14, 'https://github.com/HenriqueSchaffer98/webtrackink', 1, 13),
(15, 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=webtrackink&table=usuarios&pos=0', 1, 13),
(16, 'https://www.google.com/search?q=google&oq=google&aqs=chrome.0.69i59j0i271j69i60l3j69i65j69i60.688j0j7&sourceid=chrome&ie=UTF-8', 1, 13),
(17, 'http://teste.com', 1, 13),
(18, 'https://github.com/HenriqueSchaffer98/webtrackink', 0, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Henrique Schaffer', 'henrique.schaffer', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'Pedro', 'pedro.o', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b'),
(12, 'Jones Schaffer', 'jones.schaffer', '9f1ccaa45f877d0b2616846320701f5d'),
(13, 'Ondina', 'ondina.s', 'dc480ae020896836de62848bf1921670');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `hist_link`
--
ALTER TABLE `hist_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `link_id` (`link_id`);

--
-- Índices para tabela `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `hist_link`
--
ALTER TABLE `hist_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `hist_link`
--
ALTER TABLE `hist_link`
  ADD CONSTRAINT `hist_link_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `hist_link_ibfk_2` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`);

--
-- Limitadores para a tabela `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
