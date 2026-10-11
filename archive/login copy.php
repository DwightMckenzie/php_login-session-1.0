<?php

  // start session
  session_start();

  // set page information
  $pg_title = 'Login';
  $pg_class = 'login';

  // require include
  require 'classes/Database.php';
  require 'assets/auth.php';
  require 'classes/User.php';
  require 'assets/url.php';
  
  // database connection
  $db = new Database();
  $conn = $db->getConn();

  // server request method type
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // if feilds empty send notice, otherwise continue
    if (empty($_POST['username']) || empty($_POST['password'])) { 
      $notice = '<div class="alert alert-warning" role="alert">
                  Please fill in Username and Password fields
                </div>';
    } else {

      // input variables from login form
      $username = $_POST['username'];
      $password = $_POST['password'];

      /**
       * Check if username is in the database
       * 
       * @var $sql, username only
       *  
       * @var string $stmt-bindvalue = username from form  
       * @var string $stmt-execute = array key value
       * @var array $user-fetch = array assoc
       */
      $sql = "SELECT * FROM users WHERE username=:username";
      $stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->execute(
        array(
          'username' => $username
        )
      );

      // user array
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // if user is found, otherwise notice
      if ($user !== FALSE) {
        /**
         * validate username & password
         * 
         * TRUE = login as user, direct to index page
         * FALSE = notice username not found
         */
         
        /** 
         * --- begin 2024-01-01
         * NOTE: The "HASH" is used for the MD5 type line 74
         * --> $hash_dbpwd = password_hash($user['password'], PASSWORD_DEFAULT);
         * 
         * - when ready to use the MD5 type swapp the if (arguments) line 77
         * --> if ($user['username'] && password_verify(md5($password), $hash_dbpwd)) {
         * --- end 2024-01-01
         */
        
        // decifer the MD% cell in database
        $hash_dbpwd = password_hash($user['password'], PASSWORD_DEFAULT);
                
        // are both username and password present, otherwsie notice
        if ($user['username'] && password_verify(md5($password), $hash_dbpwd)) {
        // if (User::authenticate($conn, md5($password), $hash_dbpwd)) {

        // if ($user['username'] && $password === $user['password']) {
          $_SESSION['username'] = $user['username'];
          $_SESSION['id'] = $user['id'];
          $_SESSION['logged_in'] = true;
          $_SESSION['status'] = 'logged-in';
 
          // isLoggedIn();
          // redirect("index.php");// ORIG
          redirect("page-1.php");// ORIG
          // directory("page-1.php");// ORIG

        } else {
          $notice = '<div class="alert alert-warning" role="alert">
                      invalid Password - Please try again!
                    </div>';
        }

      } else {
        $notice =  '<div class="alert alert-warning" role="alert">
                    User not found - Please try again!
                  </div>';

      }
     
    } // end: fields empty

  }

?>

<?php require 'includes/header.php'; ?>

<div class="container">
  <div id="login">
    <h3 class="text-center pt-5"><?php if(isset($app_name)) { echo $app_name; }; ?></h3>
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <h3 class="text-center text-info">Login</h3>
          <?php if (! empty($notice)): ?>
          <p><?= $notice ?></p>
          <?php endif; ?>
          <form id="login-form" class="form" method="post">
            
            <div class="form-group">
              <label for="username" class="text-info">Username:</label><br>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="password" class="text-info">Password:</label><br>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-sm btn-info">Login</button>
            </div>
          </form>
          <!-- <div class="row">
            <div id="reset-link" class="col-md-6">
              <a href="src/reset-request.php" class="text-info">Forgot Password</a>
            </div>
            <div id="register-link" class="col-md-6 text-right">
              <a href="register.php" class="text-info">Create Account</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div><!-- end .container -->

<?php require 'includes/footer.php'; ?>
