
CREATE  PROCEDURE `sp_usuario_senha_insert`(psenha_usuario text, pdata_cadastro date, pusuario int)
BEGIN
insert into senha (senha_usuario, data_cadastro, usuario_idusuario)
values(psenha_usuario, pdata_cadastro, pusuario);
select idsenha from senha where idsenha = LAST_INSERT_ID();
END
