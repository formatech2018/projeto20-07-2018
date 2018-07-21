<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("scripts_cadastro_usuario");?>

<div class="container">
<h1 class="titulo-formulario">Pesquisar Aluno e Turma</h1>
<form action="/crud/turma/aluno/insert" method="POST">
	<div class="row">
	    <div class="col">
			<label>Cpf</label>
			<input type="text" id="cpf" name="cpf" class="form-control cpf" required>
		</div>
		 <div class="col">
		 	<label>Identificador da turma</label>
			<input type="number" id="idturma" name="idturma" value="idturma" class="form-control" required>
		</div>
		 

	</div>
 	<div>
	 	<button class="btn btn-primary botao">Pesquisar</button>
	 </div>

</form>
</div>