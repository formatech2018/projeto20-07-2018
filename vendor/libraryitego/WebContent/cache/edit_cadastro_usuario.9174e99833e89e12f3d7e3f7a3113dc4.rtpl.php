<?php if(!class_exists('Rain\Tpl')){exit;}?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {

			
				var idusuario = "<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var nome_usuario = "<?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var cpf = "<?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var telefone_fixo = "<?php echo htmlspecialchars( $telefone_fixo, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var telefone_celular = "<?php echo htmlspecialchars( $telefone_celular, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var email = "<?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var dtnasc = "<?php echo htmlspecialchars( $dtnasc, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var idendereco = "<?php echo htmlspecialchars( $idendereco, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var rua = "<?php echo htmlspecialchars( $rua, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var complemento = "<?php echo htmlspecialchars( $complemento, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var numero = "<?php echo htmlspecialchars( $numero, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var bairro = "<?php echo htmlspecialchars( $bairro, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var cep = "<?php echo htmlspecialchars( $cep, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var cidade = "<?php echo htmlspecialchars( $cidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
				var estado = "<?php echo htmlspecialchars( $estado, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			

			$("#seguranca").remove();	
			$("#tipo-remove").remove();
			

			$("#nome_usuario").val(nome_usuario);
			$("#cpf").val(cpf);
			$("#telefone_fixo").val(telefone_fixo);
			$("#telefone_celular").val(telefone_celular);
			$("#email").val(email);
			$("#dtnasc").val(dtnasc);
			$("#rua").val(rua);
			$("#complemento").val(complemento);
			$("#numero").val(numero);
			$("#bairro").val(bairro);
			$("#cep").val(cep);
			$("#cidade").val(cidade);
			$("#estado").val(estado);
			
			
			
			$("#formcadastro").append('<input type="hidden" name="tipo_usuario" id="tipo_usuario">');
			$("#formcadastro").append('<input type="hidden" name="idusuario" id="idusuario">');
			$("#formcadastro").append('<input type="hidden" name="idendereco" id="idendereco">');

			
			$("#idusuario").val(idusuario);
			$("#idendereco").val(idendereco);

	});

</script>