
<?php 
if (isset($_SESSION['login'])) 
	{
		require 'views/header_user.phtml';
	}
	else  
	{
		require "views/header.phtml";
	}

?>