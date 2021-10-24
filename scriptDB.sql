create database php_login;

use php_login;

create table usuario (
    idLogin int primary key auto_increment,
    login varchar(45),
    senha varchar(45)
);

insert into usuario values (null, 'admin', '1234');

SELECT login, senha FROM usuario WHERE login = "admin" AND senha = "1234";