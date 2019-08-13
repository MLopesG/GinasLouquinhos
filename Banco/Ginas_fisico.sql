CREATE DATABASE ginas;


CREATE TABLE professores (
id_professor integer PRIMARY KEY auto_increment ,
nome_professor VARCHAR(100)
);

CREATE TABLE turmas (
id_turma integer PRIMARY KEY auto_increment,
dias_semanais text,
turno varchar(100),
horario_inicio time,
horario_final time,
quantidade_vagas integer,
id_professor integer,
id_polo_unidade integer,
FOREIGN KEY(id_professor) REFERENCES professores (id_professor)
);

CREATE TABLE polos_unidades (
id_polo_unidade integer PRIMARY KEY auto_increment,
polo_unidade varchar(100),
endereco VARCHAR(150)
);

CREATE TABLE aluno_atleta (
  id_aluno_atleta int(11) PRIMARY KEY auto_increment,
  nome_atleta varchar(300) ,
  rg_atleta varchar(20),
  cpf_atleta char(15),
  data_nascimento_atleta date,
  sexo_atleta varchar(50),
  responsavel varchar(300),
  cpf_responsavel char(15),
  email_responsavel varchar(100),
  parentesco_responsavel varchar(120),
  rg_responsavel varchar(20),
  cel_responsavel char(15),
  data_cadastro date ,
  id_turma integer,
  id_instituicao_ensino int(11),
  FOREIGN KEY(id_turma) REFERENCES turmas (id_turma)
);

CREATE TABLE usuarios (
id_usuario integer PRIMARY KEY auto_increment,
nome_usuario VARCHAR(100),
email_usuario VARCHAR(100),
senha_usuario VARCHAR(100),
nivel_acesso VARCHAR(100)
);

CREATE TABLE instituicao_ensino (
id_instituicao_ensino integer PRIMARY KEY auto_increment,
nome_instituicao_ensino VARCHAR(150)
);

ALTER TABLE turmas ADD FOREIGN KEY(id_polo_unidade) REFERENCES polos_unidades (id_polo_unidade);
ALTER TABLE aluno_atleta ADD FOREIGN KEY(id_instituicao_ensino) REFERENCES instituicao_ensino (id_instituicao_ensino);
