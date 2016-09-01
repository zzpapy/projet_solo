<?php 
	if (isset($_POST["action"],$_POST["id"]))
	{
		if($_POST["action"]=="comment")
		{
			
			$comment=mysqli_real_escape_string($db,$_POST["comment"]);
			$articles_id=mysqli_real_escape_string($db,$_POST["id"]);
			$users_id=$_SESSION["id"];
			$query = "INSERT INTO comments (content,articles_id,users_id) VALUES('".$comment."','".$articles_id."','".$users_id."')";
			mysqli_query($db, $query);
			
		
			$id = mysqli_insert_id($db);

			header("Location: index.php?page=article&id=".$articles_id);
			exit;

		}
	}
 ?>