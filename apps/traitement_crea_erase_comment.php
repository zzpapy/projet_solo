<?php 
	if (isset($_POST["action"],$_POST["id"]))
	{
var_dump($_POST);
		if($_POST["action"]=="comment")
		{
			// var_dump($_POST["comment"]);
			$comment=mysqli_real_escape_string($db,$_POST["comment"]);
			$articles_id=mysqli_real_escape_string($db,$_POST["id"]);
			$users_id=$_SESSION["id"];
			$query = "INSERT INTO comment (comment,articles_id,users_id) VALUES('".$comment."','".$articles_id."','".$users_id."')";
			mysqli_query($db, $query);
			mysqli_error($db);
			$id = mysqli_insert_id($db);

			header("Location: index.php?page=article&id=".$articles_id);
			exit;

		}
	}
 ?>