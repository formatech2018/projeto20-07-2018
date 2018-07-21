CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_devolucao_emprestimo_update`(pid int)
BEGIN
    UPDATE emprestimo set data_devolucao=now() where idemprestimo = pid; 
    select * from emprestimo 
    inner join patrimonio on emprestimo.patrimonio_idpatrimonio = patrimonio.idpatrimonio
    inner join livro on patrimonio.livro_idlivro = livro.idlivro
    inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario
	where idemprestimo = pid;


END