CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turno_update`(pid int, pnome text)
BEGIN
    UPDATE turno set nome_turno=pnome where idturno = pid;
    
    select idturno,nome_turno from turno where idturno = pid;

END