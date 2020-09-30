<?php
    $title = "Login Page";
    $file = "sign-in.php";
    $description = "Lab #1 is captured in this page and demonstrates several skills using PHP, including: database set-up, user login functionality, and...";
    $date = "October 2, 2020";

    include "./includes/header.php";

    
    // Check for user input in required fields and process login transaction
    if($_SERVER["REQUEST_METHOD"]=="GET" || isset($_POST['rest']))
    {
        $email = "";
        $password = "";
        $output = "";
    } else  {
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $output = "";
        $date = "date(\"Y-m-d\", time())"; 

        // Activity Logging
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // Gather date info for logfiles
            $today = date("Ymd");
            $now = date("Y-m-d G:i:s");
            $action = "sign in";

            // Log to file for given day
            $handle = fopen("./activity_logs/" . $today . ".txt", 'a');
            
            fwrite($handle, "Sign in event at " . $now . ". User " . $email . " " . $action . ".");
        }
        
        // Save the function that connects to the database as a variable
        $conn = db_connect();
        
        // Verify that user id was entered, and if not, display an error message
        if(!isset($email) || $email == "")
        {
            $output .= "Please enter an email address.</br>";
        };

        // Verify that user password was entered, and if not, display an error message
        if(!isset($password) || $password == "")
        {
            $output .= "You must enter your password to login</br>";
        };

        // If both a login and a password have been set by the user, proceed to compare them to the database entries of user info
        if($output == "")
        {
            // Query the database
            $sql = "SELECT * FROM users WHERE emailaddress ='$email'";
            $result = pg_query($conn, $sql);
            $records = pg_num_rows($result);

            // Match entered id against ids that exist in the database - suppress warning message that pg_fetch_result will return if 0 rows found in query
            if(@pg_fetch_result($result, 0, "id") <> "" )
            {
                // Check entered password against the password associated with the entered id that exists in the database
                if( $password == pg_fetch_result($result, 0, "password"))
                {
                    
                    // If email and password are authenticated, output a welcome message to the user with a brief summary of their account activity
                    $output .= "<br/> Your account is associated with the email address " . pg_fetch_result($result, 0, "emailaddress") . " and you were last logged in on " . pg_fetch_result($result, 0, "lastaccess"). "</h3>";

                    $loggedIn = true;
                    
               
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    // Upon successful login, redirect user back to the dashboard page
                   
                    user_authenticate($email, $password);
                    
                    // Update the records of when the user has last logged in
                    $sql = "UPDATE users SET lastaccess = '" .date("Y-m-d", time()) . "' WHERE emailaddress='$email'";

                    pg_query($conn, $sql);

                    // Clear input from form fields
                    $password = "";
                }
                // If password does not match the corresponding id, output an error message
                else                 
                {
                    $output .= "The password you have entered is incorrect.<br />Please try again.";
                    $password = "";
                }
            }

            // If the user id is not found in the database records, display an error message and clear form fields
            else
            {
                $output .= "The email address <br/>" . $email . "<br/> has not been registered.";
                $email = "";
                $password = "";
            }
        }
    }

    // Display the results of the above authentication and valdiation tests
    echo "<h5 class='text-danger'>" . $output . "</h5>";
?>   
    
<div class="text-align-center">
    <p class="text-danger"><?php echo $message; ?></p>
<div>   
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    
    
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
</form>

<?php
    include "./includes/footer.php";
?>    