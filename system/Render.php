<?php 
/**
 * Render system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package Render.php
 * 
 */ 

class Render
{
	
	static function view($_viewne=null,$data=null){
		include "app/config/config.php";
		if ($config !=null) {
			if (is_array($config)) {
				foreach($config as $key => $val) {
					${$key} = $val;
				}
			}	
		}
		if ($data !=null) {
			foreach($data as $key => $val) {
				${$key} = $val; 
			}
		}
		
		require_once("app/views/{$_viewne}.php");
	}
	static function error($message,$error){
		if ($error == 404) {
			require_once("app/error/Error_404.php");
		}elseif($error == 42 ){
			require_once("app/error/Error_DB.php");
		}
		
		exit();
	}
	

}
// End of file Render.php
