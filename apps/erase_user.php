<?php 
	if ($_SESSION && $_SESSION["id"]==$articles["users_id"])
	{
		require 'views/erase_user.phtml';
	}

?>