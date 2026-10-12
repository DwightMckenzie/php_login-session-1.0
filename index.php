<?php
  /**
   * first page seen
   * Hey there this is index branch responsing
   */

	// start session
	session_start();


  // require fro the login info
  require 'includes/url.php';
	require 'includes/auth.php';

	isLoggedIn();

?>