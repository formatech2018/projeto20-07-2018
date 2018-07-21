CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_has_aluno_insert`(pturma int, paluno int, pmatricula double)
BEGIN
insert into turma_has_aluno (turma_idturma, aluno_idaluno, matricula)
values (pturma, paluno,pmatricula);

select turma_idturma, aluno_idaluno, matricula from turma_has_aluno where turma_idturma = pturma and aluno_idaluno = paluno ;

END