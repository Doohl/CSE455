<?php
    $title = 'Home';
    require_once 'assets/header.php';
    session_start();
    //echo '<pre>' , var_dump($_SESSION) , '</pre>';
?>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Project Eir</a>
    <a class="btn btn-primary" href="signup.php">Sign Up</a>
  </div>
</nav>



  <div class="container-fluid">
      <div class = "row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
          <form method="post" action="includes/login.inc.php" class="login-form-container">
            <h4 class="text-center font-eight-bold"> Login </h4>

	    <!--Email input for Login.-->
            <div class="form-group">
              <label for="inputUser">Username</label>
              <input type="username" class="form-control" id="username" name="username"  placeholder="Username">

            <!--Password input for login.-->
            <div class="form-group">
              <label for="inputPass">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <button type="login"  class="logBut" class="btn btn-primary">Login</button>
            <button type="logSign"  class="logSignBut" class="btn btn-primary" href="signup.php">Sign Up</button>
            <button type="loghelp"  class="suppBut" class="btn btn-primary" href="support.php">Forgot Password?</button>
          </form>
        </div>
      </div>
  </div>
</div>

      <style type="text/css">

        .logBut{
          margin: auto;
          margin-top: 5px;
          background-image: url('style/images/gray1.jpg');
        }

        .logSignBut{
          margin: auto;
          margin-top: 5px;
          background-image: url('style/images/gray1.jpg');
        }

        .suppBut{
          background-size: contain;
          margin: auto;
          margin-top: 5px;
          background-image: url('style/images/gray1.jpg');
        }
        body{
          background-image: url('style/images/sel2.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          position: relative;
          page-break-before: always;
          page-break-after: always;
        }

        .login-form-container{
          position: absolute;
          background-image: url('style/images/peach1.jpg');
          border-radius: 10px;
          padding: 30px;
          box-shadow: 0px 0px 10px 0px;
          opacity: 500%;
          margin-top: 50px;
        }
      </style>
      </div>
    </div>

<br>

<?php require_once 'assets/footer.php';?>
