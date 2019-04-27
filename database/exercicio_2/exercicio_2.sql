CREATE DATABASE exercicio_2;

CREATE TABLE marcas (
id_marcas INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(1000) NOT NULL,
    origem_marca VARCHAR(1000) NOT NULL DEFAULT 'BRASIL'
);

CREATE TABLE carros (
id_carros INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(1000) NOT NULL,
    marca_fk INT,
    FOREIGN KEY (marca_fk) REFERENCES marcas(id_marcas)
);

INSERT INTO marcas (nome, origem_marca)
VALUES ('Mitsubishi','Japão');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Honda','Japão');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Mercedes Benz','Alemanha');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Hyndai','Coreia do Sul');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Ford','Estados Unidos');

INSERT INTO carros (nome, marca_fk)
VALUES ('Lancer', 1);

INSERT INTO carros (nome, marca_fk)
VALUES ('Eclipse Cross', 1);

INSERT INTO carros (nome, marca_fk)
VALUES ('Fit', 2);

INSERT INTO carros (nome, marca_fk)
VALUES ('Civic', 2);

INSERT INTO carros (nome, marca_fk)
VALUES ('Classe A', 3);

INSERT INTO carros (nome, marca_fk)
VALUES ('Classe GLA', 3);

INSERT INTO carros (nome, marca_fk)
VALUES ('i30', 4);

INSERT INTO carros (nome, marca_fk)
VALUES ('HB20', 4);

INSERT INTO carros (nome, marca_fk)
VALUES ('Focus', 5);

INSERT INTO carros (nome, marca_fk)
VALUES ('Ka', 5);

UPDATE carros
SET nome = 'Classe A (Novo)'
WHERE id_carros = 5;

UPDATE carros
SET nome = 'Classe GLA (Novo)'
WHERE id_carros = 6;

UPDATE carros
SET nome = 'i30 (Novo)'
WHERE id_carros = 7;

UPDATE carros
SET nome = 'HB20 (Novo)'
WHERE id_carros = 8;

UPDATE carros
SET nome = 'Focus (Novo)'
WHERE id_carros = 9;

UPDATE carros
SET nome = 'Ka (Novo)'
WHERE id_carros = 10;

INSERT INTO marcas (nome, origem_marca)
VALUES ('Mini Cooper','Inglaterra');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Mini Cooper','Inglaterra');

INSERT INTO marcas (nome, origem_marca)
VALUES ('Mini Cooper','Inglaterra');

SET sql_safe_updates = 0; 

DELETE FROM marcas
WHERE nome = 'Mini Cooper';

SELECT * FROM marcas;

SELECT * FROM carros;
