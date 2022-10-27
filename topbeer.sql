CREATE DATABASE topbeer;

CREATE TABLE `usuarios` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivelAutorizacao` tinyint(1) DEFAULT NULL
);

CREATE TABLE `parceiros`(
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT , 
  `razaoSocial` VARCHAR(80) NOT NULL , 
  `nomeFantasia` VARCHAR(80) NOT NULL , 
  `CNPJ` VARCHAR(18) NOT NULL , 
  `telefone` VARCHAR(14) NOT NULL , 
  `email` VARCHAR(100) NOT NULL 
);

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `CPF`, `celular`, `email`, `senha`, `nivelAutorizacao`) VALUES
(1, 'alo', 'fafas', '103', '42', 'eric@gmail.com', '123', NULL),
(2, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', NULL),
(3, 'Eduardo', 'Guimares', '10536569983', '42998143100', 'eric@gmail.com', '123', NULL),
(4, 'Eric', 'Gustavo Denkievicz', '105.365.699-83', '42998143100', 'eric@gmail.com', '123', 0);


