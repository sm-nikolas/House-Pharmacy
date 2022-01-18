-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Jul-2021 às 07:04
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pharmacy`
--
CREATE DATABASE IF NOT EXISTS `pharmacy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharmacy`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numeroResi` int(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nomeCliente`, `cpf`, `cep`, `numeroResi`, `usuario`, `senha`, `tipo`) VALUES
(7, 'Caio Gabriel', '522.611.998-48', '13457-640', 309, 'caioGabriel', '202cb962ac59075b964b07152d234b70', 0),
(9, 'Nikolas Soares Moreira', '213.243.314-32', '13456-411', 640, 'nikolas', 'f1c850423b84da31b53eb4c354d03965', 0),
(10, 'adm', '491.468.098-05', '13456-411', 624, 'adm', '80177534a0c99a7e3645b52f2027a48b', 0),
(13, 'Adriano Imperador', '268.339.148-00', '13456-500', 47, 'Didico09', '202cb962ac59075b964b07152d234b70', 0),
(12, 'Asdrubal Swiks da Paz', '522.611.998-48', '13456-500', 47, 'DruDru', '202cb962ac59075b964b07152d234b70', 0),
(14, 'dsefedfg', '278.155.558-45', '13456-411', 86, 'f1', 'bd19836ddb62c11c55ab251ccaca5645', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `codItem` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `codPedido` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  PRIMARY KEY (`codItem`),
  KEY `codPedido` (`codPedido`),
  KEY `codProduto` (`codProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `codPedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`codPedido`),
  KEY `cpfCliente` (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `codProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(100) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `imagem` varchar(70) NOT NULL,
  PRIMARY KEY (`codProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codProduto`, `nomeProduto`, `preco`, `descricao`, `estoque`, `imagem`) VALUES
(1, 'Dipirona ', '6,65', 'Os efeitos analgÃ©sico e antitÃ©rmico podem ser... ', 71, 'dipirona.png'),
(2, 'Nimesulida ', '9,35', 'O medicamente age combatendo a inflamaÃ§Ã£o, dor e febre.', 44, 'nimesulida.png'),
(3, 'Dorflex 50', '17,90', ' DorflexÂ® age na dor e relaxa a tensÃ£o muscular ...', 55, 'dorflex.png'),
(4, 'Vitamina C ', '29,99', 'Bio-C + Zinco combina em sua fÃ³rmula a vitamina C...', 47, 'vitaminaC.png'),
(5, 'Protetor Solar Facial ', '89,90', 'A radiaÃ§Ã£o ultravioleta tipo A e B pode provocar...', 150, 'protetorSolar.png'),
(6, 'Pomada Kollagenase', '47,90', 'Kollagenase Pomada DermatolÃ³gica sem Cloranfenicol ...', 56, 'pomadinha.png'),
(7, 'Vitamina D ', '50,00', 'Addera D3 Ã© um suplemento de vitamina D... ', 411, 'vitaminaD.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
