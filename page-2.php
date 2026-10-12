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
  <div>Hello page 1</div>
<?php include 'includes/footer.php'; ?>