<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">
	$(document).ready(function(){
  	$('.cpf').mask('999.999.999-99');
  	$('.fixo').mask('(99) 9999-9999');
  	$('.celular').mask('(99) 9 9999-9999');
  	$('.cep').mask('99.999-999');
  	$('.dtnasc').mask('99/99/9999');
    $('#data').mask('99/99/9999');

    $('#alerta').css("display", "none");

    if ($('#tipo').val() != 'funcionario') {
        $('#campos-funcionario').hide(); 
    }

});
</script>