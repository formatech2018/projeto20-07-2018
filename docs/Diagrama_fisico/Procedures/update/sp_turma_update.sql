CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_update`(pid int,pinicio date, ptermino date, pturno int)
BEGIN
    UPDATE turma set data_inicio=pinicio, data_termino=ptermino, turno_idturno=pturno where idturma = pid;
    
    select idturma,data_inicio,data_termino,turno_idturno from turma where idturma = pid;

END