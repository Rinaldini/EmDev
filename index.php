<?php
	
	include("create_testdb.php");

	include("db.php");
	include("view/View.php");
	include("model/Model.php");
	include("controller/Controller.php");

	$control = new Controller();
	$control->index();
	
	//phpinfo();

?>