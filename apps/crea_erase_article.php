<?php 
	// var_dump($_GET["id"]);
	// die();
if (isset($_GET["id"]))
{
	$id = intval($_GET['id']);

	$ask = mysqli_query($db,' SELECT * FROM articles WHERE  id='.$id);
	$ask=mysqli_fetch_assoc($ask);
	$title=$ask["title"];
	$content=$ask["content"];
	$date_articles=$ask["date_articles"];	
}
else
{
	$title="";
	$content="";
	$date_articles="";

}
	require 'views/crea_erase_article.phtml';
 ?>