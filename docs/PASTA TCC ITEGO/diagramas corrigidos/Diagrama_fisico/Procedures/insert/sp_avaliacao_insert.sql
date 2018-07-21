CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_avaliacao_insert`(pcomentario text, pemprestimo int)
BEGIN
insert into avaliacao (comentario, emprestimo_idemprestimo)
values (pcomentario, pemprestimo);

select idavaliacao, comentario, emprestimo_idemprestimo from avaliacao where idavaliacao = LAST_INSERT_ID();

END