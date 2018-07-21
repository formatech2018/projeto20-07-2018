CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_livro_update`(pid int,pisbn text, pnome text, pano int, passunto text, pedicao text, peditora int, parea int)
BEGIN
    UPDATE livro set isbn=pisbn, nome_livro=pnome, ano_livro=pano, assunto=passunto, edicao=pedicao, editora_ideditora=peditora, area_idarea=parea where idlivro = pid;
    
    select idlivro,isbn,nome_livro,ano_livro,assunto,edicao,editora_ideditora,area_idarea from livro where idlivro = pid;

END