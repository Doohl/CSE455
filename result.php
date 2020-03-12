<?php
    $title = 'Home';
    require_once 'assets/header.php';?>

    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Project Eir</a>
      </div>
    </nav>



<?php require_once 'assets/footer.php';?>
 <table class="content-table">
  <tr>
    <th>Procedure Name</th>
    <th>Price</th>
	<th>Hospital Name</th>
	<th>Hospital Address</th>

  </tr>
  <?php

$search = $_GET["search"];
		//$search = "kidney";
	$mysqli = new mysqli("96.44.135.40","eirnex_keith","^~3yF*215k_i","eirnex_ProjectEir");
	if ($result3 = $mysqli -> query("SELECT * FROM synonyms WHERE abbr = '$search'  ")) {

	}
if ($result3->num_rows > 0) {
  $row3 = $result3->fetch_assoc();
 // echo $row3["id"];
 $search = $row3["id"];
   }
	// Check connection
	if ($mysqli -> connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();
	}

	// Perform query
	if ($result = $mysqli -> query("SELECT * FROM  serviceinfo WHERE service_name LIKE '%{$search}%'  ")) {
	//echo "Returned rows are: " . $result -> num_rows;
	}
    if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()){
	$address = $row["hospital_id"];

	$result1 = $mysqli -> query("SELECT * FROM  hospitalinfo WHERE hospital_id  ='$address'  ");
	$row1 = $result1->fetch_assoc();
	$location = $row1["location_id"];
	//echo $location;
	$result2 = $mysqli -> query("SELECT * FROM  locationinfo WHERE location_id  ='$location'  ");
	$row2 = $result2->fetch_assoc();

	echo "<tr>";
	echo "<td>".$row["service_name"]."</td>";
	echo "<td>"."$".$row["charge"]."</td>";
	echo "<td>". $row1["hospital_name"]."</td>";
	echo "<td>" .$row2["street_address"].", ".$row2["city"].", ".$row2["postal_code"]."</td>";
	echo "<tr>";
}
	}
	$mysqli -> close();
?>
</table>

<style>
  .content-table{
    background-image: url('style/images/peach1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    page-break-before: always;
    page-break-after: always;
    border: 1px solid black;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    width: 100%;

  }

  .content-table tr th{
    font-weight: bold;
    color: black;
    text-align:left;
    border: 3px;
  }
</style>
