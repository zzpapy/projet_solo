<?php
	//var_dump($_POST);
	session_start();
	$db = mysqli_connect("localhost", "root", "troiswa", "projet_solo");
	


	$erase="";
	$error = '';
	$page = 'home';
	$access = [
		"home",
		"list_articles",
		"crea_erase_article",
		"crea_erase_comment",
		"login_register",
		"article"
		];
	$db= mysqli_connect("localhost","root","troiswa","projet_solo");

	
	if (isset($_GET['page']) && in_array($_GET['page'], $access))
	{
		$page = $_GET['page'];
	}
	
	$accessTraitement = [
		"crea_erase_article",
		"crea_erase_comment",
		"login_register",	
		"voyage"];
	
	if (isset($_GET['page']) && in_array($_GET['page'], $accessTraitement)) {
		require 'apps/traitement_'.$_GET['page'].'.php';
	}

	require 'apps/skel.php';
?>