<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("busca_turma_has_aluno");?>


<div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Matrícula</h1>
<form id="formturmahasaluno" method="post" action="/crud/turma/aluno/matricula/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	
	

 	<table class="table">

 		<thead>
	    <tr>
	      <th scope="col">CPF</th>
	      <th scope="col">NOME DO ALUNO</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      
	      <td class="cpf"><?php echo htmlspecialchars( $cpf, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	     
	    </tr>
	    
	  </tbody>
 	</table>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">CÓDIGO DA TURMA</th>
	      <th scope="col">NOME DO CURSO</th>
	      <th scope="col">TIPO DO CURSO</th>
	      <th scope="col">TURNO</th>
	      <th scope="col">INÍCIO</th>
	       <th scope="col">PREVISÃO DE TÉRMINO</th>
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
	
	<div class="input-matricula">
	     <label for="formGroupExampleInput">Número da Matrícula</label>
	     <input type="number" id="matricula" name="matricula" class="form-control " placeholder="Digite o número da matrícula" required>
	     <input type="hidden" name="idaluno" id="idaluno" value="<?php echo htmlspecialchars( $idaluno, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	     <input type="hidden" class="form-control" name="idturma" id="idturma" value="<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
 	</div>
	<div class="form-row">
    	<div class="col">
			<button type="submit" class="btn btn-primary botao">Enviar</button>
		</div>
	</div>
</form>
</div>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			
			var matricula = "<?php echo htmlspecialchars( $matricula, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#matricula").val(matricula);

			$("#formturmahasaluno").append('<input type="hidden" name="matriculaantiga" id="matriculaantiga">');
			$("#matriculaantiga").val(matricula);
		
	});

</script>