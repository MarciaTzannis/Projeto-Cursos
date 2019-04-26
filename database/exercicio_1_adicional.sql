CREATE DATABASE exercicio_1_adicional;
use exercicio_1_adicional;
CREATE TABLE produtora (
	id_produtora INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(65) NOT NULL,
    ranking INT UNSIGNED UNIQUE,
    ativo BOOLEAN DEFAULT TRUE NOT NULL,
    data_criacao DATETIME
);

ALTER TABLE produtora
ADD idioma_fk INT;

CREATE TABLE idioma (
	id_idioma INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(65)
);

ALTER TABLE produtora
ADD FOREIGN KEY (idioma_fk) REFERENCES idioma(id_idioma);
