-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/12/2022 às 21:12
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `BD_CRUD`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cliente`
--

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` bigint(13) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pedido`
--

CREATE TABLE `Pedido` (
  `id` int(11) NOT NULL,
  `Cliente_id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Produto`
--

CREATE TABLE `Produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `fornecedor` varchar(80) NOT NULL,
  `quantidade` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Produto_has_Cliente`
--

CREATE TABLE `Produto_has_Cliente` (
  `Cliente_id` int(11) NOT NULL,
  `Produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_cliente` (`Cliente_id`);

--
-- Índices de tabela `Produto`
--
ALTER TABLE `Produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Produto_has_Cliente`
--
ALTER TABLE `Produto_has_Cliente`
  ADD KEY `fk_Produto_has_Cliente_Cliente` (`Cliente_id`),
  ADD KEY `fk_Produto_has_Cliente_Produto` (`Produto_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Produto`
--
ALTER TABLE `Produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`Cliente_id`) REFERENCES `Cliente` (`id`);

--
-- Restrições para tabelas `Produto_has_Cliente`
--
ALTER TABLE `Produto_has_Cliente`
  ADD CONSTRAINT `fk_Produto_has_Cliente_Cliente` FOREIGN KEY (`Cliente_id`) REFERENCES `Cliente` (`id`),
  ADD CONSTRAINT `fk_Produto_has_Cliente_Produto` FOREIGN KEY (`Produto_id`) REFERENCES `Produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
