CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_formacao_update`(pid int, pnome text)
BEGIN
    UPDATE formacao set nome_formacao=pnome where idformacao = pid;
    
    select idformacao,nome_formacao from formacao where idformacao = pid;

END