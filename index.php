<?php
$time_start = microtime(TRUE);  
error_reporting(E_ALL);
$path = array("app","vendor","system");
	foreach ($path as $path) {
		if (!is_dir($path)) {
			exit("Folder {$path} tidak di temukan");
		}
	}	
if (!file_exists("vendor/loader.php"))
    exit("loader.php tidak di temukan pada folder vendor");
else
    include "vendor/loader.php";

$app = new App;
$app->start();
$time_stop = microtime(TRUE);
echo "Benchmark : "; echo $time_stop-$time_start; 
//End of file index.php
