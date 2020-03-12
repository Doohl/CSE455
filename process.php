<?php
require_once 'config.inc.php';

echo "Hello from process.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "Inside the POST Submit!";
    
    if(isset($_POST['inputEmail']) && isset($_POST['issueContent']) && isset($_POST['issueText']))
    {
        $db = mysqli_connect(DB_HOSTNAME1, DB_USERNAME1, DB_PASSWORD1);
        mysqli_select_db($db, DB_NAME1);
        
        $inputEmail = $_POST['inputEmail'];
        $issueContent = $_POST['issueContent'];
        $issueText = $_POST['issueText'];
        
        $query = "INSERT INTO `supportTickets`(`userEmail`, `ticTitle`, `ticIssue`) VALUES (\"$inputEmail\", \"$issueContent\", \"$issueText\") ";
        $result = mysqli_query($db, $query);
        
        //echo '</br>';
        //echo '<pre>' , var_dump($db) , '</pre>';
        //echo '</br>';
        //echo '<pre>' , var_dump($result) , '</pre>';
        
        header('Location: http://www.eir.plus/');
    }
}
?>