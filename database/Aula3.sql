/* Mostrar a tabela usuários */
SELECT * FROM usuarios;

/* Código para contar os números de usuários */
SELECT COUNT(*) FROM usuarios; /* 13 usuarios */

/* Selecionar somente os usuários alunos, tipo 3 */
SELECT COUNT(*) FROM usuarios
WHERE tipo_usuario_fk = 3; /* 9 alunos */

/* Selecionar a tabela cursos */
SELECT * FROM cursos; 

/* Média dos cursos */
SELECT AVG(preco)
FROM cursos; /* 267.5 */

/* Valor mínimo do curso */
SELECT MIN(preco)
FROM cursos; /* 50 */

/* Valor máximo do curso */
SELECT MAX(preco)
FROM cursos; /* 800 */

/* Soma dos valores dos cursos */
SELECT SUM(preco)
FROM cursos; /* 1070 */

/* Outra maneira */
SELECT MIN(preco), MAX(preco), AVG(preco), SUM(preco)
FROM cursos;

/* Fazer alias, alterar o nome do atributo */
SELECT 
MIN(preco) AS 'mínimo', /* colocar o nome entre aspas quando usar acento */
MAX(preco) AS 'máximo',
AVG(preco) AS 'média',
SUM(preco) AS 'total'
FROM cursos;

/* agrupar pelo tipo de usuário e contar quantos usuários tenho de cada categoria */
SELECT tipo_usuario_fk, COUNT(*)
FROM usuarios
GROUP BY tipo_usuario_fk;

/* inner join com alias */
SELECT u.nome AS usuario, t.nome AS tipo /* abreviar a tabela primeira letra .u = tabela usuarios */
FROM usuarios AS u /* determina que a tabela usuários é a tabela A */
INNER JOIN tipo_usuario AS t
ON u.tipo_usuario_fk = t.id_tipo_usuario;

/* inner join sem alias */
SELECT usuarios.nome, tipo_usuario.nome /* tabela usuarios, atributo nome / tabela tipo_usuario, atributo nome */
FROM usuarios
INNER JOIN tipo_usuario
ON usuarios.tipo_usuario_fk = tipo_usuario.id_tipo_usuario;
 
/* inner join tabela Cursos e tabela Usuarios (atributo professor) SEM alias */
SELECT cursos.nome, usuarios.nome /* os registros que eu quero mostrar */
FROM cursos
INNER JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario; /* os campos em comum Foreign Key - Primary Key (vice-versa) */
 
/* inner join tabela Cursos e tabela Usuarios (atributo professor) COM alias */
SELECT c.nome AS curso, u.nome AS prof
FROM cursos AS c
INNER JOIN usuarios AS u
ON c.professor_fk = u.id_usuario;
  
/* insert um curso sem professor */
INSERT INTO cursos (nome, descricao, preco, tag, image)
VALUES
  ('Drinks Maneiros', 
  'Aprenda a fazer drinks sensacionais', 
  3000, '
  drinks', 
  'happyhour.png');
  
SELECT * FROM projeto_cursos.cursos;
  
/* Exemplo de Left Join */
SELECT cursos.nome AS curso, usuarios.nome AS professor
FROM cursos
LEFT JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;
  
/* Exemplo de Right Join */
SELECT cursos.nome AS curso, usuarios.nome AS professor
FROM cursos
RIGHT JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;