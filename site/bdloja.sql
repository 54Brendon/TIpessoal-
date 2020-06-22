create database bdloja;
use bdloja;

create table categoria(
	catid bigint auto_increment not null primary key,
    catnome varchar(60) not null
);

create table produto(
	proid bigint auto_increment not null primary key,
    pronome varchar(60) not null,
    propreco double not null,
    prodescricao varchar(255) not null,
    procategoria bigint not null,
    foreign key (procategoria) references categoria(catid)
);


insert into categoria(catnome) values ('Camisetas'),('Canecas'),('Livros'),('Action Figures'); 

insert into produto(pronome,propreco,prodescricao,procategoria) values 
('Blusa legal',49.50,'Blusa legal da loja',1),('Caneca top',25.00,'Caneca personalizada',2),('Livro exclusivo',39.90,'Leitura maravilhosa',3);



select pronome 'Produto', propreco 'Preco', prodescricao 'Descricao', catnome 'Categoria' from produto inner join categoria on proid = catid;

create table cidade(
	cidid bigint auto_increment not null primary key,
    cidnome varchar(60) not null,
    cidestado bigint not null,
    foreign key (cidestado) references estado(estid)
);

create table estado(
	estid bigint auto_increment not null primary key,
    estnome varchar(60) not null
);


create table cliente (
	cliid bigint auto_increment not null primary key,
    clinome varchar(80) not null

);