<?php

$error='';
$email='';
$nom='';
$prenom='';
$birthdate='';
$address='';
$code='';
$ville='';
$tel='';
$inscription='';

if(isset($_SESSION['user']))
{
	require("apps/valid.php");
}

else if(isset($_POST['f_email'], $_POST['f_password'], $_POST['f_submit']) && $_POST['f_nom'] == "")
{
	$res = mysqli_query($db, "SELECT * FROM t_user WHERE email ='".$_POST['f_email']."'");
	$data = mysqli_fetch_assoc($res);

	if ($data == NULL)
	{
		$email=htmlentities($_POST['f_email']);
		$inscription="OK";
		require('views/form.phtml');
	}
	else 
	{
		if ($data['password'] == md5($_POST['f_password']))
		{
			$_SESSION['user'] = $data['id'];
			require("apps/valid.php");	
		}
		else
		{
			$email= htmlentities($_POST['f_email']);
			$error = 'Mot de passe incorrect';
			require('views/form.phtml');
		}
	}
}
	

else if(isset($_POST['f_submit']) && $_POST['f_nom']!='')
{
	$req= "SELECT * FROM t_user WHERE email='".$_POST['f_email']."'";
	$res = mysqli_query($db, $req);
	if (mysqli_num_rows($res)==1)
	{
		$error="Vous &ecirc;tes d&eacute;j&agrave; inscrits.";
		require('views/form.phtml');
	}
	else
	{
		$user = new User($_POST);
		if ($user->isOK())
		{
			$req= "INSERT INTO t_user (email, name, firstname, password, birthdate, address, codePostal, ville, tel ) 
				VALUES('".mysqli_real_escape_string($db, $user->getEmail())."',
					'".mysqli_real_escape_string($db, $user->getName())."',
					'".mysqli_real_escape_string($db, $user->getFirstName())."',
					'".mysqli_real_escape_string($db, $user->getPassword())."',
					'".date("Y-m-d", strtotime($user->getBirthdate()))."',
					'".mysqli_real_escape_string($db, $user->getAddress())."',
					'".mysqli_real_escape_string($db, $user->getCodePostal())."',
					'".mysqli_real_escape_string($db, $user->getVille())."',
					'".mysqli_real_escape_string($db, $user->getTel())."')";
			mysqli_query($db,$req);	
			$_SESSION['user']= mysqli_insert_id($db);
			require("apps/valid.php");;		
		}
		else
		{
			$error="Certaines de vos donn&eacute;es sont incorrectes. Veuiller corriger votre inscription.";
			$email=htmlentities($_POST['f_email']);
			$nom=htmlentities($_POST['f_nom']);
			$prenom=htmlentities($_POST['f_email']);
			$birthdate=htmlentities($_POST['f_birthdate']);
			$address=htmlentities($_POST['f_address']);
			$code=htmlentities($_POST['f_code']);
			$ville=htmlentities($_POST['f_ville']);
			$tel=htmlentities($_POST['f_tel']);
			$inscription="OK";
			require('views/form.phtml');			
		}
	}
}

else 
	require('views/form.phtml');

