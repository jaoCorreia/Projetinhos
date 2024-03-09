CREATE TABLE console ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  fabricante varchar(70) NULL,
  CONSTRAINT pk_console PRIMARY KEY (id) 
);

INSERT INTO console (nome, fabricante) VALUES ('PlayStation 5', 'Sony');
INSERT INTO console (nome, fabricante) VALUES ('Xbox Series X/S', 'Microsoft');
INSERT INTO console (nome, fabricante) VALUES ('Nintendo Switch', 'Nintendo');
INSERT INTO console (nome, fabricante) VALUES ('Atari VCS', 'Atari');
INSERT INTO console (nome) VALUES ('Outros');

CREATE TABLE genero ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  CONSTRAINT pk_genero PRIMARY KEY (id) 
);

INSERT INTO genero (nome) VALUES ('Plataforma'),('RPG'),('FPS'),('Terror'),('Aventura'),('Luta'),('Único');

CREATE TABLE class_etaria ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  CONSTRAINT pk_etaria PRIMARY KEY (id) 
);

INSERT INTO class_etaria (nome) VALUES ('Livre'),('10'),('12'),('14'),('16'),('18');


CREATE TABLE jogos (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  ano varchar(4) NOT NULL,
  preco float NOT NULL,
  id_console int NOT NULL,
  id_etaria int NOT NULL, 
  id_genero int NOT NULL,
  CONSTRAINT pk_jogos PRIMARY KEY (id)
);
ALTER TABLE jogos ADD CONSTRAINT fk_etaria FOREIGN KEY (id_etaria) REFERENCES class_etaria (id);
ALTER TABLE jogos ADD CONSTRAINT fk_console FOREIGN KEY (id_console) REFERENCES console (id);
ALTER TABLE jogos ADD CONSTRAINT fk_genero FOREIGN KEY (id_genero) REFERENCES genero (id);