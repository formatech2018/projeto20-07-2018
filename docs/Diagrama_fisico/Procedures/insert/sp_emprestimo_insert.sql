CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_emprestimo_insert`(ppatrimonio int, pusuario int)
BEGIN
insert into emprestimo (data_emprestimo, patrimonio_idpatrimonio, usuario_idusuario)
values(now(), ppatrimonio, pusuario);

select idemprestimo, data_emprestimo, patrimonio_idpatrimonio, usuario_idusuario, nome_livro, nome_usuario, email from emprestimo
inner join patrimonio on emprestimo.patrimonio_idpatrimonio = patrimonio.idpatrimonio
inner join livro on patrimonio.livro_idlivro = livro.idlivro
inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario
where idemprestimo = LAST_INSERT_ID();
END