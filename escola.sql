-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2020 às 23:43
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `matricula` int(10) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `cidade` int(10) NOT NULL,
  `curso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`matricula`, `nome_aluno`, `endereco`, `cidade`, `curso`) VALUES
(29, 'VICTORIA CHAVES CARDOSO', 'AVENIDA DA AZENHA', 4, 3),
(30, 'ALINE RODRIGUES DA CRUZ', 'AVENIDA DA AZENHA', 16, 2),
(31, 'DENISE CRUZ', 'ALIPIO MARQUES VERCHAI', 25, 5),
(32, 'ANDRESSA CRUZ', 'MUNDAO', 12, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `cod_cidade` int(10) NOT NULL,
  `nome_cid` varchar(40) NOT NULL,
  `estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`cod_cidade`, `nome_cid`, `estado`) VALUES
(3, 'Canoas', 2),
(4, 'Porto Alegre', 2),
(5, 'Rio Branco', 5),
(6, 'Maceió', 6),
(7, 'Manaus', 7),
(8, 'Salvador', 8),
(9, 'Fortaleza', 9),
(10, 'Brasília', 10),
(11, 'Vitoria', 11),
(12, 'Goiânia', 12),
(13, 'Cuiabá', 13),
(14, 'Campo Grande', 14),
(15, 'Belo Horionte', 15),
(16, 'Belém', 16),
(17, 'João Pessoa', 17),
(18, 'Recife', 18),
(19, 'Terezinha', 19),
(20, 'Rio de Janeiro', 20),
(21, 'Natal', 21),
(22, 'Porto Velho', 22),
(23, 'Boa Vista', 23),
(24, 'Florianopolis', 24),
(25, 'Aracaju', 25),
(26, 'Palmas', 26),
(27, 'Curitiba', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `codigo` int(10) NOT NULL,
  `nome_curso` varchar(40) NOT NULL,
  `data_abertura` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`codigo`, `nome_curso`, `data_abertura`) VALUES
(1, 'ADS', '0000-00-00'),
(2, 'SPI', '0000-00-00'),
(3, 'MEDICINA', '2020-06-24'),
(4, 'VETERINÁRIA', '2020-06-24'),
(5, 'ENGENHARIA CIVIL', '2020-06-24'),
(6, 'CIÊNCIA DA COMPUTAÇÃO', '2020-06-24'),
(7, 'HISTÓRIA', '2020-06-24'),
(8, 'FILOSOFIA', '2020-06-24'),
(9, 'QUÍMICA', '2020-06-24'),
(10, 'ENGENHARIA DA COMPUTAÇÃO', '2020-06-24'),
(11, 'ADMINISTRAÇÃO', '2020-06-24'),
(12, 'TESTE', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `cod_estado` int(10) NOT NULL,
  `nome_est` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`cod_estado`, `nome_est`) VALUES
(1, 'PARANÁ'),
(2, 'RIO GRANDE DO SUL'),
(4, 'SÃO PAULO'),
(5, 'ACRE'),
(6, 'ALAGOAS'),
(7, 'AMAZONAS'),
(8, 'BAHIA'),
(9, 'CEARÁ'),
(10, 'DISTRITO FEDERAL'),
(11, 'ESPÍRITO SANTO'),
(12, 'GOIÁS'),
(13, 'MATO GROSSO'),
(14, 'MATO GROSSO DO SUL'),
(15, 'MINAS GERAIS'),
(16, 'PARÁ'),
(17, 'PARAÍBA'),
(18, 'PERNAMBUCO'),
(19, 'PIAUI'),
(20, 'RIO DE JANEIRO'),
(21, 'RIO GRANDE DO NORTE'),
(22, 'RONDÔNIA'),
(23, 'RORAIMA'),
(24, 'SANTA CATARINA'),
(25, 'SERGIPE'),
(26, 'TOCANTINS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `cidade` (`cidade`),
  ADD KEY `curso` (`curso`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`cod_cidade`),
  ADD KEY `estado` (`estado`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`cod_estado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `matricula` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `cod_cidade` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `cod_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`cidade`) REFERENCES `cidades` (`cod_cidade`),
  ADD CONSTRAINT `alunos_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`codigo`);

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estados` (`cod_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
