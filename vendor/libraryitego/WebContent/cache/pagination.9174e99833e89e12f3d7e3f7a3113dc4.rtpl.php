<?php if(!class_exists('Rain\Tpl')){exit;}?><nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

    <li class="page-item ">
      <a class="page-link" href="/crud/<?php echo htmlspecialchars( $table, ENT_COMPAT, 'UTF-8', FALSE ); ?>/0/<?php echo htmlspecialchars( $value1["limite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/read" tabindex="-1">Primeira</a>
    </li>
    
      <li class='page-item <?php if( $value1["numero1"]>$value1["totalpag"] ){ ?> disabled <?php }else{ ?>  <?php } ?>'><a class="page-link" href="/crud/<?php echo htmlspecialchars( $table, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["pag1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["limite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/read"><?php echo htmlspecialchars( $value1["numero1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
      
      <li class='page-item <?php if( $value1["numero2"]>$value1["totalpag"] ){ ?> disabled <?php }else{ ?>  <?php } ?>'><a class="page-link" href="/crud/<?php echo htmlspecialchars( $table, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["pag2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["limite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/read"><?php echo htmlspecialchars( $value1["numero2"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
      
      <li class='page-item <?php if( $value1["numero3"]>$value1["totalpag"] ){ ?> disabled <?php }else{ ?>  <?php } ?>'><a class="page-link" href="/crud/<?php echo htmlspecialchars( $table, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["pag3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["limite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/read"><?php echo htmlspecialchars( $value1["numero3"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>

     
    
    
    <li class="page-item ">
      <a class="page-link " href="/crud/<?php echo htmlspecialchars( $table, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["ultima"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["limite"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/read">Última</a>
    </li>
    <?php } ?>

  </ul>
</nav>