<!DOCTYPE html>
<html>

<head>
  <link type="rel/stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
  <link type="rel/stylesheet" src="styles/main.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
    // Requirements
    require_once("./includes/functions.php");
    require_once("./includes/session.php");
  ?>
  <?php
    if (!logged_in()) {
      redirect_to("index.php");
    }
  ?>
</head>

<body>

<header>
</header>

<section>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1><?php echo "PhpAuthentication"."\n"; ?></h1>
      <h3><?php echo "{$_SESSION['username']} is now Logged In."; ?></h3>
    </div>
  </div>
</section>

<footer>
</footer>

</body>

</html>
