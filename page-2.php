<?php
  declare(strict_types=1);

  require 'includes/session.php';
  require 'includes/auth.php';

  start_secure_session();
  requireLogin();

  $pg_title = 'Page 2';
  $pg_class = 'page-2';

  include 'includes/header.php';
  include 'includes/navbar.php';
?>
	
	<div class="row">	
		<div class="col-md-12">
			<h4>Welcome to <?= $pg_title; ?></h4>
		</div>
	</div>
	
<?php include 'includes/footer.php'; ?>