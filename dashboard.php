<?php
session_start(); //start session to store user info

//check if session and cookie exist

if (!isset($_SESSION['user_id'])   || !isset($_COOKIE['auth_session']) || $_COOKIE['auth_session'] !== session_id() ) {
  header('Location: login.html');
  exit;
}
?>
<h1>Welcome to your dashboard! </h1>

<p>Welcome <?php echo  $_SESSION['email'] ; ?>!</p>   /

<body>
    you are in your page
</body>

<a href="logout.php">Logout</a>
