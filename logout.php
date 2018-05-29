<?php

  ob_start();

  // Inialize session
  session_start();

  // Delete all session variables
  session_destroy();

  // Jump to login page
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";

  ob_end_flush();
 
 
?>