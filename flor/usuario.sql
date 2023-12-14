create database flor;
use flor;
create table usuario (id int 
auto_increment primary key,
nome varchar(255),
email varchar(255),
senha varchar(255));
select * from usuario;

create table produtos (
    id INT NOT NULL AUTO_INCREMENT, 
    tipo  VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL, 
    imagem VARCHAR(80) NOT NULL, 
    preco DECIMAL (5,2) NOT NULL, 
primary key (id));
select * from produtos

INSERT INTO produtos (tipo, nome, imagem, preco) VALUES ('flor', 'Flor branca', 'flor1.png', '10.00');