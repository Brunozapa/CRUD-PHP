create database php_login;

use php_login;

create table loja (
    idLoja int primary key auto_increment,
    nome varchar(45),
    email varchar(45),
    senha varchar(45)
);

create table produto (
    idProduto int primary key auto_increment,
    nome varchar(45),
    quantidade int,
    preco double,
    fkLoja int,
    foreign key (fkLoja) references loja(idLoja)
);

insert into loja values (null, 'loja admin','admin', '1234');

insert into produto values (null, 'caneta', 2.0, 'Caneta esferográfica', 1);

select idLoja, nome, email, senha FROM loja WHERE email = "admin" AND senha = "1234";

select * from loja;

select * from produto;
