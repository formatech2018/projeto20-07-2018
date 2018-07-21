CREATE PROCEDURE `libraryitego`.`sp_autor_insert` (pnome_autor text)
BEGIN
insert into autor (nome_autor)
values (pnome_autor);

select idautor, nome_autor from autor where idautor = LAST_INSERT_ID();

END
