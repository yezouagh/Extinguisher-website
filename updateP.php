<?php
if (isset($_GET['Id']) && !empty($_GET['Id'])) 
{
   $Id=$_GET['Id'];
   if(isset($_GET['bool']))
   {
     $bool=$_GET['bool'];
    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    error_reporting(E_ALL);
     if(!$update=mysql_query("UPDATE Extincteurs SET Promo='$bool' WHERE Id='$Id'"))
	 {
	 echo	"Produit n'a pas été mis à jour, S'il vous plaît réessayer plus tard.";
	 }
	 else
	 {
	  header('Location: Admin.php');
	 }
   }
 else
 {
  echo "Produit n'a pas été mis à jour, S'il vous plaît réessayer plus tard.";
 }
}
else
{
  echo "S'il vous plaît sélectionner un produit.";
}
?>