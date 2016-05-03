<?php
if (!file_exists("app/config/config.php"))
    exit("config.php tidak di temukan pada folder app/config");
else
    include "app/config/config.php";	
	
	spl_autoload_register(null, false);
    spl_autoload_extensions(".php");

    function __load($class)
    {
        $filename = ucfirst($class).".php";
        $file = "system/$filename";
        if (!file_exists($file))
            return false;
        else
            include $file;
    }

    spl_autoload_register("__load");

// End Of file loader.php
