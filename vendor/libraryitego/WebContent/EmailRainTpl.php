<?php 
namespace ViewController;
use \ViewController\ControllerRainTpl;
	/**
	 * 
	 */
	class EmailRainTpl extends ControllerRainTpl
	{
		function __construct()
		{
			$this->config_controller['tpl_dir'] = "vendor/libraryitego/WebContent/viewEmail/";
			$this->config_controller["cache_dir"] ="vendor/libraryitego/WebContent/viewEmail/cache/";
			parent::__construct();
		}

		function __destruct(){

		}
	}

 ?>