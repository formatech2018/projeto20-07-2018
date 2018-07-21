CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_patrimonio_insert`(pidpatrimonio int, plivro_idlivro int)
BEGIN

insert into patrimonio (idpatrimonio, livro_idlivro,patrimonio_status)
values (pidpatrimonio, plivro_idlivro,1);

select idpatrimonio, livro_idlivro, patrimonio_status from patrimonio where idpatrimonio = pidpatrimonio;
END