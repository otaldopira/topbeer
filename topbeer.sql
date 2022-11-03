-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2022 às 19:44
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
(2, 'Antonella', 'Eletrônica ME', '11.891.8370/0019-4', '(19)2543-0289', 'suporte@eletronica.com');

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
(4, 'Cerveja Heineken Long Neck ', 'Heineken ', 'Cerveja', 80, 5000, 'A cerveja Heineken Premium Pilsen Lager é uma cerveja premium criada na Holanda, produzida e fermentada com ingredientes de alta qualidade. É uma das cervejas mais famosas e vendidas do mundo e é bem ', '/images/uploads/1.jpg'),
(5, 'Cerveja Império Puro Malte Lata', 'Império ', 'Cerveja', 24, 2500, 'A Cerveja Império Puro Malte é uma cerveja do tipo pilsen, com coloração dourada, espuma encorpada e cremosa, um sabor destacado, intenso e leve amargor. Fabricada pela Cervejaria Cidade Imperial Petr', '/images/uploads/2.jpg'),
(6, 'Cerveja Stella Artois Long Neck', 'Stella Artois', 'Cerveja', 48, 5000, 'A Cerveja Stella Artois, carrega mais de 600 anos de tradição e é uma das marcas de cerveja mais conceituadas e antigas do mundo. A Stella Artois apresenta sua versão com baixo teor de glúten com um a', '/images/uploads/3.jpg'),
(7, 'Vinho Occhio Nero Chianti Superiore', 'Chianti Superiore', 'Vinho', 4, 180000, 'Vinho Occhio Nero Chianti Superiore D.O.C.G. 750 ml. Vinho italiano tinto, seco, D.O.C.G. ', '/images/uploads/4.jpg');

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
(7, 'Eric G', 'Gustavo Denkievicz', '105.365.699-83', '(42)99814-3100', 'eric@gmail.com', '5e8667a439c68f5145dd2fcbecf02209', 1, 67930),
(8, 'Maria ', 'Limeira Thomaz', '358.857.572-32', '(68)9945-2323', 'maria.thomaz@geradornv.com.br', '25d55ad283aa400af464c76d713c07ad', 0, 5000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`id_produto`),
  ADD KEY `usuario_id` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `produto_id` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
