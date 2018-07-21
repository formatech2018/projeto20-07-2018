CREATE PROCEDURE `libraryitego`.`sp_verifica_insert` (pusuario int, phash text)
BEGIN
insert into verifica (usuario_idusuario,hash_verifica,data_verifica)
values (pusuario, phash, now());

select usuario_idusuario, hash_verifica, data_verifica from verifica where usuario_idusuario = pusuario;

END
