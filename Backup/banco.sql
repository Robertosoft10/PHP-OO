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
  bimestre varchar(100),
  nota varchar(30),
	foreign key (aluno) references alunos (alunoId),
  foreign key (professor) references professores (profId),
  foreign key (disciplina) references disciplinas (disciId)
);
