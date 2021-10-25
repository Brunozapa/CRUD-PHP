create database php_login;

use php_login;

create table usuario (
    idUsuario int primary key auto_increment,
    nome varchar(45),
    email varchar(45),
    senha varchar(45)
);
insert into usuario values (null, 'administrador','admin', '1234');

select idUsuario, login, senha FROM usuario WHERE login = "admin" AND senha = "1234";

select * from usuario;


d