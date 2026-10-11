<?php
  /**
   * Page: One 
   * 
   * Empty sample
   * 
   */

  // start session
  session_start();

  // require
  require "classes/Database.php";
  require 'assets/auth.php';

  // check if logged in
  isLoggedIn();

  // set page information
  $pg_title = 'Page 1';
  $pg_class = 'page-1';
  $pg_desc = 'page one description';
  $pg_keywords = 'keywords here';
  
  // database connection
  $db = new Database();
	$conn = $db->getConn();

  // include parts
  include "includes/header.php";
  include "includes/navbar.php";

  // variables
  $user_id = $_SESSION['id'];
	$user_name = $_SESSION['username'];
  $user_status = $_SESSION['status'];
?>

<div>Hello page 1</div>

<?php  include 'includes/footer.php';  ?>