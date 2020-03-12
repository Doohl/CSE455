<?php
// Include config file
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '96.44.135.40');
define('DB_USERNAME', 'eirnex_clay');
define('DB_PASSWORD', '4+@_S@+Eb5r2');
define('DB_NAME', 'eirnex_ProjectEir');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Define variables and initialize with empty values
//$username = $password = $confirm_password = "";
//$username_err = $password_err = $confirm_password_err = "";

var_dump($_POST);

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	//validate email
	if(empty(trim($_POST["signupEmail"])))
	{
		$useremail_err = "Please enter a email.";
	}
	else
	{
        // Prepare a select statement
        $sql = "SELECT unique_id FROM users WHERE email=? ";

        if($stmt = mysqli_prepare($link, $sql))
		{			
            // Set parameters
            $param_useremail = trim($_POST["signupEmail"]);
			
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_useremail);


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
				{
                    $username_err = "This email is already taken.";
                } 
				else
				{
                    $useremail = trim($_POST["signupEmail"]);
                }
            } 
			else
			{
                echo " Oops! Something went wrong. Please try again later. (Inside $_POST[signupEmail] ";
            }

            // Close statement
            mysqli_stmt_close($stmt);

        }		
	}
		
    // Validate username
    if(empty(trim($_POST["username"])))
	{
        $username_err = "Please enter a username.";
    } 
	else
	{
		$param_username = $_POST["username"];
        // Prepare a select statement
        $sql = "SELECT unique_id FROM users WHERE username=? ";

        if($stmt = mysqli_prepare($link, $sql))
		{
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
				
				//echo "It worked?";
            } 
			else
			{
                echo " Oops! Something went wrong. Please try again later. (Inside $_POST[Username] ";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
	{
		// Prepare an insert statement
		$sql = "INSERT INTO users (email, username, hash, salt) VALUES (?, ?, ?, ?) ";

        if($stmt = mysqli_prepare($link, $sql))
		{
			// Set parameters
			$param_email = $useremail;
            $param_username = $username;
            $param_salt = substr(md5(microtime()),rand(0,26),10); // generate random 10 char string
            $param_password = password_hash($password . $param_salt, PASSWORD_DEFAULT); // Creates a password hash

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'ssss', $param_email, $param_username, $param_password, $param_salt);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                //Redirect to login page
                //header("location: login.php");
				echo "It worked?";
            } 
			else
			{
                echo "Something went wrong. Please try again later. (Inside INSERT)";
                echo $stmt->error;
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}

?>
