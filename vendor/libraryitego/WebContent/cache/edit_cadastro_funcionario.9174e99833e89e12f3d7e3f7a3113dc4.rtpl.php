<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro");?>

<?php require $this->checkTemplate("edit_cadastro_usuario");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var idfuncionario = "<?php echo htmlspecialchars( $idfuncionario, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idformacao = "<?php echo htmlspecialchars( $idformacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idcargo = "<?php echo htmlspecialchars( $idcargo, ENT_COMPAT, 'UTF-8', FALSE ); ?>";


			$("#formcadastro").append('<input type="hidden" name="idfuncionario" id="idfuncionario">');
			$("#formcadastro").append('<input type="hidden" id="tipo" value="funcionario">');
			$("#idfuncionario").val(idfuncionario);
			$("#idformacao").val(idformacao);
			$("#idcargo").val(idcargo);
			$("#formcadastro").append('<input type="hidden" id="tipo_usuario" value="funcionario" name="tipo_usuario">');
			$("#tipo_usuario").val('funcionario');
			

	});

</script>