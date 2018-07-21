<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
		<table class="table">
			<thead>
				<tr>
					 <th scope="col">CPF</th>
					 <th scope="col">NOME</th>
					 <th scope="col">DATA DE NASCIMENTO</th>
					 <th scope="col">STATUS</th>
					 <th scope="col">EMPRÉSTIMOS ATIVOS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $dtnasc, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php if( $status == 0 ){ ?> <a href="/crud/emprestimo/<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>/usuario/detalhes">Indisponível </a> <?php }else{ ?> Disponível <?php } ?></td>
					<td><?php echo htmlspecialchars( $livrodisp, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

				</tr>
			</tbody>

		</table>

	<div>
		<a class='btn btn-primary botao <?php if( $status == 0 ){ ?> disabled <?php }else{ ?>  <?php } ?>' href="/crud/emprestimo/<?php echo htmlspecialchars( $idusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>/usuario/patrimonio/search">Continuar</a>
	</div>
</div>