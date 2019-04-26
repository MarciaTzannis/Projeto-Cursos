INSERT INTO tipo_usuario (nome)
VALUES ('admin');

INSERT INTO tipo_usuario (nome)
VALUES ('professor'), ('aluno');

SELECT * FROM tipo_usuario;

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ('Hendy', 'hendy@mail.com', '123', 99999999999, 'foto.png', 2);

ALTER TABLE usuarios
CHANGE cpf cpf BIGINT(12);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ('Hendylene', 'hendylene@gmail.com', '123', '98765432100', 'foto.jpg', 3);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ('Ana', 'ana@mail.com', '123', 44554455445, 'foto2.jpg', 3);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUE ('Thomaz', 'thomaz@gmail.com', '123', 23232323232, 'foto1.png', 2);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUE ('Pedro', 'pedro@mail.com', '123', 12121212121, 'foto3.png', 3);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUE ('Bia', 'bia@mail.com', '123', 77777777777, 'foto4.png', 3);

SELECT * FROM usuarios;

/* seleciona somente os atributos */
SELECT nome, email, tipo_usuario_fk from usuarios; 

/* trazendo somento os professores */
SELECT * FROM usuarios 
WHERE tipo_usuario_fk = 2;

/* pegando os usuários que o nome começa com a letra T */
SELECT * FROM usuarios 
WHERE nome LIKE 'T%';

/* filtrando os usuarios com 2 condições (tipo de usuario e letra do nome) */
SELECT * FROM usuarios
WHERE nome LIKE 'h%' AND tipo_usuario_fk = 3;

/* filtrando os usuarios respeitando as 2 condições (tipo de usuario e letra do nome) */
SELECT * FROM usuarios
WHERE nome LIKE 'h%' OR tipo_usuario_fk = 3;

/* filtrando pelos nomes desses usuarios específicos */
SELECT * FROM usuarios
WHERE nome IN ('Hendy', 'Thomaz', 'Ana');

/* ordenando a coluna nome / ASC-ascendente / DESC-decrescente */
SELECT nome, email FROM usuarios
WHERE tipo_usuario_fk = 3 /* filtrando somente usuarios alunos */
ORDER BY nome DESC;

/* alterando um registro - o email do nome Thomaz */
UPDATE usuarios
SET email = 'thomaz2@gmail.com'
WHERE nome = 'Thomaz';

/* Desabilitando o modo de segurança */
SET sql_safe_updates = 0; 
/* SET sql_safe_updates = 1; Habilitando o modo de segurança */

/* alterando um registro de vários usuarios, todos os alunos com o arquivo nicolascage.png */
UPDATE usuarios
SET foto = 'nicolaascage.png'
WHERE tipo_usuario_fk = 3;

/* apagando o registro nome Hendylene */
DELETE FROM usuarios
WHERE nome = 'Hendylene';

/* apagando o registro do professor tipo 2 */
DELETE FROM usuarios
WHERE tipo_usuario_fk = 2;

SELECT * FROM usuarios;