<?php
	
	require("create_testdb.php");

	require("db.php");
	require("view/View.php");
	require("model/Model.php");
	require("controller/Controller.php");

	$control = new Controller();
	$control->index();
	
	phpinfo();

?>