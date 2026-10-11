<?php
  /**
   * end the current user session
   */

	// start session
	session_start();
  
  // require "../classes/Database.php";
  // require 'assets/auth.php';
  require 'assets/url.php';

  // isLoggedIn();

  // unravel cookies
  session_unset();

  // end session
  session_destroy();
  
  // starting point
  redirect('login.php');
  
  $conn->close();

?>