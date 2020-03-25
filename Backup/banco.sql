CREATE DATABASE lancanotas;
USE lancanotas;

CREATE TABLE usuarios(
  userId int not null auto_increment primary key,
  nomeUser varchar(255),
  email varchar(255),
  password varchar(255),
  tipo varchar(30),
  status varchar(30)
);
CREATE TABLE disciplinas(
  	disciId int not null auto_increment primary key,
  	disciplina varchar(100)
);
CREATE TABLE medias(
  	mediaId int not null auto_increment primary key,
  	mediaAp varchar(20),
    minimoRec varchar(20)
);
CREATE TABLE alunos(
  alunoId int not null auto_increment primary key,
  nomeAluno varchar(255),
  turno varchar(20),
  serie varchar(100)
);
CREATE TABLE professores(
  profId int not null auto_increment primary key,
  nomeProf varchar(255)
);
CREATE TABLE prof_disciplina(
	prof_dc_Id int not null auto_increment primary key,
  profCodigo int,
	disciCodigo int,
	foreign key (profCodigo) references professores (profId),
  foreign key (disciCodigo) references disciplinas (disciId)
);
CREATE TABLE notas(
	notaId int not null auto_increment primary key,
  aluno int,
	professor int,
  disciplina int,
  bm1 varchar(11),
  bm2 varchar(11),
  bm3 varchar(11),
  bm4 varchar(11),
  nota1 varchar(11),
  nota2 varchar(11),
  nota3 varchar(11),
  nota4 varchar(11),

	foreign key (aluno) references alunos (alunoId),
  foreign key (professor) references professores (profId),
  foreign key (disciplina) references disciplinas (disciId)
);
