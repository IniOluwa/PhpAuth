<html>
  <head>
    <title>PhpAuth</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <?php
    // Requirements
    require("./includes/connection.php");
    require_once("./includes/functions.php");
    require_once("./includes/session.php");
  ?>
  <?php
    // Check Authentication Status
    if (logged_in()) {
      redirect_to("dashboard.php");
    }
  ?>
  <body>
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">PhpAuth</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><button class="btn btn-link" role="link" type="submit" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-user"></span> Sign Up</button></li>
            <li><button class="btn btn-link" role="link" type="submit" data-toggle="modal" data-target="#logInModal"><span class="glyphicon glyphicon-log-in"></span> Login</button></li>
            <li>
                <!-- Modal -->
                <div class="modal fade" id="signUpModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sign up for [YourAppName]</h4>
                      </div>
                      <div class="modal-body">
                          <div class="">
                            <div class="well">
                              <form class="form-horizontal" action="auth.php" method="post">
                                <fieldset>
                                  <legend>Sign Up</legend>
                                  <div class="form-group">
                                    <label for="Email" class="control-label">Email</label>
                                    <input type="text" class="col-sm-4 form-control" name="email" value="" placeholder="Email">
                                  </div>
                                  <div class="form-group">
                                    <label for="Username" class="control-label">Username</label>
                                    <input type="text" class="col-sm-4 form-control" name="username" value="" placeholder="Username">
                                  </div>
                                  <div class="form-group">
                                    <label for="Password" class="control-label">Password</label>
                                    <input type="password" class="col-sm-4 form-control" name="password" value="" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                    <label for="Confirm Password" class="control-label">Confirm Password</label>
                                    <input type="password" class="col-sm-4 form-control" name="confirm_password" value="" placeholder="Confirm Password">
                                  </div>
                                  <div class="form-group">
                                    <!-- <div class="g-recaptcha" data-sitekey="6LcRexUUAAAAAMBJbrGClzxpp4KYoGveXWLNeMbZ"></div> -->
                                    <?php
                                      require_once("./includes/recaptchalib.php");
                                      $publickey = "6LcRexUUAAAAAMBJbrGClzxpp4KYoGveXWLNeMbZ";
                                      echo recaptcha_get_html($publickey);
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <div class="">
                                      <button type="submit" name="submit_signup_form" class="btn btn-primary">Sign up</button>
                                    </div>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li>
                <!-- Modal -->
                <div class="modal fade" id="logInModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login to [YourAppName]</h4>
                      </div>
                      <div class="modal-body">
                          <div class="">
                            <div class="well">
                              <form class="form-horizontal" action="auth.php" method="post">
                                <fieldset>
                                  <legend>Login</legend>
                                  <div class="form-group">
                                    <label for="Email" class="control-label">Email</label>
                                    <input type="text" class="col-sm-4 form-control" name="email_or_username" value="" placeholder="Email or Username">
                                  </div>
                                  <div class="form-group">
                                    <label for="Password" class="control-label">Password</label>
                                    <input type="password" class="col-sm-4 form-control" name="password" value="" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                    <div class="">
                                      <button type="submit" name='login_form' class="btn btn-primary">Login</button>
                                    </div>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
          <ul>
        </div>
      </nav>
    </header>

    <section>
      <div class="container-fluid">
        <div class="jumbotron">
          <h1>Php Authentication Example</h1>
        </div>
      </div>
    </section>

    <footer>

    </footer>

  </body>
</html>
