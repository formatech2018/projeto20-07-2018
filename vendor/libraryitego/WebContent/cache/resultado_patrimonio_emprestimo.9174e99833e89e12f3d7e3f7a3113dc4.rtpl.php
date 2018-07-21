<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<form action="/crud/emprestimo/insert" method="POST">
		<table class="table">
		<h1 class="titulo-formulario">Empréstimo de livro para <?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
		
			<input type="hidden" name="idusuario" value="<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			
		
			<thead>
				<tr>
					 <th scope="col">PATRIMÔNIO</th>
					 <th scope="col">LIVRO</th>
					 <th scope="col">EDITORA</th>
					 <th scope="col">ÁREA</th> 
				</tr>
			</thead>
			<tbody>
				<?php $valor = 0; ?>
				<?php $counter1=-1;  if( isset($patrimonio) && ( is_array($patrimonio) || $patrimonio instanceof Traversable ) && sizeof($patrimonio) ) foreach( $patrimonio as $key1 => $value1 ){ $counter1++; ?>
				<?php $valor = $valor+1; ?>
				<tr>
					<td><input type="number" name="idpatrimonio<?php echo htmlspecialchars( $valor, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly></td>
					<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["nome_editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["nome_area"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		
		
		</table>

	<div>
		<a class='btn btn-warning botao' href="/crud/emprestimo/<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>/usuario/patrimonio/search">Voltar</a>
			<button class="btn btn-primary botao">Finalizar Empréstimo</button>
		
	</form>
	</div>
</div>