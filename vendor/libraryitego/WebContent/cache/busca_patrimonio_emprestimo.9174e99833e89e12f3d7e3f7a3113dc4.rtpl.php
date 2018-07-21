<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<form id="formpatrimonioemprestimo" action="/crud/emprestimo/usuario/patrimonio/search" method="POST">
	<h1 class="titulo-formulario">Empréstimo de livro para <?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>

	<input type="hidden" name="idusuario" value="<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<div class="form-row">
	    <div class="col col1">
	      <label for="formGroupExampleInput">Patrimônio 1</label>
	      <input type="text" value="" id="idpatrimonio1" name="idpatrimonio1" class="form-control" placeholder="Digite o Patrimônio" required>
	    </div>
	</div>

	<div class="form-row">
	    <div class="col col1">
	      <label for="formGroupExampleInput">Patrimônio 2</label>
	      <input type="text" value="" id="idpatrimonio2" name="idpatrimonio2" class="form-control" placeholder="Digite o Patrimônio" <?php echo htmlspecialchars( $disabled, ENT_COMPAT, 'UTF-8', FALSE ); ?>>
	    </div>
	</div>
	
	<button type="submit" class="btn btn-primary botao">Enviar</button>
</div>


</form>