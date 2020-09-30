<?php
    $title = "Home";
    $file = "index.php";
    $description = "Lab #1 is captured in this page and demonstrates several skills using PHP, including: database set-up, user login functionality, and...";
    $date = "October 2, 2020";

    include "./includes/header.php";

    // Redirect a user to the sign-in page if not logged in or registered
    //ob_flush();

?>

<h2 class="text-success"><?php echo $message; ?></h2>
<div class="jumbotron">
  <h1 class="display-4">Welcome to the S/A Agency Website</h1>
  <p class="lead">This site will showcase various PHP/PostgreSQL skills learned throughout the semester in WEB3201.</p>
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-success btn-lg mx-auto" href="#" role="button">Learn more</a>
  </p>
</div>

<?php
    include "./includes/footer.php";
?>    