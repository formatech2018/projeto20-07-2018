<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
		<table class="table">
			<thead>
				<tr>
					 <th scope="col">CPF</th>
					 <th scope="col">USUÁRIO</th>	 
					 <th scope="col">DATA DA DEVOLUÇÃO</th>	 
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="color-date"><?php echo htmlspecialchars( $data_devolucao, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
			</tbody>

		</table>
		<table class="table">
			<thead>
				<tr>
					 <th scope="col">PATRIMÔNIO</th>
					 <th scope="col">LIVRO</th>
					 <th scope="col">DATA DO EMPRÉSTIMO</th>
					 
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($emprestimo) && ( is_array($emprestimo) || $emprestimo instanceof Traversable ) && sizeof($emprestimo) ) foreach( $emprestimo as $key1 => $value1 ){ $counter1++; ?>
				
				<tr>
					<td><?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["data_emprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
				
				<?php } ?>
			</tbody>

		</table>
</div>