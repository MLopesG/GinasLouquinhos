create database Ginas_Louquinhos;

CREATE TABLE instituicao_ensino (
	id_instituicao_ensino integer PRIMARY KEY auto_increment,
	nome_instituicao_ensino text
);

CREATE TABLE aluno_atleta (
	id_aluno_atleta  integer PRIMARY KEY auto_increment,
	unidade text,
	nome_atleta VARCHAR(300),
	rg_atleta VARCHAR(20),
	cpf_atleta char(15),
	data_nascimento_atleta  date,
	sexo_atleta VARCHAR(50),
	responsavel VARCHAR(300),
	cpf_responsavel char(15),
	email_responsavel VARCHAR(100),
	parentesco_responsavel VARCHAR(120),
	rg_responsavel VARCHAR(20),
	cel_responsavel char(15),
	data_cadastro date,
	dias_participacao text,
	horario_participacao time,
	id_instituicao_ensino integer,
	FOREIGN KEY(id_instituicao_ensino) REFERENCES instituicao_ensino (id_instituicao_ensino)
);

CREATE TABLE usuarios(
	id_usuario integer PRIMARY KEY auto_increment,
	nome_usuario VARCHAR(100),
	email_usuario VARCHAR(100),
	senha_usuario VARCHAR(100)
);

