<?php 
/**
 * App system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package App.php
 * 
 */ 

class App extends Uri
{
	private $status;

	public function start(){
		session_start();
		$this->status = 1;
		include("app/config/config.php");
		if (!file_exists("app/config/route.php")) {
			Render::error("File route pada folder app/config tidak di temukan", 404);
		}else{
			include("app/config/route.php");
		}
		
		$controller = parent::segments(1);
		$function = parent::segments(2);
		if (empty($controller)) {
			$controller = $config["default_controller"];						
		}

		if (empty($function)) {
			$function = "index";
		}
/**
 * Cek uri routing pada config.php
 * */		
			if (!empty($_SERVER["PATH_INFO"])){
				if (empty($route[$_SERVER["PATH_INFO"]])){
					$jumlah_route = strlen($_SERVER["PATH_INFO"]);
					if(substr($_SERVER["PATH_INFO"],$jumlah_route-1,$jumlah_route) == "/"){
						$_SERVER["PATH_INFO"] = substr($_SERVER["PATH_INFO"],0,$jumlah_route-1);
						$jumlah_route = $jumlah_route-1;
					}
				}	
				$route_param = substr($_SERVER["PATH_INFO"], 1, $jumlah_route);
				if (!empty($route[$route_param] )){
					$uri = $route[$route_param];
					$pecah = explode('/', $uri); 
					$tot = count($pecah); 
						for ($i=0; $i <=$tot ; $i++) { 
							array_key_exists($i, $pecah);
						}
					$controller = $pecah[0];
					$function = $pecah[1];
				}
			}	
/**
 * Akses controller dan method
 * */		
 		if (!is_dir($controller))	{
			if (file_exists("app/controllers/$controller" . ".php")) {
				require_once("app/controllers/$controller" . ".php");
				if (class_exists($controller)) {
					if (method_exists($controller, $function)){
						$controller = new $controller();
						$controller->$function();
					}else{
						$message = "Halaman yang anda minta tidak dapat di temukan";
						Render::error($message, 404); 
					}
				}else{
					$message = "Halaman yang anda minta tidak dapat di temukan";
					Render::error($message, 404); 
				}	
				
			}else{
				$message = "Halaman yang anda minta tidak dapat di temukan";
				Render::error($message, 404); 
			}
		}			
	}
	
	public function __sleep(){
		if ($this->status !=1)
			exit("Aplikasi sedang dalam perbaikan");
		else
			exit("App telah berjalan dan tidak bisa menggunakan mode perbaikan");
	}

}
// End off file run.php
