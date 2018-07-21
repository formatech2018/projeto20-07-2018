CREATE PROCEDURE `libraryitego`.`sp_turno_insert` (pnome_turno text)
BEGIN
insert into turno (nome_turno)
values (pnome_turno);

select idturno, nome_turno from turno where idturno = LAST_INSERT_ID();

END