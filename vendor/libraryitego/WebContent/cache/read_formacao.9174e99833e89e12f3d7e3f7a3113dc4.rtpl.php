<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Listar Formações</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">FORMAÇÃO</th>
        <th scope="col">AÇÃO</th>
       
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($resultformacao) && ( is_array($resultformacao) || $resultformacao instanceof Traversable ) && sizeof($resultformacao) ) foreach( $resultformacao as $key1 => $value1 ){ $counter1++; ?>

      <tr>
      
        <td scope="row"><?php echo htmlspecialchars( $value1["nome_formacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
         <td><a href="/crud/funcionario/formacao/<?php echo htmlspecialchars( $value1["idformacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-warning botao">Editar</a>
          <a href="/crud/funcionario/formacao/<?php echo htmlspecialchars( $value1["idformacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger botao">Excluir</a>
         </td>
 
      </tr>
     <?php } ?>

    </tbody>
  </table>
</div>