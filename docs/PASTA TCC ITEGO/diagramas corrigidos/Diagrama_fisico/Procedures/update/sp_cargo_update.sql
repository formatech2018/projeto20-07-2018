CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cargo_update`(pid int, pnome text)
BEGIN
    UPDATE cargo set nome_cargo=pnome where idcargo = pid;
    
    select idcargo,nome_cargo from cargo where idcargo = pid;

END