<?php
/**
 * controller system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package System_controller.php
 * 
 */ 
 
class System_controller
{	
	public $load;
	public $uri;
	public $model;
	public $base_url;
	public function __construct(){
		$this->load = new Loader;
		$this->model = $this->load;
		$this->uri = new Uri;		
	}

}

// End off file System_controller.php
