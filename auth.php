<?php
  // Requirements
  require_once("./includes/constants.php");
  require_once("./includes/functions.php");
  require_once('./includes/recaptchalib.php');
?>

<?php
  if (isset($_POST['submit_signup_form'])) {
    $privatekey = SECRET_KEY;
    $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);
    if (!$resp->is_valid) {
      // What happens when the CAPTCHA was entered incorrectly
      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
           "(reCAPTCHA said: " . $resp->error . ")");
    } else {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmed_password = $_POST['confirm_password'];
      create_user($username, $email, $password, $confirmed_password);
    }
  }

    elseif (isset($_POST['login_form'])) {
      if (isset($_POST['email_or_username']) && isset($_POST['password'])) {
        $username_or_email = $_POST['email_or_username'];
        $password = $_POST['password'];
        login_user($username_or_email, $password);
      }
    }
?>
