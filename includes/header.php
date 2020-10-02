<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Import site constants, db, and function PHP files -->
    <?php 
        // Start session and output buffer for redirecting
        session_start();
        ob_start();
       
        // Required Files
        require("./includes/constants.php");
        require("./includes/db.php");
        require("./includes/functions.php");
    
        $message = flashMessage();

        // Set time zone for logging user activity in text files and database
        date_default_timezone_set("America/New_York");
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>&lt;S/A&gt; | <?php echo $title; ?></title>

    <!-- 
        Author: Scott Alton
        Filename: <?php echo $file . "\n"; ?>
        Date: <?php echo $date . "\n"; ?>
        Description: <?php echo $description . "\n"; ?>

    -->

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/styles.css" rel="stylesheet">
	
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-success" href="./index.php">&lt; S / A &gt; Corp.</a>
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="./sign-in.php">Sign Out</a>
        </li>
        </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link btn btn-success mx-3 text-center round" href="./index.php">Home</a>
              </li>
                <li class="nav-item my-2 ">
                  <a class="nav-link btn btn-success mx-3 text-center round" href="dashboard.php">
                    <span data-feather="home"></span>
                    <?php if($_SESSION) {echo "Dashboard";} else { echo "Sign-in";} ;?> <span class="sr-only">(current)</span>
                  </a>
                </li>
             </ul>
          </div>
        </nav>

        <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 text-center">
          <div class="d-block flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          