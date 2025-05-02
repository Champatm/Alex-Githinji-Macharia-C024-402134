<?php
session_start();

//clearsession data
$_SESSION = array();

//expire the cookie
setcookie('auth_session', '',time() -7, '/');


session_destroy();
header('Location: login.html');
exit;
?>
