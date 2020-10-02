<?php 
  // Required Files
  require("./includes/constants.php");
  require("./includes/db.php");
  require("./includes/functions.php");

  // Log sign out event
  $email = $_SESSION['email'];

  if($email)
  {
    updateLogs($email, "sign-out");
  
    // If a session already exists, it will be destroyed and captured in the logs
    session_destroy();  
  }
  
  redirect("sign-in.php");
      
  
?>
