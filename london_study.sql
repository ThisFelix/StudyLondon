-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Mar-2017 às 03:14
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `london_study`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE `tb_disciplina` (
  `codigo_disciplina` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `dia` varchar(50) NOT NULL,
  `cod_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`codigo_disciplina`, `nome`, `professor`, `curso`, `hora_inicio`, `hora_fim`, `dia`, `cod_aluno`) VALUES
(3, 'Estrutura de Dados 2', 'Antônio', 'Análise De Sistemas', '19:00:00', '22:35:00', 'Sexta-Feira', 1661027),
(4, 'Linguagem de Programação 2', 'Reginaldo do Prado', 'Analise De Sistemas', '19:25:00', '22:35:00', 'Segunda-Feira', 1661027),
(6, 'Século 0', 'Andrelson', 'Análise de Sistemas', '00:00:00', '00:00:00', 'Domingo', 1661027);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estudo`
--

CREATE TABLE `tb_estudo` (
  `cod_aluno` int(11) NOT NULL,
  `dia_semana` varchar(40) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `atividade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professores`
--

CREATE TABLE `tb_professores` (
  `matricula` int(7) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `formacao` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_professores`
--

INSERT INTO `tb_professores` (`matricula`, `nome`, `cpf`, `formacao`, `email`) VALUES
(1456777, 'Karl Marx', '44825478120', 'Mestrado em Sociologia', 'marx.bolado@hotmail.com'),
(1456888, 'Leonardo Da Vinci', '55566677708', 'História da Arte/ Arquitetura', 'leo.florença@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_trabalho`
--

CREATE TABLE `tb_trabalho` (
  `cod_trabalho` int(11) NOT NULL,
  `cod_aluno` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `disciplina` varchar(30) NOT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT 'Em Aberto',
  `data_entrega` date NOT NULL,
  `data_entregue` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_trabalho`
--

INSERT INTO `tb_trabalho` (`cod_trabalho`, `cod_aluno`, `tipo`, `tema`, `disciplina`, `situacao`, `data_entrega`, `data_entregue`) VALUES
(1, 1661027, 'Site', 'PHP', 'Desenvolvimento Web', 'Em Aberto', '2017-02-27', '2017-02-27'),
(10, 1661027, 'fgh', 'asd', 'Estudo', 'Em Aberto', '2017-03-29', '2017-03-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `Matricula` int(7) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `Senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`Matricula`, `Nome`, `email`, `cpf`, `Senha`) VALUES
(1661027, 'Matheus', 'matheus.felix96@hotmail.com', '44014062000', '6351bf9dce654515bf1ddbd6426dfa97'),
(1661034, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD PRIMARY KEY (`codigo_disciplina`),
  ADD KEY `cod_aluno` (`cod_aluno`);

--
-- Indexes for table `tb_estudo`
--
ALTER TABLE `tb_estudo`
  ADD PRIMARY KEY (`cod_aluno`);

--
-- Indexes for table `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `tb_trabalho`
--
ALTER TABLE `tb_trabalho`
  ADD PRIMARY KEY (`cod_trabalho`),
  ADD KEY `fk_aluno` (`cod_aluno`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`Matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  MODIFY `codigo_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_estudo`
--
ALTER TABLE `tb_estudo`
  MODIFY `cod_aluno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `matricula` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1456889;
--
-- AUTO_INCREMENT for table `tb_trabalho`
--
ALTER TABLE `tb_trabalho`
  MODIFY `cod_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `Matricula` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1661037;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD CONSTRAINT `tb_disciplina_ibfk_1` FOREIGN KEY (`cod_aluno`) REFERENCES `tb_usuarios` (`Matricula`);

--
-- Limitadores para a tabela `tb_trabalho`
--
ALTER TABLE `tb_trabalho`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`cod_aluno`) REFERENCES `tb_usuarios` (`Matricula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
