<?php
  declare(strict_types=1);

  require 'assets/session.php';
  require 'assets/auth.php';

  start_secure_session();
  requireLogin();

  $pg_title = 'Page 3';
  $pg_class = 'page-3';

  include 'includes/header.php';
  include 'includes/navbar.php';
?>
<div>Hello page 1</div>
<?php include 'includes/footer.php'; ?>