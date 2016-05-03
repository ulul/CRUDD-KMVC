<?php
/**
 * Uri system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package Uri.php
 * 
 */ 

class Uri 
{
    static $segments = array();
    public function __construct()
    {
        if (!empty($_SERVER['PATH_INFO'])){ 
            $uri = $_SERVER['PATH_INFO'];
            self::$segments =  explode('/', $uri);
        }
    }
    public function segments($index)
    {
        if (array_key_exists($index, self::$segments)){
            return self::$segments[$index]; 
        }else{
            return false;
        }
    }
}
// End Of file Uri.php
