-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/04/2024 às 01:36
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lançamentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `lançamentos`
--

DROP TABLE IF EXISTS `lançamentos`;
CREATE TABLE IF NOT EXISTS `lançamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descrição` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` date NOT NULL,
  `fixa` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lançamentos`
--

INSERT INTO `lançamentos` (`id`, `descrição`, `valor`, `tipo`, `data`, `fixa`) VALUES
(19, 'ddddd', 7777.00, 'entrada', '2024-04-16', 'nao'),
(2, 'Salário', 5000.00, 'entrada', '2024-02-08', 'nao'),
(3, 'Depósito', 10000.00, 'entrada', '2024-02-08', 'nao'),
(4, 'saque', 4010.00, 'saida', '2024-02-08', 'nao'),
(12, 'aviao', 100000.00, 'saida', '2024-03-30', 'sim'),
(6, 'talão de água', 360.00, 'saida', '2024-02-21', 'não'),
(9, 'viagem', 60000.00, 'saida', '2024-04-25', 'não'),
(11, 'SPA', 1.50, 'saida', '2024-02-27', 'sim'),
(13, 'vale', 500.00, 'entrada', '2023-03-08', 'nao'),
(14, 'energia', 210.00, 'entrada', '2024-03-22', 'nao'),
(15, 'bonus', 300.00, 'entrada', '2024-01-07', 'sim'),
(16, 'Internet', 120.00, 'saida', '2024-03-25', 'sim');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
