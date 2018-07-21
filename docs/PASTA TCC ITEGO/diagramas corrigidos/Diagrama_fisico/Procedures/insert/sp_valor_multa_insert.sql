CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_valor_multa_insert`( pvalor_diario_multa double)
BEGIN
insert into valor (valor_diario_multa)
values (pvalor_diario_multa);

select idvalor, valor_diario_multa from valor where idvalor = LAST_INSERT_ID();

END