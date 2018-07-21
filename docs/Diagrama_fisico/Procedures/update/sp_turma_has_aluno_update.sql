CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_has_aluno_update`(pantigoid int, pnovoid int)
BEGIN
    UPDATE turma_has_aluno set matricula = pnovoid where matricula = pantigoid;
    
    select matricula from turma_has_aluno where matricula = pnovoid;

END