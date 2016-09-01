<?php 
	$ask = mysqli_query($db,' SELECT * FROM articles' );
	
	
	while($articles = mysqli_fetch_assoc($ask))
	{
		require 'views/list-article.phtml';
	}
	
 ?>