-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/10/2025 às 14:27
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faeterj3dawmanha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Perguntas`
--

CREATE TABLE `Perguntas` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `id_multipla` int(8) NOT NULL,
  `id_objetiva` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Perguntas_Multiplas`
--

CREATE TABLE `Perguntas_Multiplas` (
  `id` int(8) NOT NULL,
  `pergunta` text NOT NULL,
  `a` text DEFAULT NULL,
  `b` text DEFAULT NULL,
  `c` text DEFAULT NULL,
  `d` text DEFAULT NULL,
  `e` text DEFAULT NULL,
  `correta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Perguntas_Objetivas`
--

CREATE TABLE `Perguntas_Objetivas` (
  `id` int(8) NOT NULL,
  `pergunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Perguntas_Objetivas`
--

INSERT INTO `Perguntas_Objetivas` (`id`, `pergunta`) VALUES
(1, 'aaaaaaaaa'),
(2, 'adadsa'),
(3, 'aaa');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Perguntas`
--
ALTER TABLE `Perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Perguntas_Multiplas`
--
ALTER TABLE `Perguntas_Multiplas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Perguntas_Objetivas`
--
ALTER TABLE `Perguntas_Objetivas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Perguntas_Multiplas`
--
ALTER TABLE `Perguntas_Multiplas`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Perguntas_Objetivas`
--
ALTER TABLE `Perguntas_Objetivas`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
