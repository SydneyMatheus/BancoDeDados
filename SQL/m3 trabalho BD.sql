CREATE SCHEMA transportadora DEFAULT CHARACTER SET utf8;
USE transportadora;

CREATE TABLE IF NOT EXISTS cliente (
idCliente INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(60),
email VARCHAR(60),
PRIMARY KEY (idCliente)
);

CREATE TABLE IF NOT EXISTS telefone(
idTelefone INT NOT NULL AUTO_INCREMENT,
idCliente INT NOT NULL,
telefone VARCHAR(20),
PRIMARY KEY (idTelefone),
CONSTRAINT fk_telefone_cliente FOREIGN KEY (idCliente) REFERENCES cliente (idCliente)
);

CREATE TABLE IF NOT EXISTS estado(
idEstado INT NOT NULL AUTO_INCREMENT,
estado VARCHAR(60),
PRIMARY KEY (idEstado)
);

CREATE TABLE IF NOT EXISTS cidade(
idCidade INT NOT NULL AUTO_INCREMENT,
idEstado INT NOT NULL,
cidade VARCHAR(60),
PRIMARY KEY (idCidade),
CONSTRAINT fk_cidade_estado FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

CREATE TABLE IF NOT EXISTS bairro(
idBairro INT NOT NULL AUTO_INCREMENT,
idCidade INT NOT NULL,
bairro VARCHAR(60),
PRIMARY KEY (idBairro),
CONSTRAINT fk_bairro_cidade FOREIGN KEY (idCidade) REFERENCES cidade (idCidade)
);

CREATE TABLE IF NOT EXISTS endereco(
idEndereco INT NOT NULL AUTO_INCREMENT,
idCliente INT NOT NULL,
idBairro INT NOT NULL,
lograd VARCHAR(60),
numero INT,
PRIMARY KEY (idEndereco),
CONSTRAINT fk_endereco_cliente FOREIGN KEY (idCliente) REFERENCES cliente (idCliente),
CONSTRAINT fk_endereco_bairro FOREIGN KEY (idBairro) REFERENCES bairro (idBairro)
);

CREATE TABLE IF NOT EXISTS detalhes(
idDetalhes INT NOT NULL AUTO_INCREMENT,
info VARCHAR(15),
PRIMARY KEY (idDetalhes)
);

CREATE TABLE IF NOT EXISTS pacote(
idPacote INT NOT NULL AUTO_INCREMENT,
idDetalhes INT NOT NULL,
idCliente INT NOT NULL,
idEndereco INT NOT NULL,
dataEntrada DATE,
dataPrev DATE,
peso DECIMAL(5,2),
largura DECIMAL(5,2),
altura DECIMAL(5,2),
comprimento DECIMAL(5,2),
PRIMARY KEY (idPacote),
CONSTRAINT fk_pacote_detalhes FOREIGN KEY (idDetalhes) REFERENCES detalhes (idDetalhes),
CONSTRAINT fk_pacote_cliente FOREIGN KEY (idCliente) REFERENCES cliente (idCliente),
CONSTRAINT fk_pacote_endereco FOREIGN KEY (idEndereco) REFERENCES endereco (idEndereco)
);

select * from cliente;
select * from telefone;
select * from estado;
select * from cidade;
select * from bairro;
select * from endereco;

INSERT INTO estado (estado) VALUES ('Santa Catarina');
INSERT INTO estado (estado) VALUES ('Parana');
INSERT INTO estado (estado) VALUES ('Rio Grande do Sul');

INSERT INTO cidade (idEstado, cidade) VALUES (1, 'Itajaí');
INSERT INTO cidade (idEstado, cidade) VALUES (2, 'Curitiba');
INSERT INTO cidade (idEstado, cidade) VALUES (3, 'Porto Alegre');

INSERT INTO bairro (idCidade, bairro) VALUES (1, 'Centro');
INSERT INTO bairro (idCidade, bairro) VALUES (2, 'Água Verde');
INSERT INTO bairro (idCidade, bairro) VALUES (3, 'Bela Vista');

INSERT INTO detalhes (info) VALUES ('Cancelado'), ('Entregue'), ('Processamento'), ('Transporte');
SELECT * FROM pacote;

/*SELECT idCidade, bairro from bairro where idBairro = 1;

SELECT cliente.nome, cliente.email, telefone.telefone from cliente inner join telefone where cliente.idCliente = 25 and telefone.idCliente = 25;

SELECT cliente.nome, cliente.email, endereco.lograd, endereco.numero, 
bairro.bairro, cidade.cidade, estado.estado, telefone.telefone from cliente 
inner join telefone inner join endereco inner join bairro inner join cidade 
inner join estado where cliente.idCliente = 1 and telefone.idCliente = 1 
and endereco.idCliente = 1 and bairro.idBairro = 1 and cidade.idCidade = 1 and estado.idEstado = 1;*/

-- UPDATE cliente JOIN telefone JOIN endereco on cliente.idCliente = 1 or telefone.idCliente = 1 or endereco.idCliente = 1 SET cliente.nome = 'up' and telefone.telefone = '00' and endereco.idBairro = 2 and endereco.lograd = 'Up' and endereco.numero = '0';



/*
-- Abaixo CRUD de todas as tabelas presentes no trabalho

-- CRUD TABELA CLIENTE
INSERT INTO cliente (nome, email) VALUES ('Sidney',' sydney@homtmail.com');
SELECT * FROM cliente;
UPDATE cliente SET nome = 'Sydney' WHERE idCliente = 1;
DELETE FROM cliente WHERE idCliente = 1;
-- -------------------

-- CRUD TABELA telefone
 INSERT INTO cliente (nome, email) VALUES ('Sydney',' sydney@homtmail.com');
 
 INSERT INTO telefone (idCliente, telefone) VALUES (2,'99999-9999');
 SELECT * FROM telefone;
 UPDATE telefone SET telefone = '12345-6789' WHERE idCliente = 2;
 DELETE FROM telefone WHERE idCliente = 2;
 
 DELETE FROM cliente WHERE idCliente = 2;
-- -------------------

-- CRUD TABELA estado
 INSERT INTO estado (estado) VALUES ('Novo Estado');
 SELECT * FROM estado;
 UPDATE estado SET estado = 'Estado' WHERE idEstado = 4;
 DELETE FROM estado WHERE idEstado = 4;
-- -------------------

-- CRUD TABELA cidade
 INSERT INTO estado (estado) VALUES ('Novo Estado');
 
 INSERT INTO cidade (idEstado, cidade) VALUES (5, 'Nova Cidade');
 SELECT * FROM cidade;
 UPDATE cidade SET cidade = 'Cidade' WHERE idEstado = 5;
 DELETE FROM cidade WHERE idEstado = 5;
 
 DELETE FROM estado WHERE idEstado = 5;
-- -------------------

-- CRUD TABELA bairro
 INSERT INTO estado (estado) VALUES ('Novo Estado');
 INSERT INTO cidade (idEstado, cidade) VALUES (6, 'Nova Cidade');
 
 INSERT INTO bairro (idCidade, bairro) VALUES (8, 'Novo Bairro');
 SELECT * FROM bairro;
 UPDATE bairro SET bairro = 'Bairro' WHERE idCidade = 8;
 DELETE FROM bairro WHERE idCidade = 8;
 
 DELETE FROM cidade WHERE idEstado = 6;
 DELETE FROM estado WHERE idEstado = 6;
-- -------------------

-- CRUD TABELA endereco
 INSERT INTO cliente (nome, email) VALUES ('Sydney',' sydney@homtmail.com');
 
 INSERT INTO endereco (idCliente, idBairro, lograd, numero) VALUES (3,1,'Nova Rua',1);
 SELECT * FROM endereco;
 UPDATE endereco SET lograd = 'Rua' WHERE idEndereco = 1;
 DELETE FROM endereco WHERE idEndereco = 1;
 
 DELETE FROM cliente WHERE idCliente = 3;
-- -------------------

 -- CRUD TABELA detalhes
 INSERT INTO detalhes (info) VALUES ('Novo Status');
 SELECT * FROM detalhes;
 UPDATE detalhes SET info = 'Status' WHERE idDetalhes = 5;
 DELETE FROM detalhes WHERE idDetalhes = 5;
-- -------------------

-- CRUD TABELA pacote
 INSERT INTO cliente (nome, email) VALUES ('Sydney',' sydney@homtmail.com');
 INSERT INTO endereco (idCliente, idBairro, lograd, numero) VALUES (4,1,'Nova Rua',1);
 
 INSERT INTO pacote (idDetalhes, idCliente, idEndereco, peso, largura, altura, 
 comprimento)
 VALUES (1, 4, 3, 10, 10, 10, 10);
 SELECT * FROM pacote;
 UPDATE pacote SET idDetalhes = '2' WHERE idPacote = 1;
 DELETE FROM pacote WHERE idPacote = 1;
 
 DELETE FROM endereco WHERE idEndereco = 3;
 DELETE FROM cliente WHERE idCliente = 4;
-- -------------------
*/