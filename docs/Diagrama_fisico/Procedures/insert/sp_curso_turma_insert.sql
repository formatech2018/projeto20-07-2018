CREATE PROCEDURE `libraryitego`.`sp_curso_turma_insert` (pinicio date, ptermino date, pidcurso int, pidturno int)
BEGIN
insert into turma (data_inicio, data_termino, curso_idcurso, turno_idturno)
values (pinicio , ptermino , pidcurso, pidturno );

select idturma, data_inicio, data_termino, curso_idcurso, turno_idturno from turma where idturma = LAST_INSERT_ID();

END