<?php 
namespace ViewController;
use \ViewController\ControllerRainTpl;

	/**
	* 
	*/
	class RelatorioRainTpl extends ControllerRainTpl
	{
		

		function __construct()
		{
			$this->config_controller['tpl_dir'] = "vendor/libraryitego/WebContent/viewRelatorio/";
			parent::__construct();
		}

		function __destruct(){

			//exit;
		}
		
	}

 ?>