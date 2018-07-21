CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_multa_insert`(pemprestimo int)
BEGIN 
declare val int default 0;

select valor_diario_multa into val from valor order by idvalor desc limit 1;

insert into multa (situacao, valor_idvalor, emprestimo_idemprestimo) 
values (false, val, pemprestimo);

END