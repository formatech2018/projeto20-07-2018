<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="alert alert-<?php echo htmlspecialchars( $resultado, ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="alert">
	  <?php echo htmlspecialchars( $mensagem, ENT_COMPAT, 'UTF-8', FALSE ); ?>

	</div>
</div>