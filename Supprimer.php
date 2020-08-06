<?php
if (isset($_GET['Id']) && !empty($_GET['Id'])) 
{
   $Id=$_GET['Id'];
   require_once __DIR__ . '/db_connect.php';
   $db = new DB_CONNECT();
   error_reporting(E_ALL);
     if(!$update=mysql_query("DELETE FROM Extincteurs WHERE Id='$Id'"))
	 {
	  echo "Produit n'a pas été supprimer, S'il vous plaît réessayer plus tard.";
	 }
	 else
	 {
          header("location: Admin.php");
	 }
}
else
{
 echo	"S'il vous plaît sélectionner un produit.";
}
?>