<?php 
/**
 * Loader system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package loader.php
 * 
 */ 

class Loader
{
	public function model($modelName){
		if (file_exists("app/models/{$modelName}.php")) {
			include("app/models/{$modelName}.php");
			try {
				if (!class_exists($modelName))
				throw new Exception("Nama file {$modelName} harus sama dengan nama class ");				
			else
				$this->$modelName = new $modelName;
			} catch (Exception $e) {
				$trace =  $e->getTrace(); 
				Render::error($e->getMessage()." ".$trace[0]['file']." on  Line <font color='red'> ".$trace[0]['line']."</font>", 42);
			}
			
		}else{
			Render::error("Model {$modelName}.php tidak di temukan", 404);
		}
		
	}
}

//End of file Loader.php
