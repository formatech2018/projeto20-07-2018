<?php if(!class_exists('Rain\Tpl')){exit;}?><h1 class="color-fundo-titulo titulo titulo-autorizacao">Autorização de Empréstimo para Funcionários</h1>

<p class="p">Fica autorizado o funcionário(a) <strong><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, portador do cpf <strong><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> e telefone <strong><?php echo htmlspecialchars( $telefone_celular, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, que exerce o cargo de <strong><?php echo htmlspecialchars( $nome_cargo, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> na instituição.</p>
<p class="p">O empréstimo do(s) livro(s):</p>



<table id="tabela-autorizacao-aluno">
	<tr>
		<th>Patrimônio</th>
		<th>Nome do livro</th>
		<th>Data de empréstimo</th>
		<th>Data limite para devolução</th>
	</tr>
	<?php $counter1=-1;  if( isset($resultado) && ( is_array($resultado) || $resultado instanceof Traversable ) && sizeof($resultado) ) foreach( $resultado as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["data_emprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["previsao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	</tr>
	<?php } ?>
</table>

<p class="paragrafo">Durante o período de <strong>07</strong> (sete) dias, responsabiliza-se pela guarda, zelo e conservação do exemplar e de efetuar davolução no dia marcado, o usuário da biblioteca, conforme o Estatuto da Biblioteca.</p>

<p class="paragrafo">Caso a devolução não seja realizada na prevista data, haverá cobrança de <strong>multa</strong> correspondente ao período de atraso e as demais sessões regidas pelo referido estatuto.</p>


<p>Anápolis <?php echo htmlspecialchars( $data_emprestimo, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<div class="assinatura lado-left">Responsável pela Autorização </div>
<div class="assinatura lado-right">Assinatura do Funcionário</div>