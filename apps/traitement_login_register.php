<?php 
if(isset($_POST['login'])) {
	if(isset($_POST['email'], $_POST['password'])) {

		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);


		if (empty($email)) {
		
			$error = " Merci de remplir le champ email";
		} else if (empty($password)) {
			$error = " Merci de remplir le champ password";
		} else {
			$res = mysqli_query($db,' SELECT * FROM users WHERE email="'.$email.'" AND password="'.$password.'"');
			$user = mysqli_fetch_assoc($res);
			if (!$user) {
				$error = " l'email ou le mot de passe ne sont incorrects";
			}
			else
			{
				$bien = " Tout se passe bien pour le moment ! ";
				$_SESSION["id"] = $user["id"];
				$_SESSION['email'] = $user['email'];
				$_SESSION["login"] = $user["pseudo"];
				header("Location: index.php?page=home");
				exit;
			} 
		}
	} 
}
if(isset($_POST['register'])) 
{
	if(isset($_POST['email'], $_POST['pseudo'],  $_POST['password'], $_POST['password2'])) 
	{
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$pseudo = mysqli_real_escape_string($db,$_POST['pseudo']);
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		
		if (empty($email)) 
		{
			$error = " Merci de remplir le champ email";
		} 
		else if (empty($pseudo)) 
		{
			$error = " Merci de remplir le champ pseudo";
		}
		 else if (empty($password)) 
		{
			$error = " Merci de remplir le champ password";
		} 
		else if (empty($password2)) 
		{
			$error = " Merci de remplir le champ password2";
		} 
		else if($password!=$password2)
		{
			$error="les mots de passes ne correspondent pas";
		}
		else 
		{			
			$query = "INSERT INTO users (email, pseudo, password) VALUES('".$email."', '".$pseudo."', '".$password."')";
			mysqli_query($db, $query);
			$id = mysqli_insert_id($db);
			var_dump($_POST,mysqli_error($db));
			header("Location: index.php?page=home");
			exit; 
		} 
	
	}
}
 ?>