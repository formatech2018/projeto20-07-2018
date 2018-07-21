<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">

		<table class="table">
			<thead>
				<tr>
					 <th scope="col">PATRIMONIO</th>
					 <th scope="col">LIVRO</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($patrimonio) && ( is_array($patrimonio) || $patrimonio instanceof Traversable ) && sizeof($patrimonio) ) foreach( $patrimonio as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><a href="/crud/emprestimo/usuario/<?php echo htmlspecialchars( $value1["idemprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/disabled">Encerrar empréstimo</a></td>

				</tr>
				<?php } ?>
			</tbody>

		</table>

	<div>
		<?php $valor = 0; ?>
		<form action="/crud/emprestimo/usuario/disabled/all" method="POST">
			<?php $counter1=-1;  if( isset($patrimonio) && ( is_array($patrimonio) || $patrimonio instanceof Traversable ) && sizeof($patrimonio) ) foreach( $patrimonio as $key1 => $value1 ){ $counter1++; ?>
			<?php $valor = $valor+1; ?>
				<input type="hidden" name="idemprestimo<?php echo htmlspecialchars( $valor, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["idemprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				
			<?php } ?>
			<button class="btn btn-primary botao">Finalizar Empréstimos</button>
		</form>
	</div>
</div>