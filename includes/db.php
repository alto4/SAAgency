<?php 

  /*
    Name: Scott Alton
    Date: September 16, 2020
    File: db.php
    Description: This file contains the functions used to connect to the site's postgres database, and makes use of constants imported from constants.php to do
  */

  function db_connect() {
    return pg_connect("host=" . DB_HOST . " port=" . DB_PORT . " dbname=" . DATABASE . " user=" . DB_ADMIN . " password=" . DB_PASSWORD);
  }

  $conn = db_connect();

  $user_select_stmt = pg_prepare($conn, "user_select_stmt" ,"SELECT * FROM users WHERE EmailAddress = $1");
  $user_update_login_time_stmt = pg_prepare($conn, "user_update_login_time_stmt", "");

  $result = pg_execute($conn, "user_select_stmt", array("scottalton@gmail.com"));
  //$result = pg_execute($conn, "user_select_all", array());

  function user_select($result)
  {
    // Loop through array of results if present and dump all user account information
    if(pg_num_rows($result) == 1) {
      $user = pg_fetch_assoc($result, 0);
      dump($user); 

    // Authenticate user based on password comparison
      $is_valid_user = password_verify("password", $user["password"]) ? "AUTHENTICATED" : "NOT LOGGED IN!";

      echo "User authenticated status? : " . $is_valid_user;
  }
}


?>