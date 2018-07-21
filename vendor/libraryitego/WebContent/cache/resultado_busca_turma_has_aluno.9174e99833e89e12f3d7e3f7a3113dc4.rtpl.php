<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="rescursohasaluno">
		<table class="table">
			<thead>
				<tr>
					 <th scope="col">CPF</th>
					 <th scope="col">NOME</th>
					 <th scope="col">DATA DE NASCIMENTO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $dtnasc, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="rescursohasaluno">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">CÓDIGO</th>
					 <th scope="col">CURSO</th>
					 <th scope="col">TIPO</th>
					  <th scope="col">TURNO</th>
					 <th scope="col">INICIO</th>
					 <th scope="col">TÉRMINO</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_curso, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_tipo, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $nome_turno, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $data_inicio, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $data_termino, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div>
		<a class="btn btn-primary botao" href="/crud/turma/aluno/matricula/<?php echo htmlspecialchars( $idaluno, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/insert">Confirmar</a>
	</div>
</div>