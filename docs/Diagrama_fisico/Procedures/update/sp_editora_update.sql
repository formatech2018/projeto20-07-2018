CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editora_update`(pid int, pnome text)
BEGIN
    UPDATE editora set nome_editora=pnome where ideditora = pid;
    
    select ideditora,nome_editora from editora where ideditora = pid;

END