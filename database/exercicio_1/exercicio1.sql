-- CREATE DATABASE exercicio_1;
use exercicio_1;
CREATE TABLE usuarios (
	id_usuarios INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(65) NOT NULL,
	foto VARCHAR(65)
);

CREATE TABLE amizade (
	id_amizade INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    amizade_fk_1 INT,
    FOREIGN KEY (amizade_fk_1) REFERENCES usuarios(id_usuarios),
    amizade_fk_2 INT,
    FOREIGN KEY (amizade_fk_2) REFERENCES usuarios(id_usuarios)
);

CREATE TABLE categoria_post (
	id_categoria INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    tipo VARCHAR(65) NOT NULL UNIQUE
);

CREATE TABLE posts (
	id_post INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    titulo VARCHAR(65),
    descricao VARCHAR(1000),
    usuarios_fk INT,
    FOREIGN KEY (usuarios_fk) REFERENCES usuarios(id_usuarios),
    categoria_fk INT,
    FOREIGN KEY (categoria_fk) REFERENCES categoria_post(id_categoria)
);
