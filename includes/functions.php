<?php 

  /*
    Name: Scott Alton
    Date: October 2, 2020
    File: functions.php
    Description: This file contains functions that are used accross the site for flash messaging, redirecting, and message logging.
  */

  // redirect function - sends the user to desired location and sends the contents of output buffer
  function redirect($url) {
    header("Location:" . $url);
    ob_flush();
  }

  // setMessage function
  function setMessage($message) {
    $_SESSION['message'] = "<div>$message</div>";
  }

  // getMessage function
  function getMessage() {
    return $_SESSION['message'];
  }

  // isMessage function
  function isMessage() {
    return isset($_SESSION['message']) ? true : false;
  }

  // removeMessage function
  function removeMessage() {
    unset($_SESSION['message']);
  }

  // flashMessage function 
  function flashMessage() {
    $message = "";
    
    // Check if a session message has been sent
    if(isMessage()) {
      $message = getMessage();
      removeMessage();
    }

    return $message;
  }

  // dump function - shows formatted array data with whitespace/in human-readable format
  function dump($arg) {
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
  }

  // updateLogs function - updates user event logs detailing an event type and along with timing details
  function updateLogs($user, $event) {
    // Get current date/time details at time of the event
    $today = date("Ymd");
    $now = date("H:i:s");

    // Open current day's log file, or if non-existent, create a new one
    $handle = fopen("./activity_logs/" . $today . ".txt", 'a');

    // Write event to log file
    fwrite($handle, "$event event at $now $today. User $user $event." . "\n");
  }

?>