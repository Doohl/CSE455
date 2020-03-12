<?php

require_once 'config.inc.php';
//require_once 'Session.php';
//if(session_status() == PHP_SESSION_NONE)
//{
  //  Session::start();
//}
// Initialize the session

// Include config file
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//define('DB_SERVER', '96.44.135.40');
//define('DB_USERNAME', 'eirnex_clay');
//define('DB_PASSWORD', '4+@_S@+Eb5r2');
//define('DB_NAME', 'eirnex_ProjectEir');

/* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

//var_dump($_POST);
//echo '<pre>' , var_dump($_POST) , '</pre>';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   // echo "</br> Inside POST METHOD </br>";
    // Check if username is empty
    if(empty(trim($_POST["username"])))
    {
        //$username_err = "Please enter username.";
     //   echo "</br> Inside username error </br>";
     header("location: ../signin.php?signin=empty");
     exit();
    }
    else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"])))
    {
        //$password_err = "Please enter your password.";
       // echo "</br> Inside password error </br>";
       header("location: ../signin.php?signin=empty");
       exit();
    }
    else{
        $password = trim($_POST["password"]);
    }

    //echo $username . " " . $password . "</br>";

    // Validate credentials
    if(isset($username) && isset($password))
    {
      //  echo "</br> Inside Validate credentials </br>";
        // Prepare a select statement
        $sql = "SELECT username, hash, salt FROM users WHERE username= ?";

        //echo '<pre>' , var_dump($link) , '</pre>';

        if($stmt = mysqli_prepare($link, $sql))
        {
        //    echo "</br> Inside stmt </br>";
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
                {

          //          echo "</br> Inside mysqli_stmt_num_rows </br>";

                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $salt);
                    //echo "</br> hashed_password: " . $hashed_password . " </br>";


                    if(mysqli_stmt_fetch($stmt))
                    {
              //          echo "Inside fetch </br>";
            //            echo '<pre>' , var_dump($stmt) , '</pre>';

                //        echo "Password: " . $password . "</br>";
                  //      echo "Hashed: " . $hashed_password . "</br>";
                    //    echo "Salt: " . $salt . "</br>";

                        /*
                         *  $param_salt = substr(md5(microtime()),rand(0,26),10); // generate random 10 char string
                            $param_password = password_hash($password . $param_salt, PASSWORD_DEFAULT); // Creates a password hash
                         */

                       // echo "w/Salt: " . password_hash($password . $salt, PASSWORD_DEFAULT) . "</br>";
                      //  echo "Verify: " . password_verify($password . $salt, $hashed_password) . "</br>";

                        if(password_verify($password . $salt, $hashed_password))
                        {
                         //   echo "Inside password_verify </br>";
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            //$_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            //session::login($userName);
                            session_commit();
                            //Redirect user to welcome page
                            header("location: ../index.php");
                           // echo "UserName from Session: " . $_SESSION["username"] . "</br>";
                           // echo "It worked yo!";
                        }
                        else
                        {
                            // Display an error message if password is not valid
                            //$password_err = "The password you entered was not valid.";
                            header("location: ../signin.php?signin=invalidpass");
                            exit();
                        }
                    }
                } else
                {
                    // Display an error message if username doesn't exist
                    //$username_err = "No account found with that username.";
                    header("location: ../signin.php?signin=invalidpass");
                    exit();
                }
            } else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        else
        {
             echo "</br> Skipped stmt if </br>";
        }
    }
    else
    {
        echo "</br> Skipped isset if </br>";
    }

    // Close connection
    mysqli_close($link);
}
?>
