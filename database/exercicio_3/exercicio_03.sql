use movies_db;
/* 1) Consultas Where: */
/* a) Obter os filmes (movies) criados entre outubro de 1999 e dezembro de 2004, mostrando os filmes mais novos primeiro (usar release_date). */
SELECT * FROM movies
WHERE release_date BETWEEN '1999-10-04 00:00:00' AND '2004-12-04 00:00:00' ORDER BY release_date DESC;

/* b) Obter os filmes (movies) com duração entre 45 minutos e 2 horas e meia, ordenados por esta coluna (usar length). */
SELECT * FROM movies
WHERE length BETWEEN '45' AND '120';

/* c) Obter os atores (actors) com nomes começados por ‘HE’ e ‘TO’ (usar first_name). */
SELECT * FROM actors
WHERE first_name LIKE 'HE%' OR first_name LIKE 'TO%';

/* d) Obter os filmes (movies) que comecem com a letra ‘T’ (usar title). */
SELECT * FROM movies
WHERE title LIKE 'T%';

/* e) Obter os filmes (movies) que comecem com a letra ‘T’ e terminem com a letra ‘C’(usar title). */
SELECT * FROM movies
WHERE title LIKE 'T%C';

/* f) Obter os filmes (movies) feitos no ano 2000, ordenados por nome (usar release_date e title).  */
SELECT * FROM movies
WHERE release_date BETWEEN '2000-01-01 00:00:00' AND '2000-12-31 00:00:00' ORDER BY title;

/* g) Obter os filmes (movies) cujo nome tenha um hífen “-” (usar title). */
SELECT * FROM movies
WHERE title LIKE '%-%';

/* h) Obter os atores (actors) com nomes começados por ‘J’, com quatro letras coringa, terminados por ‘Y’ (usar first_name). */
SELECT * FROM actors
WHERE first_name LIKE 'J%' AND first_name LIKE '%Y' AND char_length(first_name) <= 6;
/* WHERE first_name LIKE 'J_%%%%_Y'; 

/* i) Obter os atores (actors) com nomes terminados por ‘AM’, ordenados por sobrenome, em ordem crescente (usar first_name e last_name). */
SELECT * FROM actors
WHERE first_name LIKE '%AM' ORDER BY last_name ASC;

/* j) Obter os filmes (movies) com nomes contendo a letra ‘E’ como conjunção, e que também contenham a letra ‘A’ (usar title). */
SELECT * FROM movies
WHERE title LIKE '% e %' AND title LIKE '%A%';

/* k) Obter os atores (actors) com sobrenomes contendo ‘de’ ou ‘dd’ em qualquer posição e nomes contendo ‘a’, em qualquer ordem (usar first_name e last_name). */
SELECT * FROM actors
WHERE (last_name LIKE '%de%' OR last_name LIKE '%dd%') AND first_name LIKE '%A%';

/* l) Obter todos os filmes (movies) que tenham classificação ‘8.3’, ‘9.0’ e ‘9.1’(usar rating). */
SELECT * FROM movies
WHERE rating IN (8.3, 9.0, 9.1);
/*Outra Maneira WHERE rating = 8.3 AND rating = 9.0 AND rating = 9.1)

/* m) Obter todos os filmes (movies) que tenham 2, 5 ou 7 prêmios, ordenados de forma a mostrar primeiro os que tenham mais prêmios (usar awards). */
SELECT * FROM movies 
WHERE awards IN (2, 5, 7) ORDER BY awards DESC;

/* n) Obter todos os filmes (movies) que tenham duração, mostrando primeiro os que tenham menor duração (usar length). */
SELECT * FROM movies
WHERE length IS NOT NULL ORDER BY length ASC;

/* o) Obter os atores (actors) com sobrenomes que não contenham a letra K (usar last_name). */
SELECT * FROM actors
WHERE last_name NOT LIKE '%k%';

/* p) Obter os filmes (movies) que não tenham duração de 2 horas e 2,5 horas, ordenados de forma crescente por nome (usar length e title). */
SELECT * FROM movies
WHERE length <> '120' AND length <> '150' ORDER BY title ASC;
/* <> = diferente */


/* 2. Alias de campos e tabelas */
/* a) Retornar, da tabela filmes (movies) os valores da coluna title como ‘Nome_do_filme’. */
SELECT title As Nome_do_filme FROM movies;

/* b) Obter os campos ‘id’ como ‘id_genero’, ‘name’ como ‘nome_genero’ da tabela gêneros (genres), ordenados por nome_genero em ordem crescente.  */
SELECT id AS id_genero, name AS nome_genero
FROM genres
ORDER BY nome_genero ASC;

/* c) Retornar o campo first-name como ‘Ator: ’ na tabela actors, em ordem decrescente. */
SELECT first_name AS Ator
FROM actors
ORDER BY Ator DESC;


/* 3) Combinações - Table Reference */
/* a) Retornar os filmes (movies) e seus gêneros (genres), ordenados por nome (usar title e name). */
SELECT title,name
FROM movies, genres
WHERE movies.genre_id = genres.id ORDER BY title;

/* b) Obter os filmes (movies) com seus atores (actors), ordenar por nome de filme e nome dos atores (usar title e first_name). */
SELECT title, first_name
FROM movies, actors
WHERE movies.id = actors.id ORDER BY title; 

/* c) Obter os atores (actors) e os filmes (movies) em que atuaram (usar first_name, last_name e title). */
SELECT first_name, last_name, title
FROM actors, movies, actor_movie
WHERE actors.id = actor_movie.actor_id AND movies.id = actor_movie.movie_id;


/* 4) JOINS */
/* a) Retornar os filmes (movies) e seus gêneros (genres), ordenados por nome do filme utilizando joins (usar title). */
SELECT movies.title, genres.name
FROM movies
INNER JOIN genres
ON movies.genre_id = genres.id ORDER BY title;

/* b) Obter os atores (actors) e os filmes (movies) em que atuaram utilizando joins (usar first_name, last_name e title). */
SELECT actors.first_name, actors.last_name, movies.title
FROM actors
INNER JOIN actor_movie
ON actors.id = actor_movie.actor_id
INNER JOIN movies
ON movies.id = actor_movie.movie_id;

/* c) Retornar os gêneros (genres) organizados em ordem decrescente por nome, com referência aos filmes (movies) utilizando joins (usar name e title). */
SELECT genres.name, movies.title
FROM genres
INNER JOIN movies
ON genres.id = movies.genre_id ORDER BY name DESC;

/* d) Obter os filmes (movies) e seus gêneros (genres), e os atores (actors) que participam de cada um, utilizando joins (usar title, name, first_name e last_name). */
SELECT movies.title, genres.name, actors.first_name, actors.last_name
FROM genres
INNER JOIN movies
ON genres.id = movies.genre_id
INNER JOIN actor_movie
ON movies.id = actor_movie.movie_id
INNER JOIN actors
ON actor_movie.actor_id = actors.id;
