<?php 
if (isset($_POST["action"]))
{
	if(isset($_POST["title"],$_POST["content"],$_POST["date_articles"]) && $_POST["action"]=="create")
	{
		$title=mysqli_real_escape_string($db,$_POST["title"]);
		$content=mysqli_real_escape_string($db,$_POST["content"]);
		$date_articles=mysqli_real_escape_string($db,$_POST["date_articles"]);
		$users_id=$_SESSION["id"];
		if ( empty($_POST["title"]))
		{ 
			$error="l'entrée title est vide";
			
			
			
		}
		elseif ( empty($_POST["date_articles"]))
		{ 
			$error="l'entrée date est vide";
			
			
			
		}
		elseif ( empty($_POST["content"]))
		{ 
			$error="l'entrée content est vide";		
		}
		else
		{
			$query = "INSERT INTO articles (title,date_articles,content,users_id) VALUES('".$title."', '".$date_articles."', '".$content."','".$users_id."')";
			mysqli_query($db, $query);
			$id = mysqli_insert_id($db);	
		


			
			header("Location: index.php?page=article&id=".$id);
			exit; 
		}
	}
}

 ?>