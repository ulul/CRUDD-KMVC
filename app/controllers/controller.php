<?php 
class controller extends System_controller
{
	function __construct(){
		parent::__construct();

	}
	function index(){ 
		Render::view("hello_word");	
	}
	
}
// End of file controller.php
