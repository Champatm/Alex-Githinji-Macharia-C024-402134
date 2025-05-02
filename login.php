<?php
session_start();  //starts session

require 'db.php';  //include database connection (comes from db.php)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   //checks if the requestis  coming from a POST meaning user has submmited form
    
  $email = $_POST['email'];   //get email and pass  submmited from the form the $post email is the name field from html form
  $password = $_POST['password'];

  

  $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email"); //prepares safe query prevent sql inject
  $stmt->execute(['email' => $email]); //eecutes with user input
  $user = $stmt->fetch();    //fetch user record as an array 

  if ($user && password_verify($password, $user['password'])) {  

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $email ;

    //set cookie expire 5 seconds
    setcookie('auth_session', session_id(), time() + 5, '/','', true,true);
 



    header('Location: dashboard.php');
   


    
  } else {  header(header:'location:loginagain.php? error=1' );
    

   exit;
  }
}
?>