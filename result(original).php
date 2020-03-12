<?php
  $title = 'Home';
  require_once 'assets/header.php'
;?>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Project Eir</a>
    <a class="btn btn-primary" href="signin.php">Sign In</a>
  </div>
</nav>

<!-- Masthead -->
<header class="masthead text-black text-center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h1 class="mb-5">Help us, help you find the most cost efficent medical procedures.</h1>
      </div>
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <form>
          <div class="form-row">
            <div class="col-12 col-md-9 mb-2 mb-md-0">
              <input type="email" class="form-control form-control-lg" placeholder="Whats the issue?">
            </div>
            <div class="col-12 col-md-3">
              <button type="submit" class="btn btn-block btn-lg btn-primary" href="result.php">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>


<section class="call-to-action text-white text-center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h2 class="mb-4">Ready to get started? Sign up now!</h2>
      </div>
      <div class="col-12 col-md-3">
        <button type="submit" class="btn btn-block btn-lg btn-primary" href="signup.php">Sign up!</button>
      </div>
    </div>
        </form>
      </div>
    </div>
  </div>
</section>

<footer class="footer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
        <ul class="list-inline mb-2">
          <li class="list-inline-item">
            <a href="#">About</a>
          </li>
          <li class="list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="#">Contact</a>
          </li>
          <li class="list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="#">Terms of Use</a>
          </li>
          <li class="list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="#">Privacy Policy</a>
          </li>
        </ul>
        <p class="text-muted small mb-4 mb-lg-0">&copy; Pantheon 2019. All Rights Reserved.</p>
      </div
      <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-3">
            <a href="#">
              <i class="fab fa-facebook fa-2x fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item mr-3">
            <a href="#">
              <i class="fab fa-twitter-square fa-2x fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-instagram fa-2x fa-fw"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<?php require_once 'assets/footer.php';?>
