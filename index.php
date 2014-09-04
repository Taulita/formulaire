<?php
	session_start();

	require("sources/confphp/parametres.conf.php");
	require("models/user.class.php");

	$page = "form";
	
	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}
	else
		$_GET['page']="";

	require("apps/skel.php");

?>