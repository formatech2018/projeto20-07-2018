CREATE PROCEDURE `sp_cargo_insert`(pnome_cargo text)
BEGIN
insert into cargo (nome_cargo, nivel)
values (pnome_cargo, 0);

select idcargo, nome_cargo, nivel from cargo where idcargo = LAST_INSERT_ID();

END