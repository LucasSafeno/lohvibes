-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03/02/2024 às 01:25
-- Versão do servidor: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lohvibes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acclevel`
--

CREATE TABLE `acclevel` (
  `idAcc` int(11) NOT NULL,
  `titleAcc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acclevel`
--

INSERT INTO `acclevel` (`idAcc`, `titleAcc`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Vendedor'),
(4, 'Estoque'),
(5, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `titleCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`idCategory`, `titleCategory`) VALUES
(1, 'Acessórios'),
(2, 'Bonés'),
(3, 'Fantasias'),
(4, 'Top'),
(5, 'Cropped'),
(6, 'Camisa'),
(7, 'Short'),
(8, 'Calça'),
(9, 'Hotpants'),
(10, 'Saias'),
(11, 'Copos'),
(12, 'Vestidos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `internalCode` int(7) NOT NULL,
  `nameProduct` varchar(100) NOT NULL,
  `descriptionProduct` varchar(200) NOT NULL,
  `priceProduct` varchar(7) NOT NULL,
  `dateCriation` date NOT NULL,
  `registrationDate` date NOT NULL,
  `quantityStock` int(5) NOT NULL,
  `idCategory` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `username`
--

CREATE TABLE `username` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(50) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `passwordUser` varchar(32) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dataRegistro` date NOT NULL,
  `dataNascimento` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(100) DEFAULT NULL,
  `idAcc` int(1) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `username`
--

INSERT INTO `username` (`idUser`, `nameUser`, `emailUser`, `passwordUser`, `telefone`, `dataRegistro`, `dataNascimento`, `active`, `photo`, `idAcc`) VALUES
(1, 'Lucas', 'lucas@email.com', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '0000-00-00', 1, NULL, 1),
(2, 'Lucas Gomes Tenório Cavalcanti', 'teste@email.com', 'b918f5d7e8350a33ed7f912591c1225e', '81997803781', '2024-02-01', '1994-10-14', 0, NULL, 3),
(3, 'Eysis Thauanna Santos Silva', 'eysis@email.com', '62ad0dc32fcfad1614ae0198df4aae16', '81997803781', '2024-02-01', '2000-05-09', 0, NULL, 1),
(4, 'Administrador', 'adm@email.com', 'e02c9eacb85dc8d6c0bad59edf645795', '12345678912', '2024-02-01', '1995-12-26', 0, NULL, 1),
(5, 'Vendedor', 'venda@email.com', 'e83a9a00b5ba04265941ced208f1285c', '56465412312', '2024-02-01', '1900-02-02', 0, NULL, 3),
(6, 'Teste', 'maisumteste@email.com', 'dc41e25cccba9562c05f2d7d1efc82ca', '56456456456', '2024-02-01', '1900-01-01', 0, NULL, 4),
(7, 'Usuario Estoque', 'usuario@estoque.com', '430c4a74cd35e1436fad932a30c88701', '12346568789', '2024-02-02', '2024-02-02', 0, NULL, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acclevel`
--
ALTER TABLE `acclevel`
  ADD PRIMARY KEY (`idAcc`);

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- Índices de tabela `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acclevel`
--
ALTER TABLE `acclevel`
  MODIFY `idAcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `username`
--
ALTER TABLE `username`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
