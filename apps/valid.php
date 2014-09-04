<?php
if (isset($_POST['f_logOut']))
{
	session_destroy(); 
	$_SESSION=array();
	require("apps/form.php");
}
else
{
	$res = mysqli_query($db, "SELECT * FROM t_user WHERE id ='".$_SESSION['user']."'");
	while($user=mysqli_fetch_object($res,"User"))
	{
		require("views/valid.phtml");
	}	
	
}


?>