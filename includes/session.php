<?php
  require_once("functions.php");
?>
<?php session_start(); ?>

<?php
    // Confirm Logged In Status
    function logged_in() {
        return isset($_SESSION['user_id']);
    }

    function confirm_logged_in() {
        if (!logged_in()) {
            redirect_to("index.php");
        } else {
          redirect_to("dashboard.php");
        }
    }
?>
