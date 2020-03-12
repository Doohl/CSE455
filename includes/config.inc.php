<?php
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
?>
