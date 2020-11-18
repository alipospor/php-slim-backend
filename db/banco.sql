create database viverbd;

use viverbd;

/*Scripts de tabelas*/
create table usuario (
	id 				INT AUTO_INCREMENT,
    nome 					VARCHAR(50),
    senha 					VARCHAR(150),
    email					VARCHAR(150),
    primary key (id)
);

create table tarefa (
	id 			INT AUTO_INCREMENT,
    descricao	VARCHAR(150),
    status_id INT,
    classificacao_id INT,
	primary key (id)
);

create table status (
	id	INT AUTO_INCREMENT,
    desc_status VARCHAR(20),
	primary key (id)
);

create table classificacao (
	id	INT AUTO_INCREMENT,
    desc_class VARCHAR(50),
	primary key (id)
);

/* Chaves estrangeiras */
alter table    tarefa
add constraint status_id  
foreign key   (status_id) 
references 	   status (id);

alter table    tarefa
add constraint classificacao_id  
foreign key   (classificacao_id) 
references classificacao (id);

/* População do banco */
insert into usuario
(nome, senha, email)
values ("Alisson",   "123", "ali_pospor@hotmail.com");
insert into usuario
(nome, senha, email)
values ("Eduarda",   "@bcv", "eduarda@hotmail.com");

insert into status
(id, desc_status)
values (1, "Pendente");
insert into status
(id, desc_status)
values (2, "Concluída");

insert into classificacao
(id, desc_class)
values (1, "Urgente");
insert into classificacao
(id, desc_class)
values (2, "O Quanto Antes");
insert into classificacao
(id, desc_class)

values (3, "Se sobrar Tempo");
insert into tarefa
(descricao, status_id, classificacao_id)
values ("Tarefa de casa", 2, 1);
insert into tarefa
(descricao, status_id, classificacao_id)
values ("Arrumar quarto", 1, 2);
insert into tarefa
(descricao, status_id, classificacao_id)
values ("Tomar banho", 1, 3);

/*
select * from usuario;

drop database viverbd;
*/
select * from usuario;
select * from classificacao;
select * from status;
