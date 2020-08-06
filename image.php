<?php

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
     // get the image from the db
     $sql = "SELECT Image FROM Extincteurs WHERE id=" .$_GET['id'] . ";";
     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
     // set the header for the image
     header("Content-type: image/jpeg");
     echo mysql_result($result, 0);
	 }
	 else
	 {
	 	echo 'ERROR';
	 }
?>