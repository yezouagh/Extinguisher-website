<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
 if (empty($_POST['username']) || empty($_POST['password'])) {
  $error = "Nom d'utilisateur ou mot de passe est invalide";
 }
  else
  {
   // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];
    if ($username == 'hassan' && $password=='deux') {
       $_SESSION['login_user']=$username; // Initializing Session
       header("location: Admin.php"); // Redirecting To Other Page
        } 
		else 
		{
           $error = "Nom d'utilisateur ou mot de passe est invalide";
        }
   }
}
?>