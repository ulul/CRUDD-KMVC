<?php
/**
 * Query system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package Query.php
 * 
 */ 

class Redirect
{
	
	static function location($controller)
	{
		include 'app/config/config.php';
		$jum_root_dir = strlen($config["base_url"]);
		$cek_root_dir = substr($config["base_url"], $jum_root_dir-1, $jum_root_dir);
		if ($cek_root_dir == "/") {
			$slash = "";
		}else{
			$slash = "/";
		}
		header("location:".$config["base_url"].$slash.$controller);
	}
}
// End off file Resirect.php
