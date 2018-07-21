<?php 
namespace Controller\util;

	/**
	 * 
	 */
	class Encripty 
	{
		
		public static function toEncripty(String $senha)
		{
			$options = array(
				'cost' => "12",
				'salt' => "@#$%&*!!/*&&@$#12$#@35"
			);
			
			return password_hash($senha,PASSWORD_BCRYPT, $options);
			 
		}
	}



 ?>