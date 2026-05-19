-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2026 às 11:31
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_camisa`
--
CREATE DATABASE IF NOT EXISTS `db_camisa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_camisa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `camisa`
--

CREATE TABLE IF NOT EXISTS `tb_camisa` (
  `cd_camisa` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(50) DEFAULT NULL,
  `tamanho` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cd_camisa`) -- Corrigido aqui de 'id' para 'cd_camisa'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `camisa`
--

INSERT INTO `tb_camisa` (`cd_camisa`, `cor`, `tamanho`) VALUES
(1, 'Rosa', 'G'),
(2, 'Preto', 'M');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;