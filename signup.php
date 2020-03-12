<?php
  $title = 'Sign up';
  require_once 'assets/header.php'
;?>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Project Eir</a>
    <a class="btn btn-primary" href="signin.php">Sign In</a>
  </div>
</nav>



  <div class="container-fluid">
      <div class = "row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
          <form method="post" action="includes/signup.inc.php" class="signup-form-container" class="position-absolute">
            <h4 class="text-center font-eight-bold"> Registration </h4>

			      <!--Email input for signup.-->
            <div class "form-group">
              <label for="inputEmail">Email address</label>
              <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" placeholder="Enter Email">
              <small id="emailHelp"class="form-text text-muted"> We will never share your email with anyone else.</small>
			</div>

            <!--Username input for signup.-->
            <div class "form-group">
              <label for="inputUser">Username</label>
              <input type="username" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <!--Password input for signup.-->
            <div class "form-group">
              <label for="inputPass">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <!--Password re-entree input for signup.-->
            <div class "form-group">
              <label for="inputPass">Re-enter Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter Password">
            </div>

            <button type="register"  class="regBut" class="btn btn-primary">Sign up!</button>
          </form>
          <!--Part that clay added to display errors on the page, the <p class= 'error'/'success' has been made,
          but the style.css page isnt included in this file -->
          <?php
             $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

             if(strpos($fullUrl, "signup=empty") == true) {
               echo "<p class= 'error'>You did not fill in all fields!</p>";
               exit();
             }
             elseif(strpos($fullUrl, "signup=emailused") == true) {
               echo "<p class= 'error'>This email has already been used!</p>";
               exit();
             }
             elseif(strpos($fullUrl, "signup=usertaken") == true) {
               echo "<p class= 'error'>This username has been taken!</p>";
               exit();
             }
             elseif(strpos($fullUrl, "signup=pwshort") == true) {
               echo "<p class= 'error'>Password must be 6 characters long!</p>";
               exit();
             }
             elseif(strpos($fullUrl, "signup=pwnomatch") == true) {
               echo "<p class= 'error'>Passwords didnt match!</p>";
               exit();
             }
             elseif(strpos($fullUrl, "signup=success") == true) {
               echo "<p class= 'success'>Your account has been registered, sign in!</p>";
               exit();
             }
           ?>
          </div>
      </div>
  </div>
</div>

      <style type="text/css">
          .regBut{
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

          .signup-form-container{
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
