<?php 

/*
  Name: Scott Alton
  Date: September 16, 2020
  File: function.php
  Description: This file contains functions that are used accross the site.
*/


function redirect($url) {
  header("Location:" . $url);
  ob_flush();
}

function setMessage($message) {
  $_SESSION['message'] = "<div>$message</div>";
}

function getMessage() {
  return $_SESSION['message'];
}

function isMessage() {
  return isset($_SESSION['message']) ? true : false;
}

function removeMessage() {
  unset($_SESSION['message']);
}

function flashMessage() {
  $message = "";
  
  // Check if a session message has been sent
  if(isMessage()) {
    $message = getMessage();
    removeMessage();
  }

  return $message;
}

function user_authenticate($sessionId) {
  // If a user tries to access the dashboard without being logged in, redired to sign-in page
   if($sessionId == "") {
     header("Location:./sign-in.php");
     ob_flush();
     setMessage("Authentication failed!");
  } else {
     redirect("./dashboard.php");
     // NEEDS WORK - GET LAST LOGIN FROM SESSION ONCE IMPLEMENTED!!!!!!
     $lastLoginTime = pg_query($conn, "SELECT lastaccess FROM users WHERE emailaddress='$email'");
     setMessage("You successfully logged in. Your last login was on $lastLoginTime");
  }
} 

// Dump function - shows formatted array data with whitespace/in human-readable format
function dump($arg) {
  echo "<pre>";
  print_r($arg);
  echo "</pre>";
}

?>