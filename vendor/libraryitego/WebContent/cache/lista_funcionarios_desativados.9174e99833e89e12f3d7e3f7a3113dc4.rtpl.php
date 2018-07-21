<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Funcionários Desativados</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">FUNCIONÁRIO</th>
        <th scope="col">CPF</th>
        <th scope="col">CARGO</th>
        <th scope="col">EMAIL</th>
        <th scope="col">AÇÃO</th>
        
       
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>
      <tr>
      
        <th scope="row"><?php echo htmlspecialchars( $value1["nome_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th> 
        <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td><?php echo htmlspecialchars( $value1["nome_cargo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td><a href="/valida/funcionario/<?php echo htmlspecialchars( $value1["usuario_idusuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary botao tamanhob"> Ativar</a>
        <a href="/usuario/funcionario/delete/<?php echo htmlspecialchars( $value1["usuario_idusuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger botao tamanhob botaoexcluir">Excluir</a></td>
        
      </tr>
     <?php } ?>
    </tbody>
  </table>
</div>