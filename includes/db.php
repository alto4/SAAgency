<?php
  /*
    Name: Scott Alton
    Date: October 2, 2020
    File: db.php
    Description: This file contains the functions used to connect to the site's postgres database, and makes use of constants imported from constants.php to do
  */

  // db_connect function - connects to the PostGreSQL database based on set constant values
  function db_connect() {
    return pg_connect("host=" . DB_HOST . " port=" . DB_PORT . " dbname=" . DATABASE . " user=" . DB_ADMIN . " password=" . DB_PASSWORD);
  }

  // user_select function - queries the database for id provided, returns an array containing user details if user found, or otherwise returns false
  function user_select($id) {  
    // Assume user does not exist
    $user = false;

    $conn = db_connect();
    
    // Prepared statement for selecting a user from the database
    $user_select_stmt = pg_prepare($conn, "user_select_stmt", "SELECT * FROM users WHERE EmailAddress = $1");
    $result = pg_execute($conn, "user_select_stmt", array($id));

    // Check for a result after querying database and if one exists, save it as an array to return user data
    if(pg_num_rows($result) == 1) {
      $user = pg_fetch_assoc($result, 0);
    }

    return $user;
  }

  // user_authenticate function - verifies that the user's password entry matches what is stored in the database before granting access
  function user_authenticate($id, $password) {
    // Ensure user credentials check out and store data in an array
    $userInfo = user_select($id);
    $password = $userInfo['password'];  
    // Verify the users password using password decryption function
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    if(password_verify($password, $userInfo['password'])) {
      
      $_SESSION['user'] = $id;
      
      update_last_login($id);
      return true;
    }

    return false;
  }
  
  // update_last_login function - accepts a logged in users id/email and updates the database record of their most recent sign in
  function update_last_login($id) {
    $conn = db_connect();

    // Generate a time stamp
    $timeStamp =  date("Y-m-d G:i:s");         

    // Update last login time
    $user_update_login_time_stmt = pg_prepare($conn, "user_update_login_time_stmt", "UPDATE users SET LastAccess = $1 WHERE EmailAddress = $2");

    $result = pg_execute($conn, "user_update_login_time_stmt", array($timeStamp, $id));
  }

?>