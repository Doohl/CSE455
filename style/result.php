<html>

<?php

$search = $_GET["search"];
echo "search: '$search'";
// Your code here!
$mysqli = new mysqli("96.44.135.40","eirnex_keith","^~3yF*215k_i","eirnex_ProjectEir");
//$search = "te st";
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform query
if ($result = $mysqli -> query("SELECT * FROM synonyms WHERE abbr = '$search'  ")) {
  echo "Returned rows are: " . $result -> num_rows;
  
  // Free result set
  //$result -> free_result();
}
if ($result->num_rows > 0) {
    // output data of each row
   $row = $result->fetch_assoc();
   
  // nl2br();
 "<br>";
   echo "\nYou Searched '$search' what works better in the database is " . $row["id"] ; 
} else {
    echo "No Abbriviation found. Searching for : '$search'";
}

$mysqli -> close();

?>



</html>