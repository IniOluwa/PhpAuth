<?php
  // Requirements
  require_once("connection.php");
  require_once("session.php");
 ?>

<?php

  // Page Redirection
  function redirect_to($location = NULL) {
      if ($location != NULL) {
          header("Location: {$location}");
          exit;
      }
  }

  // Authentication
  function confirm_user_password($password, $confirmed_password) {
    if ($password == $confirmed_password) {
      // $hashed_password = password_hash($user_confirmed_password, sha1);
      $hashed_password = sha1($password);
      return $hashed_password;
    }
  }

  // Create New User
  function create_user($username, $email, $password, $confirmed_password) {
    global $connection;
    $matched_password = confirm_user_password($password, $confirmed_password);
    $query = "INSERT INTO users(username, email, password) VALUES ('{$username}', '{$email}', '{$matched_password}')";
    $new_user = mysqli_query($connection, $query);
    if ($new_user) {
      login_user($username, $password);
    } else {
        echo "<pre>User Creation Failed.</pre>";
        echo "<pre>{$query}</pre>";
    }
  }

  // Login Existing User
  function login_user($username_or_email, $password) {
    global $connection;
    $hashed_password = sha1($password);
    $query = "SELECT id, username FROM users WHERE (username = '{$username_or_email}' or email = '{$username_or_email}') AND (password = '{$hashed_password}') LIMIT 1";
    $login = mysqli_query($connection, $query);

    $logged_in_user = mysqli_fetch_array($login);

    if ($logged_in_user) {
      // Create Session
      $_SESSION['user_id'] = $logged_in_user['id'];
      $_SESSION['username'] = $logged_in_user['username'];
      redirect_to('dashboard.php');
      exit();
    } else {
      echo "<pre>Login Failed.</pre>";
      echo "<pre>{$query}</pre>";
    }
  }

?>
