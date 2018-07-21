CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_autor_update`(pid int, pnome text)
BEGIN
    UPDATE autor set nome_autor=pnome where idautor = pid;
    
    select idautor,nome_autor from autor where idautor = pid;

END