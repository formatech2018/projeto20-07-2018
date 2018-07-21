CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_area_update`(pid int, pnome text)
BEGIN
    UPDATE area set nome_area=pnome where idarea = pid;
    
    select idarea,nome_area from area where idarea = pid;

END