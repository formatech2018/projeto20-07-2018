<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="color-fundo-titulo">
<h1 class="align-center titulo">Relatório de Funcionarios por Quantidade</h1>
</div>
<table>
	<tr>
		<td class="strong">Total de Funcionários</td> 
		<td class="align-center"><?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	</tr>
</table>