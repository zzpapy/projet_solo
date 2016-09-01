<?php 
	$res = mysqli_query($db,' SELECT * FROM comments WHERE articles_id="'.$article["id"].'" ');
	
	while($comment = mysqli_fetch_assoc($res))
	{
		require 'views/crea_erase_comment.phtml';
	}
 ?>