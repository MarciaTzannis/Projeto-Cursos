/* inserindo um registro - botão direito na tabela usuaios, send to SQL editor, insert statement , apagar o id porque é auto_increment */

INSERT INTO `projeto_cursos`.`usuarios`
(`nome`,
`email`,
`senha`,
`cpf`,
`foto`,
`tipo_usuario_fk`)
VALUES
('Giselene',
'gi_hta@hotmail.com',
456,
12345678900,
'gisele.png',
3);
