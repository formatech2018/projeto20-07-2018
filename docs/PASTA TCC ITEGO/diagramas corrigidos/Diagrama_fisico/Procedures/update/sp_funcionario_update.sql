CREATE  PROCEDURE `sp_funcionario_update`( pidfuncionario int,pidusuario int, pidendereco int, pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text, pcargo int, pformacao int)
BEGIN
	UPDATE funcionario set cargo_idcargo=pcargo, formacao_idformacao=pformacao where idfuncionario = pidfuncionario ;
    update usuario set nome_usuario=pnome_usuario, cpf=pcpf, telefone_fixo=ptelefone_fixo, telefone_celular=ptelefone_celular, email=pemail, dtnasc=pdtnasc  where idusuario = pidusuario;
    update endereco set rua=prua, complemento=pcomplemento, numero=pnumero, bairro=pbairro, cep=pcep, cidade=pcidade, estado=pestado where idendereco = pidendereco;
 	
 	select idfuncionario,idusuario,idendereco,nome_usuario,cpf,telefone_fixo,telefone_celular,email,dtnasc,rua,complemento,numero,bairro , cep , cidade , estado , cargo_idcargo , formacao_idformacao from funcionario 
 	inner join usuario on funcionario.usuario_idusuario = usuario.idusuario 
 	inner join endereco on usuario.endereco_idendereco = endereco.idendereco
 	where idfuncionario = pidfuncionario;
 	
END
