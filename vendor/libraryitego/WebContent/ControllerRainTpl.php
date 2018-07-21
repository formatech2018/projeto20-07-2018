<?php 
namespace ViewController;
use \ViewController\RainTpl;
use Rain\Tpl;
/**
 * 
 */
class ControllerRainTpl extends RainTpl
{
	protected $config_controller = array(

		'tpl_dir' => ""
	);
	
	function __construct()
		{
			$this->config = array_merge($this->config,$this->config_controller);
			$this->tpl = new Tpl();
			$this->tpl->configure($this->config);
		}

		protected function setTpl($template = array()){
			$html = "";
			foreach ($template as $key => $value) {

				$html .= $this->tpl->draw($value,true);

			}
			return $html;
		}

		public function setConteudo($value = array(), $data = array())
		{
			$this->setData($data);
			return $this->setTpl($value);
		}

		
}

 ?>