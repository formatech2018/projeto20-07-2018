<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Detalhes</h1>
		<table class="table">
			
			<thead>
				<tr>
					<th>USUÁRIO</th>
					<th>CPF</th>
					<th>EMAIL</th>
					<th>CELULAR</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td class="cpf"><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td class="celular"><?php echo htmlspecialchars( $telefone_celular, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
			</tbody>

		</table>

		<table class="table table-sm table-primary">
			<tbody>
				<tr>
					<th scope="row">STATUS QUANTIDADE DE LIVROS</th>
					<td><?php echo htmlspecialchars( $status_qtde, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
				<tr>
					<th scope="row">STATUS MULTA</th>
					<td><?php echo htmlspecialchars( $status_multa, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
				<tr>
					<th scope="row">STATUS TURMA</th>
					<td><?php echo htmlspecialchars( $status_turma, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
			</tbody>
		</table>
	
					
</div>