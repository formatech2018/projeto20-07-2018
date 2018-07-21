<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>

</head>
<body> 
	<div id="borda">
		<div id="div-carteirinha">
			 <p id="titulo5">DATA DE EMISSÃO: <?php echo htmlspecialchars( $atual, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			 <p id="titulo1">ITEGO</p>
			 <p id="titulo2">INSTITUTO TECNOLÓGICO DE GOIÁS - ANÁPOLIS</p>
			 <p id="titulo3">CARTEIRINHA BIBLIOTECA</p>
		</div>
		 <div id="div-nome">
			 	<p id="titulo4"><?php echo htmlspecialchars( $nome_usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			 </div>
			<div id="faixa-preta">
				<p>LIBRARY ITEGO</p>
			</div>
		<div id="div-imagem">
			<img id="tamanho" src="/vendor/libraryitego/WebContent/view/img/logoitego.png">
		</div>

		<div id="div-barra">
			<img src="data:image/jpg;base64,<?php echo htmlspecialchars( $imgbarra, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="barra">
		</div>

		</div>
	</div>
</body>
</html>