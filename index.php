<?php
  /**
   * first page seen
   * Hey there this is index branch responsing
   */

	// start session
	session_start();


  // require fro the login info
  require 'assets/url.php';
	require 'assets/auth.php';

	isLoggedIn();

?>