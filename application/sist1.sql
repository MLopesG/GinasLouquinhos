
CREATE TABLE `aluno_atleta` (
  `id_aluno_atleta` int(11) NOT NULL,
  `unidade` text DEFAULT NULL,
  `nome_atleta` varchar(300)  DEFAULT NULL,
  `rg_atleta` varchar(20)  DEFAULT NULL,
  `cpf_atleta` char(15)  DEFAULT NULL,
  `data_nascimento_atleta` date DEFAULT NULL,
  `sexo_atleta` varchar(50)  DEFAULT NULL,
  `responsavel` varchar(300)  DEFAULT NULL,
  `cpf_responsavel` char(15)  NULL,
  `email_responsavel` varchar(100)  DEFAULT NULL,
  `parentesco_responsavel` varchar(120)  DEFAULT NULL,
  `rg_responsavel` varchar(20)  DEFAULT NULL,
  `cel_responsavel` char(15)  DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `dias_participacao` text  DEFAULT NULL,
  `horario_participacao` time DEFAULT NULL,
  `id_instituicao_ensino` int(11) DEFAULT NULL
);

CREATE TABLE `instituicao_ensino` (
  `id_instituicao_ensino` int(11) NOT NULL,
  `nome_instituicao_ensino` text DEFAULT NULL
);

CREATE TABLE `polos_unidades` (
  `id_polo_unidade` int(11) NOT NULL,
  `polo_unidade` varchar(100) DEFAULT NULL
);

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `nivel_acesso` text DEFAULT NULL
);

ALTER TABLE `aluno_atleta`
  ADD PRIMARY KEY (`id_aluno_atleta`),
  ADD KEY `id_instituicao_ensino` (`id_instituicao_ensino`);


ALTER TABLE `instituicao_ensino`
  ADD PRIMARY KEY (`id_instituicao_ensino`);


ALTER TABLE `polos_unidades`
  ADD PRIMARY KEY (`id_polo_unidade`);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `aluno_atleta`
  MODIFY `id_aluno_atleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `instituicao_ensino`
  MODIFY `id_instituicao_ensino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `polos_unidades`
  MODIFY `id_polo_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--

ALTER TABLE `aluno_atleta`
  ADD CONSTRAINT `aluno_atleta_ibfk_1` FOREIGN KEY (`id_instituicao_ensino`) REFERENCES `instituicao_ensino` (`id_instituicao_ensino`);
COMMIT;

