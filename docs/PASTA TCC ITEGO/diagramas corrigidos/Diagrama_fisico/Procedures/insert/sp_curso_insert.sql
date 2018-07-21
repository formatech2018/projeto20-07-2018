CREATE  PROCEDURE `sp_curso_insert`(pnome_curso text, ptipo int, pcarga_horaria int, pvagas int)
BEGIN

insert into curso (nome_curso, tipo_idtipo, carga_horaria, vagas)
values (pnome_curso, ptipo, pcarga_horaria, pvagas);

select idcurso, nome_curso, tipo_idtipo, carga_horaria, vagas from curso where idcurso = LAST_INSERT_ID();
END