-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2021 às 04:23
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grupo01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amostra`
--

CREATE TABLE `amostra` (
  `amostra_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `encaminhamento` int(11) DEFAULT NULL,
  `formaenvio` int(11) DEFAULT NULL,
  `especie` int(11) DEFAULT NULL,
  `materialrecebido` int(11) DEFAULT NULL,
  `acondicionamento` int(11) DEFAULT NULL,
  `condicaomaterial` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `nomeproprietario` text DEFAULT NULL,
  `cepproprietario` text DEFAULT NULL,
  `emailproprietario` text DEFAULT NULL,
  `cidadeproprietario` text DEFAULT NULL,
  `estadoproprietario` text DEFAULT NULL,
  `telefoneproprietario` text DEFAULT NULL,
  `observacaoproprietario` text DEFAULT NULL,
  `nomeveterinario` text DEFAULT NULL,
  `crmvveterinario` text DEFAULT NULL,
  `emailveterinario` text DEFAULT NULL,
  `telefoneveterinario` text DEFAULT NULL,
  `observacaoveterinario` text DEFAULT NULL,
  `propriedade` int(11) DEFAULT NULL,
  `totalanimais` int(11) DEFAULT NULL,
  `animaisacometidos` int(11) DEFAULT NULL,
  `criacao` int(11) DEFAULT NULL,
  `suspeita` text DEFAULT NULL,
  `observacaoclinica` text DEFAULT NULL,
  `enderecoproprietario` varchar(255) DEFAULT NULL,
  `data_registro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amostra`
--

INSERT INTO `amostra` (`amostra_id`, `status`, `encaminhamento`, `formaenvio`, `especie`, `materialrecebido`, `acondicionamento`, `condicaomaterial`, `data`, `observacao`, `nomeproprietario`, `cepproprietario`, `emailproprietario`, `cidadeproprietario`, `estadoproprietario`, `telefoneproprietario`, `observacaoproprietario`, `nomeveterinario`, `crmvveterinario`, `emailveterinario`, `telefoneveterinario`, `observacaoveterinario`, `propriedade`, `totalanimais`, `animaisacometidos`, `criacao`, `suspeita`, `observacaoclinica`, `enderecoproprietario`, `data_registro`) VALUES
(35, 1, 1, 1, 1, 0, 2, 2, '2021-05-15', '', 'fdsfsdfsdf', 'fsdfsdfsd', 'fsdfsdfsdfsd', 'dfsdfsdfs', 'dfsdf', 'sdfsdfsdf', 'sdfsdfsdfsd', 'fsdfsdfsd', 'fsdfsdf', 'sdfsdfsd', 'fsdfs', 'sdfdsfsdf', 0, 0, 0, 1, 'fsdfsdf', 'fsdfsd', 'fsdfsdfsd', '2021-05-01'),
(36, 1, 0, 0, 2, 8, 2, 1, '', 'gfdgfdsgdfdg', 'gfdsgg', 'gdfgd', 'fgfdg', 'dfgdfg', 'fdgdf', 'gdfgdf', 'gdfgdfg', 'gdfg', 'dgdgdfg', 'dfg', 'fddg', 'dfgdfgdfgd', 2, 0, 0, 2, 'fdgdfgsg', 'fdsgdfg', 'dfgdfg', '2021-05-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amostra_qtd`
--

CREATE TABLE `amostra_qtd` (
  `amostra_qtd_id` int(11) NOT NULL,
  `identificador` text DEFAULT NULL,
  `amostra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amostra_qtd`
--

INSERT INTO `amostra_qtd` (`amostra_qtd_id`, `identificador`, `amostra_id`) VALUES
(56, 'fdsfa', 35),
(57, 'fdsfsd', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `exame_id` int(11) NOT NULL,
  `tecnica_tratamento_id` int(11) NOT NULL,
  `valor` text DEFAULT NULL,
  `amostra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`exame_id`, `tecnica_tratamento_id`, `valor`, `amostra_id`) VALUES
(38, 10, '222', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `log_activity_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `action` varchar(200) NOT NULL,
  `action_type` varchar(255) DEFAULT NULL,
  `view_id` int(11) DEFAULT NULL,
  `funcionalidade` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`log_activity_id`, `user_id`, `date`, `ip_address`, `action`, `action_type`, `view_id`, `funcionalidade`, `time`) VALUES
(71, 1, '2021-04-30', '::1', '[Administrador Geral] mudou algumas informações sobre <Amostra>', 'update', NULL, 'Amostra', '23:29:51'),
(72, 1, '2021-04-30', '::1', '[Administrador Geral] mudou algumas informações sobre <Amostra>', 'update', NULL, 'Amostra', '23:30:02'),
(73, 1, '2021-04-30', '::1', '[Administrador Geral] mudou algumas informações sobre <Amostra>', 'update', NULL, 'Amostra', '23:50:56'),
(74, 1, '2021-05-01', '::1', '[Administrador Geral] inseriu um novo registro em <Amostra>', 'insert', NULL, 'Amostra', '20:47:46'),
(75, 1, '2021-05-01', '::1', '[Administrador Geral] mudou algumas informações sobre <Amostra>', 'update', NULL, 'Amostra', '20:48:05'),
(76, 1, '2021-05-01', '::1', '[Administrador Geral] inseriu um novo registro em <Exame>', 'insert', NULL, 'Exame', '20:48:32'),
(77, 1, '2021-05-01', '::1', '[Administrador Geral] excluiu um registro em <Amostra>', 'delete', NULL, 'Amostra', '20:49:07'),
(78, 1, '2021-05-01', '::1', '[Administrador Geral] inseriu um novo registro em <Amostra>', 'insert', NULL, 'Amostra', '20:49:38'),
(79, 1, '2021-05-01', '::1', '[Administrador Geral] inseriu um novo registro em <Exame>', 'insert', NULL, 'Exame', '20:49:57'),
(80, 1, '2021-05-01', '::1', 'Administrador Geral excluiu um registro de Amostra', 'delete', NULL, 'Amostra', '21:21:10'),
(81, 1, '2021-05-01', '::1', 'Administrador Geral inseriu um novo registro de Amostra', 'insert', NULL, 'Amostra', '21:30:02'),
(82, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Vacina', 'update', NULL, 'Vacina', '21:30:16'),
(83, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Amostra', 'update', NULL, 'Amostra', '22:37:59'),
(84, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Amostra', 'update', NULL, 'Amostra', '22:38:04'),
(85, 1, '2021-05-01', '::1', 'Administrador Geral inseriu um novo registro de Amostra', 'insert', NULL, 'Amostra', '22:38:39'),
(86, 1, '2021-05-01', '::1', 'Administrador Geral excluiu um registro de Amostra', 'delete', NULL, 'Amostra', '22:40:32'),
(87, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Vacina', 'update', NULL, 'Vacina', '22:46:21'),
(88, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Cobranças dos Exames', 'update', NULL, 'Cobranças dos Exames', '22:47:16'),
(89, 1, '2021-05-01', '::1', 'Administrador Geral mudou algumas informações sobre Cobranças dos Exames', 'update', NULL, 'Cobranças dos Exames', '22:47:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_exame`
--

CREATE TABLE `resultado_exame` (
  `resultado_exame_id` int(11) NOT NULL,
  `exame_id` int(11) NOT NULL,
  `amostra_qtd_id` int(11) NOT NULL,
  `resultado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resultado_exame`
--

INSERT INTO `resultado_exame` (`resultado_exame_id`, `exame_id`, `amostra_qtd_id`, `resultado`) VALUES
(44, 38, 56, ' fsdfsadf'),
(45, 38, 57, ' asdfsddfdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnica`
--

CREATE TABLE `tecnica` (
  `tecnica_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tecnica`
--

INSERT INTO `tecnica` (`tecnica_id`, `nome`) VALUES
(1, 'Soroneutralização'),
(2, 'Ensaio de Imunoabsorção Enzimática'),
(3, 'Reação em Cadeia da Polimerase'),
(4, 'Imunocromatografia'),
(5, 'Imunofluorescência'),
(6, 'Inibição da Hemaglutinação'),
(7, 'Isolamento Viral'),
(8, 'Imunodifusão em Gel de Agar'),
(9, 'Microscopia Eletrônica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnica_tratamento`
--

CREATE TABLE `tecnica_tratamento` (
  `tecnica_tratamento_id` int(11) NOT NULL,
  `tecnica_id` int(11) NOT NULL,
  `tratamento_id` int(11) NOT NULL,
  `valor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tecnica_tratamento`
--

INSERT INTO `tecnica_tratamento` (`tecnica_tratamento_id`, `tecnica_id`, `tratamento_id`, `valor`) VALUES
(1, 1, 1, '3333'),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 1, 4, NULL),
(5, 2, 1, NULL),
(6, 2, 2, NULL),
(7, 2, 5, NULL),
(8, 3, 1, NULL),
(9, 3, 2, NULL),
(10, 3, 6, NULL),
(11, 3, 3, NULL),
(12, 3, 7, NULL),
(13, 3, 8, NULL),
(14, 3, 9, NULL),
(15, 3, 10, NULL),
(16, 4, 6, NULL),
(17, 4, 11, NULL),
(18, 5, 12, NULL),
(19, 6, 13, NULL),
(20, 7, 1, NULL),
(21, 7, 2, NULL),
(22, 7, 14, NULL),
(23, 7, 15, NULL),
(24, 8, 5, NULL),
(25, 9, 16, NULL),
(26, 9, 17, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `tratamento_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tratamento`
--

INSERT INTO `tratamento` (`tratamento_id`, `nome`) VALUES
(1, 'BVDV'),
(2, 'IBR'),
(3, 'EHV'),
(4, 'EAV'),
(5, 'LEB'),
(6, 'CDV'),
(7, 'AIE'),
(8, 'FCM'),
(9, 'BoHV-5'),
(10, 'ORFV'),
(11, 'FIV/FELV'),
(12, 'RABV'),
(13, 'Influenza equina'),
(14, 'CPV'),
(15, 'BRSV'),
(16, 'Coronavírus'),
(17, 'Rotavírus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE `vacina` (
  `vacina_id` int(11) NOT NULL,
  `data_conclusao` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `qtd_vacinas` int(11) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `amostra_id` int(11) DEFAULT NULL,
  `peso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vacina`
--

INSERT INTO `vacina` (`vacina_id`, `data_conclusao`, `status`, `qtd_vacinas`, `observacao`, `amostra_id`, `peso`) VALUES
(7, '2021-05-08', 3, 0, 'vcbcbxcvbvcbxcvbggdfb vcxbdfahbfghncvghsegc', 36, 'cvxbcb');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amostra`
--
ALTER TABLE `amostra`
  ADD PRIMARY KEY (`amostra_id`);

--
-- Índices para tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  ADD PRIMARY KEY (`amostra_qtd_id`);

--
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`exame_id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `resultado_exame`
--
ALTER TABLE `resultado_exame`
  ADD PRIMARY KEY (`resultado_exame_id`);

--
-- Índices para tabela `tecnica`
--
ALTER TABLE `tecnica`
  ADD PRIMARY KEY (`tecnica_id`);

--
-- Índices para tabela `tecnica_tratamento`
--
ALTER TABLE `tecnica_tratamento`
  ADD PRIMARY KEY (`tecnica_tratamento_id`);

--
-- Índices para tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`tratamento_id`);

--
-- Índices para tabela `vacina`
--
ALTER TABLE `vacina`
  ADD PRIMARY KEY (`vacina_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostra`
--
ALTER TABLE `amostra`
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  MODIFY `amostra_qtd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `exame_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `log_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `resultado_exame`
--
ALTER TABLE `resultado_exame`
  MODIFY `resultado_exame_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tecnica`
--
ALTER TABLE `tecnica`
  MODIFY `tecnica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tecnica_tratamento`
--
ALTER TABLE `tecnica_tratamento`
  MODIFY `tecnica_tratamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `tratamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `vacina`
--
ALTER TABLE `vacina`
  MODIFY `vacina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
