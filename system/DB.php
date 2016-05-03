<?php
/**
 * database system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package DB.php
 * 
 */ 

class DB
{
	static function connection(){
		
		if (!file_exists('app/config/database.php'))	
			Render::error("file database.php tidak di temukan pada folder app/config", 404);
		else
			include 'app/config/database.php';

		try {
			if (!is_array($db)) 
				throw new Exception("Variabel db bukan array ");
			
		} catch (Exception $e) {
			$trace =  $e->getTrace(); 
			Render::error($e->getMessage()." ".$trace[0]['file']." on  Line <font color='red'> ".$trace[0]['line']."</font>", 42);
		}

		$hostname = $db["hostname"];
		$database = $db["database"];
		 try {
           $conn = new PDO("mysql:host=$hostname;dbname=$database", $db["username"], $db["password"]);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           
        } catch (Exception $e) {
        	$trace =  $e->getTrace(); 
            Render::error($e->getMessage()." ".$trace[0]['file']." on  Line <font color='red'> ".$trace[0]['line']."</font>", 42);
        }
        return $conn;
	}
	
}


?>
