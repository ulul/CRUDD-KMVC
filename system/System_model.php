<?php
/**
 * model system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package System_model.php
 * 
 */ 

class System_model 
{
	public $db;
	function __construct()
	{
		$this->db = new Query;
	}
 }
