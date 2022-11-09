-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2022 às 02:58
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
(2, 'Antonella', 'Eletrônica ME', '11.891.8370/0019-4', '(19)2543-0289', 'suporte@eletronica.com'),
(3, 'Benjamin e Kaique Limpeza Ltda', 'Limpeza Ltda', '34.524.7720/0014-4', '(11)3507-1561', 'posvenda@limpezaltda.com.br');

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
(6, 'Cerveja Stella Artois Long Neck', 'Stella Artois', 'Cerveja', 46, 5000, 'A Cerveja Stella Artois, carrega mais de 600 anos de tradição e é uma das marcas de cerveja mais conceituadas e antigas do mundo. A Stella Artois apresenta sua versão com baixo teor de glúten com um a', '/images/uploads/3.jpg'),
(7, 'Vinho Occhio Nero Chianti Superiore', 'Chianti Superiore', 'Vinho', 4, 180000, 'Vinho Occhio Nero Chianti Superiore D.O.C.G. 750 ml. Vinho italiano tinto, seco, D.O.C.G. ', '/images/uploads/4.jpg'),
(8, 'Cerveja Original Pilsen Lata 269ml', 'Original ', 'Cerveja', 12, 3400, 'Reconhecida por presevar sua essência, tradição e qualidade, a marca Original, criada em 1906, é considerada um clássico entre os apreciadores da bebida. Cerveja de tipo pilsen de cor clara, tem sabor', '/images/uploads/5.jpg'),
(9, 'Cerveja Corona Long Neck 330ml', 'Corona', 'Cerveja', 6, 6900, 'A Cerveja Corona é a mais vendida e a marca mais exportada do México. Esta cerveja do tipo Pilsen possui sabor leve de baixa graduação alcoólica. Corona é mais do que uma cerveja, é um estilo de vida.', '/images/uploads/6.jpg'),
(10, 'Whiskey Jack Daniels 1 L', 'Jack Daniels', 'Whisky', 6, 160000, 'Repousa nos barris do meio dos armazéns da destilaria, até que chegue ao ponto perfeito para se tornar um verdadeiro Tennessee Whiskey. Possui um sabor suave e marcante de madeira no início. Acompanha', '/images/uploads/7.jpg'),
(11, 'Whisky Johnnie Walker Red Label 1 L', 'Johnnie Walker', 'Whisky', 3, 90000, 'Whisky Johnnie Walker Red Label 1L. Whisky escocês. Johnnie Walker Red Label é produzido com os melhores ingredientes e a tradição da família Johnnie Walker. Tem uma seleção inigualável de maltes na s', '/images/uploads/8.jpg');

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
(1, 'ADM', 'MASTER', '012.345.678-90', '(42)99999-8888', 'adm@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 47500),
(2, 'Eric', 'Gustavo Denkievicz', '105.365.699-83', '(42)99814-3100', 'eric@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 5000),
(9, 'Bryan ', 'Severino Teixeira', '700.765.430-48', '(62)9948-2095', 'bryan_teixeira@galvao.com', '5e8667a439c68f5145dd2fcbecf02209', 0, 5000);

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
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_usuario`, `id_produto`, `valor`, `quantidade`, `data`) VALUES
(3, 1, 4, 5000, 4, '2022-11-04 00:22:42'),
(5, 1, 5, 5000, 2, '2022-11-04 00:26:54'),
(6, 1, 6, 5000, 1, '2022-11-04 00:26:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
