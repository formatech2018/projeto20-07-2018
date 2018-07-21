<?php if(!class_exists('Rain\Tpl')){exit;}?>    <link rel="stylesheet" href="/vendor/libraryitego/WebContent/view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/libraryitego/WebContent/view/bootstrap/css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
</head>
<body>
  
  

  <div class="container topo">

  <div class="row">
    
  <div class="col-sm">  
    <img src="/vendor/libraryitego/WebContent/view/img/logoitego.png" class="rounded float-left espaco-topo espaco-bottom" alt="Logo do ITEGO">
  </div>
  <div class="col-sm">
    <img src="/vendor/libraryitego/WebContent/view/img/logotopo.png" class="rounded float-right espaco-topo espaco-bottom" alt="Logo do topo">
  </div>
 
  </div>
</div>
<div class="container topo">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary topo">
  

  <!-- <div class="navbar navbar-expand-lg navbar-dark topo " id="navbarSupportedContent"> -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="links-menus style-menu nav-link" href="/">Home</a>
    </li>
      <?php $counter1=-1;  if( isset($menu) && ( is_array($menu) || $menu instanceof Traversable ) && sizeof($menu) ) foreach( $menu as $key1 => $value1 ){ $counter1++; ?>

      <li class="nav-item <?php echo htmlspecialchars( $value1["dropdown"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <a class="nav-link <?php echo htmlspecialchars( $value1["toggle"], ENT_COMPAT, 'UTF-8', FALSE ); ?> style-menu " href='<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-toggle="<?php echo htmlspecialchars( $value1["dropdown"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["item"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
        <?php if( $value1["selected"] ){ ?>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php $counter2=-1;  if( isset($value1["submenu"]) && ( is_array($value1["submenu"]) || $value1["submenu"] instanceof Traversable ) && sizeof($value1["submenu"]) ) foreach( $value1["submenu"] as $key2 => $value2 ){ $counter2++; ?>

              <a class="dropdown-item sub-links" href="<?php echo htmlspecialchars( $value2["sublink"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["subitem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
            <?php } ?>

          </div>
        <?php } ?>

      </li>
      <?php } ?>

    </ul>
  <!-- </div> -->
</nav>
</div>
