<?php

	ob_start();

	if($_SESSION['statut']!=1)
	{
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}

	ob_end_flush();
	
?>