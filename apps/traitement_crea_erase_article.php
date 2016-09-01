<?php 

if (isset($_POST["edit"],$_POST["title"], $_POST['content'], $_POST['date_articles']))
{
	$title=$_POST["title"];
	$content=$_POST['content'];
	$date_articles= $_POST['date_articles'];
	$id=$_POST["edit"];
	$res=mysqli_query($db,'UPDATE articles SET title="'.$title.'", content="'.$content.'",date_articles="'.$date_articles.'" WHERE id="'.$id.'"');
	// var_dump($_POST,mysqli_error($db));
	// die();
	header("Location: index.php?page=article&id=".$id);
			exit; 

}
// var_dump($_POST);
// die();
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
if (isset($_POST["action"],$_POST["id"])&& $_POST["action"]=="erase")
{
	$id = intval($_POST['id']);

	if(isset($_POST["action"]) && $_POST["action"] == "comment"){
		$query = "DELETE FROM comments WHERE id=".$comments["articles_id"];
	}else{
		$query = "DELETE FROM articles WHERE id=".$id;
	}
	mysqli_query($db, $query);
	
	header("Location: index.php?page=home");

	exit;
}

 ?>