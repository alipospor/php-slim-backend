create database viverbd;

use viverbd;

create table usuario (
	id 			INT AUTO_INCREMENT,
    nome 			VARCHAR(50),
    senha 					VARCHAR(150),
    email					VARCHAR(150),
    primary key (id)
);

/*create table tarefa (
	id 			INT AUTO_INCREMENT,
    titulo varchar(50),
    descricao varchar(150),
    status INT 
    
    drop database viverbd
); */

insert into usuario
(nome, senha, email)
values ("Alisson",   "123", "ali_pospor@hotmail.com");

insert into usuario
(nome, senha, email)
values ("Eduarda",   "@bcv", "eduarda@hotmail.com");

select * from usuario;