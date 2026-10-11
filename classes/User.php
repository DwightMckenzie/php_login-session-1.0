<?php


  /**
   * user
   * 
   * person or entity that can login to the site
   */
  class User {

    /**
     * unique id
     * @var int
     */
    public $id;
    /**
     * unique username
     * @var string
     */
    public $username;
    /**
     * unique username
     * @var string
     */
    public $password;

    /**
     * Authenticate username and password
     * 
     * @param conn string
     * @param username string
     * @param password string
     * 
     * @return boolean true if credientials are true, null other wise
     * 
     */
    public static function authenticate($conn, $username, $password) {
      
      // return $username == 'dwight' && $password == 'ABC123%';

      $sql = "SELECT *
              FROM users
              WHERE username=:username";

      $stmt = $conn->prepare($sql);
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

      $stmt->execute();

      if ($user = $stmt->fetch()) {
        return password_verify($password, $user->password);
      }

    }

  }