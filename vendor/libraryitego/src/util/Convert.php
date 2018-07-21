<?php 
namespace Controller\util;

use \DateTime;
use \DateTimeZone;
/**
* 
*/
class Convert
{
	
	public static function string_to_date(String $date)
	{
		$dt = strtotime(str_replace("/", "-", $date));
		$nf = date('Y-m-d',$dt);

		return $nf;
	}
	public static function date_to_string(String $date)
	{

		$dt = strtotime($date);
		$nf = date('d-m-Y',$dt);
		$nf = str_replace("-", "/", $nf);

		return $nf;
	}

}

 ?>