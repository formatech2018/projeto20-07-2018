CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_update`(pid int, pnome text)
BEGIN
    UPDATE tipo set nome_tipo=pnome where idtipo = pid;
    
    select idtipo,nome_tipo from tipo where idtipo = pid;

END