<?php if(!class_exists('Rain\Tpl')){exit;}?><h1 class="color-fundo-titulo titulo titulo-autorizacao">Devolução de Empréstimo de Livro</h1>

<p class="p">Declaro que o usuário <strong><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, portador do cpf <strong><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> e telefone <strong><?php echo htmlspecialchars( $telefone_celular, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>.</p>
<p class="p">Realizou a devolução do(s) livro(s):</p>

<table id="tabela-devolucao1">
	<tr>
		<th>Patrimônio</th>
		<th>Nome do livro</th>
		<th>Data de empréstimo</th>
		<th>Previsão da devolução</th>
		<th>Data da devolução</th>
	</tr>
	<?php $counter1=-1;  if( isset($resultado) && ( is_array($resultado) || $resultado instanceof Traversable ) && sizeof($resultado) ) foreach( $resultado as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["data_emprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["data_previsao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["data_devolucao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	</tr>
	<?php } ?>
</table>
	<h1 class="color-fundo-titulo titulo titulo-autorizacao2">Informações Complementares</h1>
<table id="tabela-devolucao2">
	<tr>
		<th>Patrimônio</th>
		<th>Dias de atraso na devolução</th>
		<th>Valor diário da multa</th>
		<th>Valor total multa</th>
	</tr>
	<?php $counter1=-1;  if( isset($resultado) && ( is_array($resultado) || $resultado instanceof Traversable ) && sizeof($resultado) ) foreach( $resultado as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["atraso_devolucao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td>R$ <?php echo htmlspecialchars( $value1["valor_diario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,00</td>
		<td>R$ <?php echo htmlspecialchars( $value1["valor_total_multa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,00</td>
	</tr>
	<?php } ?>
	
</table>

<p>Anápolis <?php echo htmlspecialchars( $data_devolucao, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<div class="assinatura lado-left">Responsável pelo Recebimento</div>
<div class="assinatura lado-right">Assinatura do Usuário</div>