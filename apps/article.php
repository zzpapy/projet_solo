<?php 

	$id=$_GET['id'];

	$res = mysqli_query($db,' SELECT * FROM articles WHERE id="'.$id.'" ');
	$article=mysqli_real_escape_string($db,$_GET['id']);
	$article = mysqli_fetch_assoc($res);
	require 'views/article.phtml';
 ?>