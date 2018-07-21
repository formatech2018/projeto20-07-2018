<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="color-fundo-titulo">
<h1 class="align-center titulo">Relatório de Livros por Quantidade</h1>
</div>
<table class="tabela-livro">
	<tr>
		<th>Nome do livro</th>
		<th>Editora</th>
		<th>Área</th>
	</tr>
	<?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td class="align-center"><?php echo htmlspecialchars( $value1["nome_editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td class="align-center"><?php echo htmlspecialchars( $value1["nome_area"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	</tr>
	<?php } ?>
</table>

<table>
	<tr>
		<td class="strong">Total de Livros</td> 
		<td class="align-center"><?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	</tr>
</table>
		