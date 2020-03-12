<?php 
// Database configuration 
  
 

$servername = "96.44.135.40";
$username = "eirnex_keith";
$password = "^~3yF*215k_i";
$dbname = "eirnex_ProjectEir";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['search'];
$sql = "select service_name from serviceinfo where service_name like '%".$id."%' limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 echo $row["service_name"]. "\n";
 }
} else {
 echo "0 results";
}
$conn->close();
?>