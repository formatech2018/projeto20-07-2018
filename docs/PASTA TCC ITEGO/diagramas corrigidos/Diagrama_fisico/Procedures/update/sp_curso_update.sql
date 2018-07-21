CREATE  PROCEDURE `sp_curso_update`(pidcurso int,pnome_curso text, ptipo int, pcarga_horaria int, pvagas int)
BEGIN

UPDATE curso set nome_curso=pnome_curso, tipo_idtipo=ptipo, carga_horaria=pcarga_horaria, vagas=pvagas where idcurso = pidcurso;
    
    select idcurso,nome_curso,tipo_idtipo,carga_horaria,vagas from curso where idcurso = pidcurso;
END