<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Verificação de existência de multa</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">DATA PREVISTA PARA A DEVOLUÇÃO</th>
        <th>DATA DA DEVOLUÇÃO</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo htmlspecialchars( $previsao, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td><?php echo htmlspecialchars( $devolucao, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
       
      </tr>
    </tbody>
  </table>

  <table class="table table-sm table-primary">
      <tbody>
        <tr>
          <th scope="row">SITUAÇÃO MULTA</th>
          <td><?php echo htmlspecialchars( $exists_multa, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
        <tr>
          <th scope="row">DIAS DE ATRASO</th>
          <td><?php echo htmlspecialchars( $dias_atraso, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
        <tr>
          <th scope="row">VALOR DIÁRIO DA MULTA</th>
          <td><?php echo htmlspecialchars( $valor_diario_multa, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
        <tr>
          <th scope="row">TOTAL A PAGAR</th>
          <td><?php echo htmlspecialchars( $valor_total_multa, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
      </tbody>
    </table>
</div>