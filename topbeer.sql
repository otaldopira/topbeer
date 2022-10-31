-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2022 às 19:53
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `topbeer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `razaoSocial` varchar(80) NOT NULL,
  `nomeFantasia` varchar(80) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `razaoSocial`, `nomeFantasia`, `CNPJ`, `telefone`, `email`) VALUES
(2, 'Antonella e Anderson ', 'Eletrônica ME', '11.891.8370/0019-4', '(19)2543-0289', 'suporte@eletronica.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `marca`, `categoria`, `quantidade`, `preco`, `descricao`, `imagem`) VALUES
(2, 'asssss', 'gsdgs', 'Cerveja', 232, 2414, 'gsdgsgsd', '/images/uploads/Screenshot_2.png'),
(3, 'gsdgsd', 'gsdgdsgsd', 'Cerveja', 2124, 2414, 'gsdgsdgsd', '/images/uploads/Screenshot_2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivelAutorizacao` tinyint(1) DEFAULT NULL,
  `bebumCoins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `CPF`, `celular`, `email`, `senha`, `nivelAutorizacao`, `bebumCoins`) VALUES
(3, 'Eduardo', 'Guimares', '10536569983', '42998143100', 'eric@gmail.com', '123', NULL, 0),
(4, 'Eric', 'Gustavo Denkievicz', '105.365.699-83', '(42)99814-3100', 'eric@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, 190),
(5, 'Argine', 'Borralho Nunes', '434.728.322-90', '(69)33396-818', 'argina.nunes@geradornv.com.br', 'd41d8cd98f00b204e9800998ecf8427e', 0, 5000),
(6, 'Elimar ', 'Monnerat Werneck', '681.169.654-09', '(87)97653-371', 'elimar.werneck@geradornv.com.br', 'caf1a3dfb505ffed0d024130f58c5cfa', 0, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
