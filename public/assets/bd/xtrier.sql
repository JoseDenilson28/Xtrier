-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Out-2025 às 00:23
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xtrier`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `genero` enum('M','F','Outro') DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `contato_emergencia` varchar(100) DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `user_id`, `data_nascimento`, `genero`, `telefone`, `endereco`, `documento`, `contato_emergencia`, `status`, `criado_em`) VALUES
(1, 4, NULL, NULL, '949493392', NULL, NULL, NULL, 'ativo', '2025-09-30 17:10:17'),
(2, 5, NULL, 'M', '94949313', NULL, NULL, NULL, 'ativo', '2025-10-13 19:22:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `triagens`
--

CREATE TABLE `triagens` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sintomas` text DEFAULT NULL,
  `historico` text DEFAULT NULL,
  `prioridade` enum('baixa','media','alta') NOT NULL DEFAULT 'baixa',
  `pontos` int(11) NOT NULL DEFAULT 0,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `triagens`
--

INSERT INTO `triagens` (`id`, `paciente_id`, `sintomas`, `historico`, `prioridade`, `pontos`, `criado_em`) VALUES
(1, 1, '[\"dor_intensa\"]', 'Ibuprofeno', 'media', 40, '2025-09-30 17:10:55'),
(2, 1, '[\"sangramento\",\"mastigacao\",\"fala\",\"aparelho_quebrado\"]', 'Não', 'alta', 85, '2025-10-13 19:16:56'),
(3, 2, '[\"dor_intensa\",\"sangramento\",\"fala\"]', 'no', 'alta', 90, '2025-10-13 19:22:51'),
(4, 2, '[\"dor_intensa\",\"trauma\",\"aparelho_quebrado\"]', 'dvvr', 'alta', 100, '2025-10-13 20:26:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('paciente','recepcionista','doutor','admin') DEFAULT 'paciente',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `tipo`, `criado_em`) VALUES
(1, 'jose', 'jose@gmail.com', '$2y$10$7MPStD7Io/ZUkZ38qX.5z.ZRNZVPFjR4rR4NT8j5s2MImBZZR4pZO', 'admin', '2025-09-23 15:13:19'),
(2, 'Denilson', 'denilson@gamil.com', '$2y$10$3Oa/lexgmsI7gfQXxJoow.6YpL2ZksE.iiEN4lA.HzO.MAJooCoYK', 'doutor', '2025-09-23 15:20:16'),
(3, 'Machado', 'machado@gmail.com', '$2y$10$mRXCFdZLhwYViKD.l5uCJemmsgC01rJEFpcKr6f.q33McwLaiqaNC', 'recepcionista', '2025-09-23 15:20:58'),
(4, 'Pataca', 'pataca@gmail.com', '$2y$10$fS/GqKEfFWCYPD1bqSKwW.dclZINYIgueHrUGTNgmmSsUlcXcwLXi', 'paciente', '2025-09-23 15:21:33'),
(5, 'Marionel Fortunato', 'mario@gmail.com', '$2y$10$N0KijPmrEkBjejZmrbPKvO4o98LDNbEsYg5VDBIjNjjyfsQ4qlVuG', 'paciente', '2025-10-13 19:22:04'),
(6, 'paciente 3', 'paciente3@gmailcom', '$2y$10$jZxJCIe9J4FlXbN1SwyzUun0R1RS93c.WEgeAVzMYQSIRcYOR8fNC', 'paciente', '2025-10-14 17:11:50'),
(7, 'paciente 4', 'paciente4@gmailcom', '$2y$10$cC6oIO.QVBUdz1cX3yG0I.htYRcrTgUIMeMAObltw8QltQzkPtCXi', 'paciente', '2025-10-14 17:12:15'),
(8, 'paciente 5', 'paciente5@gmailcom', '$2y$10$P70W4Dz2ZMsOTnfBJnXnu.eBoZQHUmbZKbpQ2kVfZTBgv.rooQa.K', 'paciente', '2025-10-14 17:12:42'),
(9, 'paciente 6', 'paciente6@gmailcom', '$2y$10$KK.Jkw.Jfzuv1iS6Cc9SkORCqD5PEiixLyVA63WB7nKK8KZWgFko.', 'paciente', '2025-10-14 17:13:08'),
(10, 'paciente 7', 'paciente7@gmailcom', '$2y$10$gwGHoefzFSXbsdj53CezN.2ZypxwZT.fMIlkxaXMWMniJD8FXvcPu', 'paciente', '2025-10-14 17:13:51');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Índices para tabela `triagens`
--
ALTER TABLE `triagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `triagens`
--
ALTER TABLE `triagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `triagens`
--
ALTER TABLE `triagens`
  ADD CONSTRAINT `fk_triagens_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
