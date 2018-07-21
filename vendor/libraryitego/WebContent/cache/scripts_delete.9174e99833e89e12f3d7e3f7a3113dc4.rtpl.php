<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">
	
	$(document).ready(function () {

        $(".botaoexcluir").click(function (e) {
            var result = window.confirm('Deseja Excluir o registro?');
            if (result == false) {
                e.preventDefault();
            };
        });
    });
</script>