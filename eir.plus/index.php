
<head>
 <link rel="stylesheet" type="text/css" href="style.css" />
 <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="jquery.autocomplete.js"></script>
 <script> 
 jQuery(function(){ 
 $("#search").autocomplete("search.php");
 });
 </script>
</head>


<?php
    require_once 'includes/Session.php';
    
    //echo '<pre>' , var_dump(session_status()) , '</pre>';
    if(session_status() !== PHP_SESSION_ACTIVE)
    {    
        //echo "</br> Creating Session</br>";
        session_start();
        $_SESSION["loggedin"] = false;
    }
    
    $title = 'Home';
    require_once 'assets/header.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
  <div class="container" class="navBars">
    <a class="navbar-brand" href="index.php">Project Eir</a>
    <?php
    
    //var_dump(session::isLoggedIn());
    //var_dump(session::getUserName());
    //echo '<pre>' , var_dump($_SESSION) , '</pre>';
    if(isset($_SESSION["username"]))
    {
        
        echo "<a class=\"btn btn-primary\" >" . $_SESSION["username"] . "</a>";        
    }     
    else
    {
        echo "<a class=\"btn btn-primary\" href=\"signin.php\">Sign In</a>";
    }                
    ?>
  </div>
</nav>


<div class="header">
  <form action = "result.php" method ="get" >
    <h1> Help us, help you find the best price <br> for your next medical procedure. </h1>
      <div class="form-box">
        <input type="text" name="search" class="search-field procedure" placeholder="What seems to be the problem?" id="search">
        <button class="search-btn" type="submit">Search</button>
      </div>
  </form>
</div>

<style type="text/css">
  body{
    background-image: url('style/images/Hospital.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    page-break-before: always;
    page-break-after: always;
  }

  .header{
    height: 100vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5)),url("style/images/green1.jg");
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: sans-serif;
  }

  .header h1{
    color: black;
    margin-bottom: 70px;
    font-size: 45px;
    letter-spacing: 2px;
    text-align: center;
  }

  .search-field{
    height: 50px;
    padding: 10px;
    border: none;
    border-radius: 25px;
    outline: none;
  }

  .procedure{
    width: 700px;
  }

  .search-btn{
    height: 50px;
    width: 150px;
    background-image: url("style/images/gray1.jpg");
    border: none;
    border-radius: 25px;
  }

  .search-btn:hover{
    background: #ffc107;
    cursor: pointer;
  }

  .form-box{
    background: rgba(0, 0, 0, 0.5);
    padding: 30px;

  }
</style>

<?php require_once 'assets/footer.php';?>
