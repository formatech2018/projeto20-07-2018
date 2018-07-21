CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_insert`(pinicio date, ptermino date, pcurso int, pturno int)
BEGIN

insert into turma (data_inicio, data_termino, curso_idcurso, turno_idturno)
values (pinicio, ptermino, pcurso, pturno);

select idturma from turma where idturma = LAST_INSERT_ID();
END