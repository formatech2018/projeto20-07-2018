CREATE  PROCEDURE `sp_funcionario_insert`(pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text, pcargo int, pformacao int)
BEGIN 
declare address, user int default 0;
declare timenow datetime;
insert into endereco (rua, complemento, numero, bairro, cep, cidade, estado) 
values (prua, pcomplemento, pnumero, pbairro, pcep, pcidade, pestado);

select idendereco into address from endereco where idendereco = LAST_INSERT_ID();
select now() into timenow;

insert into usuario (nome_usuario, cpf, telefone_fixo, telefone_celular, email, dtnasc, usuario_status, first_register, last_activation, endereco_idendereco) 
values (pnome_usuario, pcpf, ptelefone_fixo, ptelefone_celular, pemail, pdtnasc, 0, timenow, timenow, address);

select idusuario into user from usuario where idusuario = LAST_INSERT_ID();

insert into funcionario (usuario_idusuario, formacao_idformacao, cargo_idcargo)
values(user, pformacao, pcargo);

select idfuncionario,first_register,usuario_idusuario from funcionario inner join usuario on funcionario.usuario_idusuario = usuario.idusuario where idfuncionario = LAST_INSERT_ID();


END